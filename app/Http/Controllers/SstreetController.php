<?php

namespace App\Http\Controllers;

use App\Models\Sstreet;
use App\Models\Scity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SstreetController extends Controller
{
   
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != "")
        {
            $streets= Sstreet::where('street_name','like',"%$search%")->paginate(7);
          
        }

        else{
            $streets= Sstreet::latest()->paginate(7);          
        }
        $cities= Scity::get();
        return view('Supliers.SuplierStreet.Sstreet' , compact("cities","streets","search"));
    }

   
    public function store(Request $request)
    {

      $street=$request->toArray();
      $street['user_id']=Auth::user()->id;
      Sstreet::create($street);
      return redirect(route('Sstreet_index'))->with('message','Data Inserted Successfully!');

    }

  
    public function edit($id)
    {
        $street= Sstreet::find($id);
        $cities= Scity::get();
        return view('Supliers.SuplierStreet.EditSstreet', ['street'=>$street], compact("cities"));
    }

    
    public function update(Request $request, $id)
    {
        $street= Sstreet::find($id);
        $street->street_name = $request->street_name;
        $street->save();
        return redirect(route('Sstreet_index'))->with('message','Data Updated Successfully!');

    }

    public function destroy($id)
    {
        $street= Sstreet::find($id);
        $street->delete();
        return redirect(route('Sstreet_index'));
    }

     
    public function  SstreetTrash(Request $request)
    {

        $search = $request['search'] ?? "";
        if($search != "")
        {
             $streets= Sstreet::where('street_name','like',"%$search%")->onlyTrashed()->paginate(10);
          
        }
        else{
        
             $streets= Sstreet::latest()->onlyTrashed()->paginate(10);
        }      
        return view('Supliers.SuplierStreet.SstreetTrash', compact("streets","search"));
    }

    
    public function SstreetReastore($id)
    {
        $street= Sstreet::withTrashed()->find($id);
        if(!is_null($street)){
          $street->restore();
       }          
        return redirect(route('SstreetTrash'))->with('message','Data restored Successfully!');
    }

          
    public function SstreetForceDelete($id)
    {
        $street= Sstreet::withTrashed()->find($id);
        if(!is_null($street)){
          $street->forceDelete();
       }          
        return redirect(route('SstreetTrash'));
    }

}
