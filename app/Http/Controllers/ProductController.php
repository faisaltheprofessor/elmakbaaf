<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//import this for delatig the file
// use Illuminate\Support\File;
use File;

class ProductController extends Controller
{
   
    public function index()
    {  
        $catagories= Catagory::get();
        return view("Product.Product",compact("catagories"));
    }

    public function store(Request $request)
    {   
        
        $product=$request->toArray();
        $product['user_id']=Auth::user()->id;
       
        if($request->hasfile('img'))
          {
           
            $file = $request->file('img');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('Images/Product/', $filename); 
            $product['img']=$filename; 
                 
        } 
       
        Product::create($product);
     
        return redirect(route('Product_index'))->with('message','Data Inserted Successfully!');     
        // return $request;

    }

    public function ShowProduct(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != "")
        {
            $products= Product::where('design','like',"%$search%")->orWhere('color','like',"%$search%")->orWhere('lenght','like',"%$search%")->orWhere('width','like',"%$search%")->orWhere('status','like',"%$search%")->paginate(10);
          
        }

        else{
        
            $products= Product::latest()->paginate(10);
        }
        $catagories= Catagory::get();
        return view('Product.AllProduct' ,compact("catagories","products","search"));
    }

    public function edit($id)
    {  
  
        $products= Product::find($id);
        return view('Product.EditProduct', ['product'=>$products]);
         
    }

      
    public function update(Request $request, $id)
    {
        $product= Product::find($id);
        $data = $request->toArray();
        if( $request->hasfile('img'))
        {
           
            $imageToBeDeleted = "Images/Product/".$product->img;

            if(File::exists($imageToBeDeleted)){
                File::delete($imageToBeDeleted);
            } 
            $file = $request->file('img');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('Images/Product/', $filename); 
            $data['img']=$filename; 
    
      } 
        
        $product->update($data);
         $product->save();
        return redirect(route('AllProduct_show'))->with('message','Data Updated Successfully!');
    }

  


    public function UpdateProductStatuse(Request $request)
    {
        //get the requst in ajex
        if($request->ajax()){
            //both data come here
            $data = $request->all();

           // echo"<pre>"; print_r($data); die;  
           //if states = 0 make it 1 
           if($data['status']=="Avalible"){
               $status = 0;
           }else{
               $status = 1;
           }

           Product::where('id',$data['product_id'])->update(['status'=>$status]);
           return response()->json(['status'=>$status, 'product_id'=>$data['product_id']]);

        }
        
    }


 
    public function destroy($id)
    {
        $product= Product::find($id);
        // $imageToBeDeleted = "Images/Product/".$product->img;

        // if(File::exists($imageToBeDeleted)){
        //     File::delete($imageToBeDeleted);
        // } 
        $product->delete();
        return redirect(route('AllProduct_show'));
    }

    
    public function ProductTrash(Request $request)
    {

        $search = $request['search'] ?? "";
        if($search != "")
        {
            $products= Product::where('design','like',"%$search%")->orWhere('color','like',"%$search%")->orWhere('lenght','like',"%$search%")->orWhere('width','like',"%$search%")->orWhere('status','like',"%$search%")->onlyTrashed()->paginate(5);
          
        }
        else{
        
            $products= Product::latest()->onlyTrashed()->paginate(7);
        }      
        return view('Product.ProductTrash' ,compact("products","search"));
    }


        public function ProductReastore($id)
        {
             $product= Product::withTrashed()->find($id);
                    if(!is_null($product)){
                    $product->restore();
                }          
            return redirect(route('ProductTrash'))->with('message','Data restored Successfully!');
        }

            
        public function ProductForceDelete($id)
        {
             $product= Product::withTrashed()->find($id);

        //     if(!is_null($product)){
        //     $product->forceDelete();
        // }    
                $imageToBeDeleted = "Images/Product/".$product->img;

                if(File::exists($imageToBeDeleted)){
                    File::delete($imageToBeDeleted);
                } 
              $product->forceDelete();      
            return redirect(route('ProductTrash'));
        }
}
