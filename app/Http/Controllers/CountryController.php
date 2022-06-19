<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Session;

class CountryController extends Controller
{
   
    public function index(Request $request)
    {

        $search = $request['search'] ?? "";
        if($search != "")
        {
            $countries= Country::where('country_name','like',"%$search%")->paginate(5);
          
        }
        else{
        
            $countries= Country::latest()->paginate(7);
        }      
        return view('Clients.Country.AddNewCountry', compact("countries","search"));
    }

  
    public function store(Request $request)
    {
        $user = $request->user();
        $country = new Country;
        $country->country_name = $request->country_name;
        $user->country()->save($country);
        // Session::flash('status','country has been saved successfully');
        return redirect(route('country_index'))->with('message','Data Inserted Successfully!');

    }

   
    public function edit($id)
    {     
          $country= Country::find($id);
          return view('Clients.Country.EditCountry', ['country'=>$country]);

    }

    public function update(Request $request, $id)
    {
        $country= Country::find($id);
        $country->country_name = $request->country_name;
        $country->save();
        return redirect(route('country_index'))->with('message','Data Updated Successfully!');
        

    }

    public function destroy($id)
    {
        $country= Country::find($id);
        $country->delete();
        return redirect(route('country_index'));
    }

   

        public function  CountryTrash(Request $request)
        {
    
            $search = $request['search'] ?? "";
            if($search != "")
            {
                $countries= Country::where('country_name','like',"%$search%")->onlyTrashed()->paginate(5);
              
            }
            else{
            
                $countries= Country::latest()->onlyTrashed()->paginate(7);
            }      
            return view('Clients.Country.CountryTrash', compact("countries","search"));
        }

        
        public function CountryReastore($id)
        {
            $country= Country::withTrashed()->find($id);
            if(!is_null($country)){
              $country->restore();
           }          
            return redirect(route('CountryTrash'))->with('message','Data restored Successfully!');
        }

              
        public function CountryForceDelete($id)
        {
            $country= Country::withTrashed()->find($id);
            if(!is_null($country)){
              $country->forceDelete();
           }          
            return redirect(route('CountryTrash'));
        }
        
}
