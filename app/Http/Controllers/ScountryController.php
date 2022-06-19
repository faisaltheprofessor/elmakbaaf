<?php

namespace App\Http\Controllers;

use App\Models\Scountry;
use Illuminate\Http\Request;

class ScountryController extends Controller
{
    public function index(Request $request)
    {

        $search = $request['search'] ?? "";
        if($search != "")
        {
           $countries= Scountry::where('country_name','like',"%$search%")->paginate(7);
          
        }

        else{
        
            $countries= Scountry::latest()->paginate(7);
        }

        return view('Supliers.SuplierCountry.SuplaierCountry', compact("countries","search"));
    }

  
    public function store(Request $request)
    {
        $user = $request->user();
        $country = new Scountry;
        $country->country_name = $request->country_name;
        $user->country()->save($country);
        return redirect(route('Scountry_index'))->with('message','Data Inserted Successfully!');

    }

   
    public function edit($id)
    {     
          $country= Scountry::find($id);
          return view('Supliers.SuplierCountry.EidtSCountry', ['country'=>$country]);

    }

    public function update(Request $request, $id)
    {
        $country= Scountry::find($id);
        $country->country_name = $request->country_name;
        $country->save();
        return redirect(route('Scountry_index'))->with('message','Data Updated Successfully!');
        

    }

   
    public function destroy($id)
    {
        $country= Scountry::find($id);
        $country->delete();
        return redirect(route('Scountry_index'));
    }

    
    public function  ScountryTrash(Request $request)
    {

        $search = $request['search'] ?? "";
        if($search != "")
        {
            $countries= Scountry::where('country_name','like',"%$search%")->onlyTrashed()->paginate(5);
          
        }
        else{
        
            $countries= Scountry::latest()->onlyTrashed()->paginate(7);
        }      
        return view('Supliers.SuplierCountry.SuplierCountryTrash', compact("countries","search"));
    }

    
    public function ScountryReastore($id)
    {
        $country= Scountry::withTrashed()->find($id);
        if(!is_null($country)){
          $country->restore();
       }          
        return redirect(route('ScountryTrash'))->with('message','Data restored Successfully!');
    }

          
    public function ScountryForceDelete($id)
    {
        $country= Scountry::withTrashed()->find($id);
        if(!is_null($country)){
          $country->forceDelete();
       }          
        return redirect(route('ScountryTrash'));
    }
   
}
