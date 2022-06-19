<?php

namespace App\Http\Controllers;

use App\Models\Scatagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScatagoryController extends Controller
{
   
        public function index(Request $request)
        {
            $search = $request['search'] ?? "";
            if($search != "")
            {
                $catagories= Scatagory::where('catagory_name','like',"%$search%")->paginate(7);
              
            }
    
            else{
                $catagories= Scatagory::latest()->paginate(7);
            }
        
        return view('Supliers.SuplierCatagory',compact("catagories","search"));
    }


    public function store(Request $request)
    {
        $catagory=$request->toArray();
        $catagory['user_id']=Auth::user()->id;
        
        Scatagory::create($catagory);
        return redirect(route('scatagory_index'))->with('message','Data Inserted Successfully!');
    }

  
    public function edit($id)
    {
        $catagory= Scatagory::find($id);
          return view('Supliers.EditSuplierCatagory', ['catagory'=>$catagory]);

    }

    public function update(Request $request, $id)
    {
        $catagory= Scatagory::find($id);;
        $catagory->update($request->all());
        $catagory->save();  
        return redirect(route('scatagory_index'))->with('message','Data Updated Successfully!');
    }

   
    public function destroy($id)
    {
        $catagory= Scatagory::find($id);
        $catagory->delete();
        return redirect(route('scatagory_index'));
    }

    public function  ScatagoryTrash(Request $request)
    {

        $search = $request['search'] ?? "";
        if($search != "")
        {
              $catagories= Scatagory::where('catagory_name','like',"%$search%")->onlyTrashed()->paginate(10);
          
        }
        else{
        
              $catagories= Scatagory::latest()->onlyTrashed()->paginate(10);
        }      
        return view('Supliers.ScatagoryTrash', compact("catagories","search"));
    }

    
    public function ScatagoryReastore($id)
    {
        $catagory= Scatagory::withTrashed()->find($id);
        if(!is_null($catagory)){
          $catagory->restore();
       }          
        return redirect(route('ScatagoryTrash'))->with('message','Data restored Successfully!');
    }

          
    public function ScatagoryForceDelete($id)
    {
        $catagory= Scatagory::withTrashed()->find($id);
        if(!is_null($catagory)){
          $catagory->forceDelete();
       }          
        return redirect(route('ScatagoryTrash'));
    }

}
