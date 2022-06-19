<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\City;
use App\Models\Country;
use App\Models\Street;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddClientController extends Controller
{
   
    public function index()
    {
        $countries= Country::get();
        $cities= City::get();
        $streets=Street::get();
        return view('Clients.AddClient',compact("countries","cities","streets"));
    }
    
    public function ShowAllClient(Request $request)
    {

        $search = $request['search'] ?? "";
        if($search != "")
        {
            $clients= Client::where('first_name','like',"%$search%")->orWhere('email','like',"%$search%")->orWhere('company_name','like',"%$search%")->paginate(10);
       }

     
        else{
            $clients= Client::latest()->paginate(10);
        }
        
        $countries= Country::get();
        $cities= City::get();
        $streets=Street::get();
        return view('Clients.AllClient' ,compact("clients","countries","cities","streets","search"));
    }




    public function store(Request $request)
    {
       $client=$request->toArray();
       $request->user_id=Auth::user()->id;
       $client['user_id']=Auth::user()->id;
       Client::create($client);
        return redirect(route('AddClient_index'))->with('message','Data Inserted Successfully!');
    }


    public function edit($id)
    {
        $client= Client::find($id);
        $countries= Country::get();
        $cities= City::get();
        $streets=Street::get();
        return view('Clients.EditClient',['client'=>$client],compact("countries","cities","streets"));
         
          
        //  return view('EditClient', ['client'=>$client]);
    }

    public function update(Request $request, $id)
    {
        $client= Client::find($id);
        $client->update($request->all());
        $client->save();
        return redirect(route('AllClient_show'))->with('message','Data Updated Successfully!');
    }

   
    public function destroy($id)
    {
        $client= Client::find($id);
        $client->delete();
        return redirect(route('AllClient_show'));
    }

    public function  ClientTrash(Request $request)
    {

        $search = $request['search'] ?? "";
        if($search != "")
        {
           $clients= Client::where('first_name','like',"%$search%")->orWhere('email','like',"%$search%")->orWhere('company_name','like',"%$search%")->paginate(10);
          
        }
        else{
        
           $clients= Client::latest()->onlyTrashed()->paginate(10);
        }      
        return view('Clients.ClientTrash', compact("clients","search"));
    }

    
    public function ClientReastore($id)
    {
        $client= Client::withTrashed()->find($id);
        if(!is_null($client)){
          $client->restore();
       }          
        return redirect(route('ClientTrash'))->with('message','Data restored Successfully!');
    }

          
    public function ClientForceDelete($id)
    {
        $client= Client::withTrashed()->find($id);
        if(!is_null($client)){
            $client->forceDelete();
       }          
        return redirect(route('ClientTrash'));
    }
}
