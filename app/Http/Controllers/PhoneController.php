<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhoneController extends Controller
{
  
    public function index(Request $request)
    {

        $search = $request['search'] ?? "";
        if($search != "")
        {
            $phones= Phone::where('contact_number','like',"%$search%")->paginate(10);
          
        }
        else{
        
            $phones= Phone::latest()->paginate(10);
        }      

        $clients= Client::get();
        return view('Clients.PhoneNumber.AddPhoneNumber', compact("clients","phones","search"));
    }


    public function store(Request $request)
    {
        $phone=$request->toArray();
        $phone['user_id']=Auth::user()->id;
        Phone::create($phone);
        return redirect(route('Phone_index'))->with('message','Data Inserted Successfully!');;
    }

    
    public function edit($id)
    {
        
        $phones= Phone::find($id);
        return view('Clients.PhoneNumber.EditPhone', ['phone'=>$phones]);
    }

   
    public function update(Request $request, $id)
    {
        $phone= Phone::find($id);
        $phone->update($request->all());
        $phone->save();  
        return redirect(route('Phone_index'))->with('message','Data Updated Successfully!');
    }

   
    public function destroy($id)
    {
        $phone= Phone::find($id);
        $phone->delete();
        return redirect(route('Phone_index'));
    }

    
    public function  PhoneTrash(Request $request)
    {

        $search = $request['search'] ?? "";
        if($search != "")
        {
            $phones= Phone::where('contact_number','like',"%$search%")->onlyTrashed()->paginate(10);
          
        }
        else{
        
            $phones= Phone::latest()->onlyTrashed()->paginate(7);
        }      
        return view('Clients.PhoneNumber.ClientPhoneTrash', compact("phones","search"));
    }

    
    public function PhoneReastore($id)
    {
        $phone= Phone::withTrashed()->find($id);
        if(!is_null($phone)){
          $phone->restore();
       }          
        return redirect(route('PhoneTrash'))->with('message','Data restored Successfully!');
    }

          
    public function PhoneForceDelete($id)
    {
        $phone= Phone::withTrashed()->find($id);
        if(!is_null($phone)){
            $phone->forceDelete();
       }          
        return redirect(route('PhoneTrash'));
    }
}
