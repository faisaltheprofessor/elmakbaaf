<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use App\Mail\SendEmailMailable;
// use Illuminate\Support\Facades\Mail;
use DB;
// use App\Jobs\SendEmailJob;

use Carbon\Carbon;



use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $carts = [];
        if(Auth::user()){
           $user_id = Auth::user()->id;
           //come all data of cart
           $carts=Cart::where('user_id',$user_id)->get();
        }
         
        return view('WebsitePages.Shop.ShopingCart', compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
         $order = new Order;
         $order['user_id']=Auth::user()->id;
         $order->order_date = $request->order_date;       
         $order->debet_cart_number = $request->debet_cart_number;
         $order->totalprice = $request->totalprice;
         $order->save();
         
          
         //last inserted order id
         $order_id = DB::getPdo()->lastInsertId();
         $cartItems = Cart::where('user_id',Auth::user()->id)->get();
         foreach($cartItems as $key =>$item)
         {
             $cartItems = new OrderProduct;
             $cartItems->product_id = $item['product_id'];
             $cartItems->order_id=$order_id;
             $cartItems->user_id = Auth::user()->id;  


             $cartItems->quantity = $item['quantity'];
         
            $cartItems->save();

         }
         
         Mail::to('anaba.zazai@gmail.com')->send(new \App\Mail\OrderShipped($order));
        //  dd("Email is Sent.");


        //  $job=(new SendEmailJob())->delay(Carbon::now()->addSeconds(5));
        //  dispatch($job);
        //   return("email sended!");
        //  Mail::send(new SendEmailMailable);

        //  $orderDetail =Order::with('order_product')->where('id',$order_id)->first();
        // //  $userDetail =User::where('id',$orderDetail['user_id'])->first();
        //  $email = Auth::user()->email;
        //  $messageData =[
        //      'email'=>$email,
        //      'name'=>Auth::user()->name,
        //      'order_id'=>$order_id,
        //      'orderDetail'=>$orderDetail,
        //     //  'userDetail'=>$userDetail,

        //  ];
        //  Mail::send('WebsitePages.shop.order_mail',$messageData);

         //delete the cart items comparing user id
         Cart::where('user_id',Auth::user()->id)->delete();
        //  $this->sendOrderConfirmationMail($orderedProductDetail);
         return redirect(route('checkout.index'));
    }


//    public function sendOrderConfirmationMail($orderedProductDetail)
//    {
//        Mail::to($orderedProductDetail->email)->send(new OrderMail($orderedProductDetail));
//    }



    public function userorder(Request $request)
    {

        $search = $request['search'] ?? "";
        if($search != "")
        {
            $orders = Order::with('order_product')->Where('order_date','like',"%$search%")->orWhere('debet_cart_number','like',"%$search%")->paginate(10);
          
        }
    
        else{
           
            $orders = Order::with('order_product')->orderBy('id','Desc')->paginate(10);  
        }
        //ataching order Product with 
      
    //    dd($orders); die;
       return view('Admin.UserOrder')->with(compact('orders','search'));
       
    }

    public function user_ordered_product_detail($id){
        //connect with order produt relationship compare with the id

        $orderedProductDetail =Order::with('order_product')->where('id',$id)->first();
        // ddd($orderedProductDetail);
    //    dd($orderedProductDetail); die;
        return view('WebsitePages.Shop.OrderedProductDetail')->with(compact('orderedProductDetail'));

    //    $order = Order::find($id);
    //    $product = $order->product;
    //  return view('WebsitePages.Shop.OrderedProductDetail',['order'=>$order, 'product'=>$product]);

    }

    public function myaccount(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != "")
        {
            $orders = Order::with('order_product')->Where('order_date','like',"%$search%")->orWhere('debet_cart_number','like',"%$search%")->paginate(10);
          
        }
    
        else{
           
            $orders = Order::with('order_product')->where('user_id',Auth::user()->id)->orderBy('id','Desc')->paginate(10);  
        }

       
       return view('NormalUser.MyAccount')->with(compact('orders','search'));
    }

    public function UserDashboard(){
        return view('NormalUser.normal_user_Dashboard');
    }
    // public function useraccount_ordered_product_detail($id){
    //     //connect with order produt relationship compare with the id

    //     $orderedProductDetail =Order::with('order_product')->where('id',$id)->first();
    //     // ddd($orderedProductDetail);
    // //    dd($orderedProductDetail); die;
    //     return view('WebsitePages.Shop.OrderedProductDetail')->with(compact('orderedProductDetail'));

    // //    $order = Order::find($id);
    // //    $product = $order->product;
    // //  return view('WebsitePages.Shop.OrderedProductDetail',['order'=>$order, 'product'=>$product]);

    // }
  
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

}
