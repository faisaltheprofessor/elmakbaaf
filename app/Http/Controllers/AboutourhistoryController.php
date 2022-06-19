<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Aboutourhistory;
use Illuminate\Http\Request;
use File;

class AboutourhistoryController extends Controller
{
    
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != "")
        {
       
            $histories = Aboutourhistory::Where('description','like',"%$search%")->orWhere('year','like',"%$search%")->paginate(10);
          
        }
    
        else{
            $histories = Aboutourhistory::latest()->paginate(10);
        }
       
        return view('Admin.WebsitePagesAbout.WebsiteAboutHistory',compact("histories","search"));
    }



    public function store(Request $request)
    {
          $history=$request->toArray();
          $history['user_id']=Auth::user()->id;
       
        if($request->hasfile('img'))
          {
           
            $file = $request->file('img');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('Images/History/', $filename); 
            $history['img']=$filename; 
                 
        } 
       
        Aboutourhistory::create($history);
     
       return redirect(route('websiteAboteHistory'))->with('message','Data Inserted Successfully!');     
    }

 
    public function edit($id)
    {  
  
        $history= Aboutourhistory::find($id);
        return view('Admin.WebsitePagesAbout.WebsiteAboutHistoryEdit', ['history'=>$history]);
         
    }

      
    public function update(Request $request, $id)
    {
        $history= Aboutourhistory::find($id);
        $data = $request->toArray();
        if( $request->hasfile('img'))
        {
           
            $imageToBeDeleted = "Images/History/".$history->img;

            if(File::exists($imageToBeDeleted)){
                File::delete($imageToBeDeleted);
            } 
            $file = $request->file('img');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('Images/History/', $filename); 
            $data['img']=$filename; 
    
      } 
        
         $history->update($data);
         $history->save();
        return redirect(route('websiteAboteHistory'))->with('message','Data Updated Successfully!');
    }

 
    public function destroy($id)
    {
        $history= Aboutourhistory::find($id);
        // $imageToBeDeleted = "Images/History/".$history->img;

        // if(File::exists($imageToBeDeleted)){
        //     File::delete($imageToBeDeleted);
        // } 
        $history->delete();
        return redirect(route('websiteAboteHistory'));      
    }

    public function WebsiteAboteHistoryTrash(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != "")
        {
       
            $histories = Aboutourhistory::Where('description','like',"%$search%")->orWhere('year','like',"%$search%")->paginate(10);
          
        }
    
        else{
            $histories = Aboutourhistory::latest()->onlyTrashed()->paginate(10);
        }

       
        return view('Admin.WebsitePagesAbout.HistoryTrash', compact("histories","search"));
    }

        public function WebsiteAboteHistoryReastore($id)
        {
            $history= Aboutourhistory::withTrashed()->find($id);
            if(!is_null($history)){
            $history->restore();
        }          
            return redirect(route('WebsiteAbouteHistoryTrash'))->with('message','Data restored Successfully!');
        }

            
        public function WebsiteAboteHistoryForceDelete($id)
        {
            $history= Aboutourhistory::withTrashed()->find($id);
            // if(!is_null($history)){
                $imageToBeDeleted = "Images/History/".$history->img;

                if(File::exists($imageToBeDeleted)){
                    File::delete($imageToBeDeleted);
                } 
            $history->forceDelete();
        // }          
            return redirect(route('WebsiteAbouteHistoryTrash'));
        }


}
