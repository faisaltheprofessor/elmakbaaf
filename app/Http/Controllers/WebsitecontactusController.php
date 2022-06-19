<?php

namespace App\Http\Controllers;

use App\Models\Websitecontactus;
use Illuminate\Http\Request;

class WebsitecontactusController extends Controller
{
 
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != "")
        {
            $contactedpeoples= Websitecontactus::where('first_name','like',"%$search%")->orWhere('email','like',"%$search%")->orWhere('contact_num','like',"%$search%")->orWhere('messege','like',"%$search%")->paginate(10);
       }

     
        else{
            $contactedpeoples= Websitecontactus::latest()->paginate(10);
        }
      
        return view('Admin.WebsitePagesContact', compact("contactedpeoples","search"));
    }




    public function store(Request $request)
    {


      $request->validate([
       
            // 'first_name' => 'required',
            // 'last_name' => 'required',        
            // 'email' => 'required|email',            
            // 'contact_num' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        
             'messege' => 'required'
         ]);

        $websitecontactus=$request->toArray();        
        Websitecontactus::create($websitecontactus);
        // return $request;
         return redirect(route('contact'))->with('message','Thank you for massege!');;
    }



    public function destroy($id)
    {
        $contactedpeople= Websitecontactus::find($id);
        $contactedpeople->delete();
        return redirect(route('websitecontactus'));   
    }
}
