<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use App\Models\Suplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {

        $search = $request['search'] ?? "";
        if($search != "")
        {
           $contacts= Contacts::where('contact_number','like',"%$search%")->paginate(7);
          
        }
        else{
        
           $contacts= Contacts::latest()->paginate(7);
        }      

        $supliers= Suplier::get();
        return view('Supliers.ContactSuplier', compact("supliers","contacts","search"));
    }

    public function store(Request $request)
    {
        $contact=$request->toArray();
        $contact['user_id']=Auth::user()->id;
        Contacts::create($contact);
        return redirect(route('Contacts_index'))->with('message','Data Inserted Successfully!');
    }

    
    public function edit($id)
    {
        
        $contacts= Contacts::find($id);
        return view('Supliers.EditContactNumber', ['contact'=>$contacts]);
    }

   
    public function update(Request $request, $id)
    {
        $contact= Contacts::find($id);
        $contact->update($request->all());
        $contact->save();  
        return redirect(route('Contacts_index'))->with('message','Data Updated Successfully!');
    }

   
    public function destroy($id)
    {
        $contact= Contacts::find($id);
        $contact->delete();
        return redirect(route('Contacts_index'));
    }

      
    public function  ContactTrash(Request $request)
    {

        $search = $request['search'] ?? "";
        if($search != "")
        {
             $contacts= Contacts::where('contact_number','like',"%$search%")->paginate(10);
          
        }
        else{
        
             $contacts= Contacts::latest()->onlyTrashed()->paginate(10);
        }      
        return view('Supliers.SuplierContactTrash', compact("contacts","search"));
    }

    
    public function ContactReastore($id)
    {
        $contact= Contacts::withTrashed()->find($id);
        if(!is_null( $contact)){
           $contact->restore();
       }          
        return redirect(route('ContactTrash'))->with('message','Data restored Successfully!');
    }

          
    public function ContactForceDelete($id)
    {
        $contact= Contacts::withTrashed()->find($id);
        if(!is_null( $contact)){
             $contact->forceDelete();
       }          
        return redirect(route('ContactTrash'));
    }

    
}
