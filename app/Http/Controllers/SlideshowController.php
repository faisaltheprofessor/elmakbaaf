<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Slideshow;
use Illuminate\Http\Request;
use File;
class SlideshowController extends Controller
{
   
    public function index()
    {
        $slideshows = Slideshow::latest()->paginate(15);
        return view("Admin.WebsitePagesHome" , compact("slideshows"));
    }


    public function store(Request $request)
    {
        $slideshow=$request->toArray();
        $slideshow['user_id']=Auth::user()->id;
       
        if($request->hasfile('img'))
          {
           
            $file = $request->file('img');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('Images/Slideshow/', $filename); 
            $slideshow['img']=$filename; 
                 
        } 
       
        Slideshow::create($slideshow);
     
       return redirect(route('slideshow'))->with('message','Data Inserted Successfully!');     
     
    }

   
    public function destroy($id)
    {
        $slideshow= Slideshow::find($id);
        // $imageToBeDeleted = "Images/Slideshow/".$slideshow->img;

        // if(File::exists($imageToBeDeleted)){
        //     File::delete($imageToBeDeleted);
        // } 
        $slideshow->delete();
        return redirect(route('slideshow'));   
    }

    public function SlideshowTrash()
    {

        $slideshows = Slideshow::latest()->paginate(15);
        return view("Admin.SlideshowTrash" , compact("slideshows"));

    }

    
    public function SlideshowReastore($id)
    {
        $slideshow= Slideshow::withTrashed()->find($id);
        if(!is_null($slideshow)){
          $slideshow->restore();
       }          
        return redirect(route('SlideshowTrash'))->with('message','Data restored Successfully!');
    }

          
    public function SlideshowForceDelete($id)
    {
        $slideshow= Slideshow::withTrashed()->find($id);
        $imageToBeDeleted = "Images/Slideshow/".$slideshow->img;

        if(File::exists($imageToBeDeleted)){
            File::delete($imageToBeDeleted);
        } 

          $slideshow->forceDelete();          
        return redirect(route('SlideshowTrash'));
    }
}
