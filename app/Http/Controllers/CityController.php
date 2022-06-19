<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{

    public function index(Request $request)
    {
        
        $search = $request['search'] ?? "";
        if($search != "")
        {
            $cities= City::where('city_name','like',"%$search%")->paginate(7);
          
        }

        else{
        
            $cities= City::latest()->paginate(7);
        }

        $countries= Country::get();
        return view('Clients.City.AddNewCity', compact("countries","cities","search"));
      
    }

  
    public function store(Request $request)
    {
       
       //return $request;
       $city=$request->toArray();
      // $request->user_id=Auth::user()->id;
      $city['user_id']=Auth::user()->id;
      //return $city;
      City::create($city);
      return redirect(route('city_index'))->with('message','Data Inserted Successfully!');

    }

   
     public function edit($id)
    {     
        
          $city= City::find($id);
          $countries= Country::get();
          return view('Clients.City.EditCity', ['city'=>$city],compact("countries"));

    }
   
    public function update(Request $request, $id)
    {
        $city= City::find($id);
    //    $city->city_name = $request->city_name;
        $city->update($request->all());
        $city->save();  
        return redirect(route('city_index'))->with('message','Data Updated Successfully!');
    }

   
    public function destroy($id)
    {
        $city= City::find($id);
        $city->delete();
        return redirect(route('city_index'));
    }

    public function  CityTrash(Request $request)
    {

        $search = $request['search'] ?? "";
        if($search != "")
        {
            $cities= City::where('city_name','like',"%$search%")->onlyTrashed()->paginate(5);
          
        }
        else{
        
            $cities= City::latest()->onlyTrashed()->paginate(7);
        }      
        return view('Clients.City.CityTrash', compact("cities","search"));
    }

    
    public function CityReastore($id)
    {
        $city= City::withTrashed()->find($id);
        if(!is_null($city)){
          $city->restore();
       }          
        return redirect(route('CityTrash'))->with('message','Data restored Successfully!');
    }

          
    public function CityForceDelete($id)
    {
        $city= City::withTrashed()->find($id);
        if(!is_null($city)){
          $city->forceDelete();
       }          
        return redirect(route('CityTrash'));
    }
    
}


