<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    
    public function index()
    {
        $products = Product::latest()->paginate(20);
        return view('WebsitePages.Shop.ShopPage' , compact("products"));
    }


    public function store(Request $request)
    { 
        //cart in shop list
        $cart=$request->toArray();
        $cart['user_id']=Auth::user()->id;
        Cart::create($cart);
       // return $request;
        //$cart=$request->toArray();
       // $cart['user_id']=Auth::user()->id;
       return redirect(route('shop_index'));
    }

    // public function cartList()
    // {
    //     $carts = [];
    //     if(Auth::user()){
    //        $user_id = Auth::user()->id;
    //        //come all data of cart
    //        $carts=Cart::where('user_id',$user_id)->get();
    //     }
    //      return view('ShopingCart', compact('carts'));
    // }

 
   
    public function UpdateCartItemQuantity(Request $request)
    {
        //cheaking if data is coming or not
        if($request->ajax()){
            $data = $request->all();
            //  echo"<pre>";print_r($data); die;
            //  //update here 
            Cart::where('id',$data['cartid'])->update(['quantity'=>$data['quantity']]);
            //get all cart item
            $userCartitems =Cart::userCartitems();
            return response()->json(['view'=>(String)View::make('ShopingCart')->
            with(compact('userCartitems'))]);
        }


    }


    public function cartcount()
    {
        
        $cartcount =Cart::where('user_id',Auth::id())->count();
        return response()->json(['count'=>$cartcount]);
        // return response()->json($cartcount);
    }


   
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

        $cart = Cart::find($id);
        $cart->delete();
        return redirect(route('checkout.index'));

    }
    
}
