<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Aboutcollection;
use Illuminate\Http\Request;
use File;

class AboutcollectionController extends Controller
{
    
    public function index()
    {
        $collications = Aboutcollection::latest()->paginate(10);
        return view('Admin.WebsitePagesAbout.WebsiteAboutCollication', compact("collications"));
    }

 

    public function store(Request $request)
    {
        $collection=$request->toArray();
        $collection['user_id']=Auth::user()->id;
       
        if($request->hasfile('img'))
          {          
            $file = $request->file('img');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('Images/Collication/', $filename); 
            $collection['img']=$filename; 
                 
        } 
       
        Aboutcollection::create($collection);
     
       return redirect(route('websiteAboteCollication'))->with('message','Data Inserted Successfully!');   
    }



    public function edit($id)
    {  
  
        $collication = Aboutcollection::find($id);
        return view('Admin.WebsitePagesAbout.WebsiteAboutCollicationEdit', ['collication'=>$collication]);
         
    }

      
    public function update(Request $request, $id)
    {
        $collication = Aboutcollection::find($id);
        $data = $request->toArray();
        if( $request->hasfile('img'))
        {
           
            $imageToBeDeleted = "Images/Collication/".$collication->img;

            if(File::exists($imageToBeDeleted)){
                File::delete($imageToBeDeleted);
            } 
            $file = $request->file('img');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('Images/Collication/', $filename); 
            $data['img']=$filename; 
    
      } 
        
         $collication->update($data);
         $collication->save();
        return redirect(route('websiteAboteCollication'))->with('message','Data Updated Successfully!');
    }

  

 
    public function destroy($id)
    {
        $collication= Aboutcollection::find($id);
        // $imageToBeDeleted = "Images/Collication/".$collication->img;

        // if(File::exists($imageToBeDeleted)){
        //     File::delete($imageToBeDeleted);
        // } 
        $collication->delete();
        return redirect(route('websiteAboteCollication'));   
    }
    
    public function WebsitecollectionTrash(Request $request)
    {
       
        $collications = Aboutcollection::latest()->paginate(10);
        return view('Admin.WebsitePagesAbout.CollicationTrash', compact("collications"));
       
    }

        public function WebsitecollectionReastore($id)
        {
            $collication= Aboutcollection::withTrashed()->find($id);
                    if(!is_null($collication)){
                    $collication->restore();
                }          
            return redirect(route('WebsitecollectionTrash'))->with('message','Data restored Successfully!');
        }

            
        public function WebsitecollectionForceDelete($id)
        {
            $collication= Aboutcollection::withTrashed()->find($id);
                $imageToBeDeleted = "Images/Collication/".$collication->img;

                if(File::exists($imageToBeDeleted)){
                    File::delete($imageToBeDeleted);
                } 
                $collication->forceDelete();      
              return redirect(route('WebsitecollectionTrash'));
        }

}
