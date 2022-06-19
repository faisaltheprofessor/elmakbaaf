<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Takingorder;
use App\Models\Orderitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;
use File;
class TakingorderController extends Controller
{


    public function OrderedItem()
     {
        // $clients= Client::get();
        //  $takingorder= Takingorder::$takingorder;
         $orderitem= Orderitem::get();
        
       // $takingorder=Takingorder::where('takingorder_id',$takingorder_id)->get();
        // $takingorder= Takingorder::find($id);
      //  $takingorder = Takingorder::get();
        return view('SalseManagement.Order.Ordered_Items', compact("orderitem"));

    }

    public function StoreOrderedItem(Request $request)
    {  
        // return $request;

      $orderitem=$request->toArray();
      $orderitem['user_id']=Auth::user()->id;
      if($image=$request->file('file'))
      {
       
        $destinationPath = 'Images/Order';
        $realimage=date('YmdHis').".".$image->getClientOriginalExtension();
        $image->move($destinationPath, $realimage); 
        $input['file']="$realimage";   
        $orderitem['file']=$realimage;   
     }  
       Orderitem::create($orderitem);
      return redirect(route('Order_items'))->with('message','Data Inserted Successfully!');
    }

      
    public function edit($id)
    {     
          $orderitem= Orderitem::find($id);
          return view('SalseManagement.order.orderItemcartEdit', ['orderitem'=>$orderitem]);

    }


    public function update(Request $request, $id)
    {
        $orderitem= Orderitem::find($id);
        $data = $request->toArray();
        if( $request->hasfile('file'))
        {
           
            $imageToBeDeleted = "Images/Order/". $orderitem->file;

            if(File::exists($imageToBeDeleted)){
                File::delete($imageToBeDeleted);
            } 
            $file = $request->file('file');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('Images/Order/', $filename); 
            $data['file']=$filename; 
    
      } 
        
         $orderitem->update($data);
         $orderitem->save();
        return redirect(route('Order_items_cart'))->with('message','Data Updated Successfully!');;
    }

    
    public function AllOrderItemCartindex(Request $request)
    {

        $search = $request['search'] ?? "";
        if($search != "")
        {
            $orderitem= Orderitem::where('design','like',"%$search%")->orWhere('color','like',"%$search%")->orWhere('lenght','like',"%$search%")->orWhere('width','like',"%$search%")->paginate(10);
          
        }

        else{
        
            $orderitem= Orderitem::latest()->paginate(10);
        }

       $takingorder= Takingorder::get();
       return view('SalseManagement.Order.orderItemcart', compact("takingorder","orderitem","search"));
    }


    public function destroy($id)
    {
        $orderitem= Orderitem::find($id);
        // $imageToBeDeleted = "Images/Order/".$orderitem->file;

        // if(File::exists($imageToBeDeleted)){
        //     File::delete($imageToBeDeleted);
        // } 
        $orderitem->delete();
        return  redirect(route('Order_items_cart'));
    }


     
    public function  OrderItemCartTrash(Request $request)
    {

        $search = $request['search'] ?? "";
        if($search != "")
        {
            $orderitem= Orderitem::where('design','like',"%$search%")->orWhere('color','like',"%$search%")->orWhere('lenght','like',"%$search%")->orWhere('width','like',"%$search%")->onlyTrashed()->paginate(5);
          
        }
        else{
        
            $orderitem= Orderitem::latest()->onlyTrashed()->paginate(7);
        }      
        $takingorder= Takingorder::get();
       return view('SalseManagement.Order.OrderItemCartTrash', compact("takingorder","orderitem","search"));
    }

    
    public function OrderedItemReastore($id)
    {
        $orderitem= Orderitem::withTrashed()->find($id);
        if(!is_null($orderitem)){
          $orderitem->restore();
       }          
        return redirect(route('OrderedItemTrash'))->with('message','Data restored Successfully!');
    }

          
    public function OrderedItemForceDelete($id)
    {
        $orderitem= Orderitem::withTrashed()->find($id);
         $imageToBeDeleted = "Images/Order/".$orderitem->file;

        if(File::exists($imageToBeDeleted)){
            File::delete($imageToBeDeleted);
        } 
        // if(!is_null($orderitem)){
          $orderitem->forceDelete();
    //    }          
        return redirect(route('OrderedItemTrash'));
    }

}
