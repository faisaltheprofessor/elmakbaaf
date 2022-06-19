<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Websitegallary;
use Illuminate\Http\Request;
use File;

class WebsitegallaryController extends Controller
{
    public function index()
    {
        $gallary =  Websitegallary::latest()->paginate(10);
        return view('Admin.WebsitePagesGallary', compact("gallary"));
    }


    public function store(Request $request)
    {
        $gallary=$request->toArray();
        $gallary['user_id']=Auth::user()->id;
       
        if($request->hasfile('img'))
          {
           
            $file = $request->file('img');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('Images/Gallary/', $filename); 
            $gallary['img']=$filename; 
                 
        } 
    //    return $request;
        Websitegallary::create($gallary);
     
       return redirect(route('WebsiteGallary'))->with('message','Data Inserted Successfully!');  
    }


    public function destroy($id)
    {
        $gallary= Websitegallary::find($id);
        // $imageToBeDeleted = "Images/Gallary/".$gallary->img;

        // if(File::exists($imageToBeDeleted)){
        //     File::delete($imageToBeDeleted);
        // } 
        $gallary->delete();
        return redirect(route('WebsiteGallary'));  
    }

    
    public function WebsitegallaryTrash()
    {

        $gallary =  Websitegallary::latest()->onlyTrashed()->paginate(15);
        return view("Admin.GallaryTrash" , compact("gallary"));

    }

    
    public function WebsitegallaryReastore($id)
    {
        $gallary =  Websitegallary::withTrashed()->find($id);
        if(!is_null($gallary)){
           $gallary->restore();
       }          
        return redirect(route('WebsitegallaryTrash'))->with('message','Data restored Successfully!');
    }

          
    public function WebsitegallaryForceDelete($id)
    {
        $gallary =  Websitegallary::withTrashed()->find($id);
        $imageToBeDeleted = "Images/Gallary/".$gallary->img;

        if(File::exists($imageToBeDeleted)){
            File::delete($imageToBeDeleted);
        } 
       
        // if(!is_null($gallary)){
           $gallary->forceDelete();
    //    }          
        return redirect(route('WebsitegallaryTrash'));
    }
}
