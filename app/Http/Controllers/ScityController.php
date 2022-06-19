<?php

namespace App\Http\Controllers;

use App\Models\Scity;
use App\Models\Scountry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScityController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != "")
        {
            $cities= Scity::where('city_name','like',"%$search%")->paginate(7);
          
        }

        else{
        
            $cities= Scity::latest()->paginate(7);
        }

        $countries= Scountry::get();        
        return view('Supliers.SuplierCity.Scity', compact("countries","cities","search"));
      
    }

  
    public function store(Request $request)
    {
       //return $request;
       $city=$request->toArray();
      // $request->user_id=Auth::user()->id;
      $city['user_id']=Auth::user()->id;
     // return $city;
       Scity::create($city);
      return redirect(route('Scity_index'))->with('message','Data Inserted Successfully!');

    }

   
     public function edit($id)
    {     
        
          $city= Scity::find($id);
          $countries= Scountry::get();
          return view('Supliers.SuplierCity.EditScity', ['city'=>$city],compact("countries"));

    }
   
    public function update(Request $request, $id)
    {
        $city= Scity::find($id);
    //    $city->city_name = $request->city_name;
        $city->update($request->all());
        $city->save();  
        return redirect(route('Scity_index'))->with('message','Data Updated Successfully!');
    }

   
    public function destroy($id)
    {
        $city= Scity::find($id);
        $city->delete();
        return redirect(route('Scity_index'));
    }

    public function  ScityTrash(Request $request)
    {

        $search = $request['search'] ?? "";
        if($search != "")
        {
            $cities=Scity::where('city_name','like',"%$search%")->onlyTrashed()->paginate(10);
          
        }
        else{
        
            $cities=Scity::latest()->onlyTrashed()->paginate(10);
        }      
        return view('Supliers.SuplierCity.ScityTrash', compact("cities","search"));
    }

    
    public function ScityReastore($id)
    {
        $city=Scity::withTrashed()->find($id);
        if(!is_null($city)){
          $city->restore();
       }          
        return redirect(route('ScityTrash'))->with('message','Data restored Successfully!');
    }

          
    public function ScityForceDelete($id)
    {
        $city=Scity::withTrashed()->find($id);
        if(!is_null($city)){
          $city->forceDelete();
       }          
        return redirect(route('ScityTrash'));
    }

}
