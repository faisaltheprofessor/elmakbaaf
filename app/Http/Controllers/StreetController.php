<?php

namespace App\Http\Controllers;

use App\Models\Street;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StreetController extends Controller
{

    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != "")
        {
           $streets= street::where('street_name','like',"%$search%")->paginate(7);
          
        }

        else{
           $streets= street::latest()->paginate(7);          
        }
        $cities= City::get();
        return view('Clients.Street.AddNewStreet' , compact("cities","streets","search"));
    }

   
    public function store(Request $request)
    {

      $street=$request->toArray();
      $street['user_id']=Auth::user()->id;
      Street::create($street);
      return redirect(route('street_index'))->with('message','Data Inserted Successfully!');

    }

  
    public function edit($id)
    {
        $street= Street::find($id);
        $cities= City::get();
        return view('Clients.Street.EditStreet', ['street'=>$street],compact("cities"));
    }

    
    public function update(Request $request, $id)
    {
        $street= Street::find($id);
        $street->update($request->all());
        $street->save();
        return redirect(route('street_index'))->with('message','Data Updated Successfully!');

    }

    public function destroy($id)
    {
        $street= Street::find($id);
        $street->delete();
        return redirect(route('street_index'));
    }

    
    public function  StreetTrash(Request $request)
    {

        $search = $request['search'] ?? "";
        if($search != "")
        {
             $streets= Street::where('street_name','like',"%$search%")->onlyTrashed()->paginate(5);
          
        }
        else{
        
             $streets= Street::latest()->onlyTrashed()->paginate(7);
        }      
        return view('Clients.Street.StreetTrash', compact("streets","search"));
    }

    
    public function StreetReastore($id)
    {
        $street= Street::withTrashed()->find($id);
        if(!is_null($street)){
          $street->restore();
       }          
        return redirect(route('StreetTrash'))->with('message','Data restored Successfully!');
    }

          
    public function StreetForceDelete($id)
    {
        $street= Street::withTrashed()->find($id);
        if(!is_null($street)){
          $street->forceDelete();
       }          
        return redirect(route('StreetTrash'));
    }

}
