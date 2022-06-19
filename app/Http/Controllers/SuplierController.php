<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use App\Models\Scity;
use App\Models\Scountry;
use App\Models\Sstreet;
use App\Models\Scatagory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    
    public function index()
    {
        $countries= Scountry::get();
        $cities= Scity::get();
        $streets=Sstreet::get();
        $catagories=Scatagory::get();
        return view('Supliers.Suplier',compact("countries","cities","streets","catagories"));
    }
    
    public function ShowSuplier(Request $request)
    {
       
        $search = $request['search'] ?? "";
         if($search != "")
         {
            $supliers= Suplier::where('first_name','like',$search)->orWhere('email','like',$search)->orWhere('company_name','like',$search)->paginate(10);
        }

        //    if(request('search')){
        //     $supliers= Suplier::where('first_name','like', '%'. request('search'). '%')->get(); 
        //    }
         else{
             $supliers= Suplier::latest()->paginate(10);
         }
         
         $countries= Scountry::get();
         $cities= Scity::get();
         $streets=Sstreet::get();
         $catagories=Scatagory::get();
    
        return view('Supliers.AllSuplier' ,compact("supliers","countries","cities","streets","catagories","search"));
    }




    public function store(Request $request)
    {
       $suplier=$request->toArray();
       $suplier['user_id']=Auth::user()->id;
      // return $request;
       Suplier::create($suplier);
       return redirect(route('Suplier_index'))->with('message','Data Inserted Successfully!');
    }


    public function edit($id)
    {
        $this->authorize('Purchese_Manager', Suplier::calss);
        $suplier= Suplier::find($id);
        $countries= Scountry::get();
        $cities= Scity::get();
        $streets=Sstreet::get();
        $catagories=Scatagory::get();
        return view('Supliers.EditSuplier',['suplier'=>$suplier],compact("countries","cities","streets","catagories"));
         
          
       
    }

    public function update(Request $request, $id)
    {
        $suplier= Suplier::find($id);
        $suplier->update($request->all());
       // $suplier->save();
        return redirect(route('Suplier_show'))->with('message','Data Updated Successfully!');
    }

   
    public function destroy($id)
    {
        $suplier= Suplier::find($id);
        $suplier->delete();
        return redirect(route('Suplier_show'));
    }

    public function  SuplierTrash(Request $request)
    {

        $search = $request['search'] ?? "";
        if($search != "")
        {
            $supliers= Suplier::where('first_name','like',$search)->orWhere('email','like',$search)->orWhere('company_name','like',$search)->paginate(10);
          
        }
        else{
        
            $supliers= Suplier::latest()->onlyTrashed()->paginate(10);
        }      
        return view('Supliers.SuplierTrash', compact("supliers","search"));
    }

    
    public function SuplierReastore($id)
    {
        $suplier= Suplier::withTrashed()->find($id);
        if(!is_null($suplier)){
          $suplier->restore();
       }          
        return redirect(route('SuplierTrash'))->with('message','Data restored Successfully!');
    }

          
    public function SuplierForceDelete($id)
    {
        $suplier= Suplier::withTrashed()->find($id);
        if(!is_null($suplier)){
          $suplier->forceDelete();
       }          
        return redirect(route('SuplierTrash'));
    }


}
