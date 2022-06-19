<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use App\Models\Cartitemorder;

use App\Models\Takingorder;
use App\Models\Orderitem;
use App\Models\Client;
use App\Models\TakingorderOrderitem;
use Illuminate\Support\Facades\Auth;
use DB;
use File;

use Illuminate\Http\Request;

class ClientorderController extends Controller
{
 
    public function index()
    {
        //
    }

    public function ClientOrder()
    {

        $clients= Client::get();
        $cartitemorders = [];
        if(Auth::user()){
           $user_id = Auth::user()->id;
           //come all data of cart
           $cartitemorders=Cartitemorder::where('user_id',$user_id)->get();
        }
    
         return view('SalseManagement.order.ClientOrder', compact("cartitemorders","clients"));
        
    }

  

  

    public function OrderItemCart(Request $request)
    {
        $cartitemorder=$request->toArray();
        $cartitemorder['user_id']=Auth::user()->id;
        Cartitemorder::create($cartitemorder);
        return  redirect(route('Order_items_cart'))->with('message','Data Inserted Successfully!');
        //  return $request;

    }

    public function UpdateClientorderItemQuantity(Request $request)
    {
      //cheaking if data is coming or not
      if($request->ajax()){
        $data = $request->all();
        //  echo"<pre>";print_r($data); die;
        //  //update here 
        Cartitemorder::where('id',$data['cartid'])->update(['quantity'=>$data['quantity']]);
        //get all cart item
        $userCartitems =Cartitemorder::userCartitems();
        return response()->json(['view'=>(String)View::make('ClientOrder')->
        with(compact('userCartitems'))]);
    }



    }
  
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
       

        $takingorder = new Takingorder;
        $takingorder['user_id']=Auth::user()->id;
        $takingorder->order_Date = $request->order_Date;
        $takingorder->client_id=$request->client_id;
        $takingorder->date_to_prepare = $request->date_to_prepare;
        $takingorder->save();


        $takingorder_id = DB::getPdo()->lastInsertId();
        $cartItemsOrder = Cartitemorder::where('user_id',Auth::user()->id)->get();
        foreach($cartItemsOrder as $key =>$item)
        {
             $cartItemsOrder = new TakingorderOrderitem;
             $cartItemsOrder->orderitem_id = $item['orderitem_id'];
             $cartItemsOrder->takingorder_id=$takingorder_id;
             $cartItemsOrder->user_id = Auth::user()->id;

             $cartItemsOrder->quantity = $item['quantity'];
             $cartItemsOrder->save();

        }
 
         Cartitemorder::where('user_id',Auth::user()->id)->delete();
         return redirect(route('ClientOrder'));
    

   }


   public function ClientAllOrder(Request $request)
   { 
    $search = $request['search'] ?? "";
    if($search != "")
    {
        $takingorders =  Takingorder::with('takingorder_orderitem')->Where('order_date','like',"%$search%")->orWhere('date_to_prepare','like',"%$search%")->paginate(10);
      
    }

    else{
         $takingorders =  Takingorder::with('takingorder_orderitem')->orderBy('id','Desc')->paginate(10); 
    }
    
       return view('SalseManagement.order.AllClientOrder')->with(compact('takingorders','search')); 
   }


   public function client_ordered_product_detail($id){

    
    $ClientOrderedProductDetail =Takingorder::with('takingorder_orderitem')->where('id',$id)->first();
    // dd($ClientOrderedProductDetail);
     return view('SalseManagement.order.ClientOrderProductDetaile')->with(compact('ClientOrderedProductDetail'));
    
   } 




  
   

    
  
    public function  OrderItemCartdestroy($id)
    {
        $cartitemorder=Cartitemorder::find($id);
        $cartitemorder->delete();
         return redirect(route('ClientOrder'));
    }

}
