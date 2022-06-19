<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatagoryController extends Controller
{
    
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != "")
        {
            $catagories= Catagory::where('catagory_name','like',"%$search%")->paginate(7);
          
        }

        else{
            $catagories= Catagory::latest()->paginate(7);
        }
       
        return view('Product.ProductCatagori.ProductCatagory',compact("catagories","search"));
    }


    public function store(Request $request)
    {
        $catagory=$request->toArray();
        $catagory['user_id']=Auth::user()->id;
        
        Catagory::create($catagory);
        return redirect(route('Catagory_index'))->with('message','Data Inserted Successfully!');
    }

  
    public function edit($id)
    {
        $catagory= Catagory::find($id);
          return view('Product.ProductCatagori.EiditCatagory', ['catagory'=>$catagory]);

    }

    public function update(Request $request, $id)
    {
        $catagory= Catagory::find($id);;
        $catagory->update($request->all());
        $catagory->save();  
        return redirect(route('Catagory_index'))->with('message','Data Updated Successfully!');
    }

   
    public function destroy($id)
    {
        $catagory= Catagory::find($id);
        $catagory->delete();
        return redirect(route('Catagory_index'));
    }

    public function  catagoryTrash(Request $request)
    {

        $search = $request['search'] ?? "";
        if($search != "")
        {
             $catagories= Catagory::where('catagory_name','like',"%$search%")->onlyTrashed()->paginate(10);
          
        }
        else{
        
             $catagories= Catagory::latest()->onlyTrashed()->paginate(10);
        }      
        return view('Product.ProductCatagori.ProductCatagoryTrash', compact("catagories","search"));
    }

    
    public function CatagoryReastore($id)
    {
        $catagory= Catagory::withTrashed()->find($id);
        if(!is_null($catagory)){
          $catagory->restore();
       }          
        return redirect(route('CatagoryTrash'))->with('message','Data restored Successfully!');
    }

          
    public function CatagoryForceDelete($id)
    {
        $catagory= Catagory::withTrashed()->find($id);
        if(!is_null($catagory)){
          $catagory->forceDelete();
       }          
        return redirect(route('CatagoryTrash'));
    }
}
