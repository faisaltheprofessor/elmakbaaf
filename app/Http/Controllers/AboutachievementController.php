<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Aboutachievement;
use Illuminate\Http\Request;

class AboutachievementController extends Controller
{
  
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != "")
        {
       
            $achivements = Aboutachievement::Where('titale','like',"%$search%")->orWhere('year','like',"%$search%")->orWhere('achivement','like',"%$search%")->paginate(10);
          
        }
    
        else{
            $achivements = Aboutachievement::latest()->paginate(10);
        }

       
        return view('Admin.WebsitePagesAbout.WebsiteAboutAchivement', compact("achivements","search"));
    }

   
   

  
    public function store(Request $request)
    {
        $achivement=$request->toArray();
        $achivement['user_id']=Auth::user()->id;
       Aboutachievement::create($achivement);
     
       return redirect(route('websiteAboteAchivement'))->with('message','Data Inserted Successfully!');   
    }

    
   
    public function edit($id)
    {     
        
         $achivement= Aboutachievement::find($id);
          return view('Admin.WebsitePagesAbout.WebsiteAboutAchivementEdit', ['achivement'=>$achivement]);

    }
   
    public function update(Request $request, $id)
    {
        $achivement= Aboutachievement::find($id);
        $achivement->update($request->all());
        $achivement->save();  
        return redirect(route('websiteAboteAchivement'))->with('message','Data Updated Successfully!');   
    }


    public function destroy($id)
    {
        $achivement= Aboutachievement::find($id);
        $achivement->delete();
        return redirect(route('websiteAboteAchivement')); 
    }

    public function websiteAboteAchivementtrash(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != "")
        {
       
            $achivements = Aboutachievement::Where('titale','like',"%$search%")->orWhere('year','like',"%$search%")->orWhere('achivement','like',"%$search%")->paginate(10);
          
        }
    
        else{
            $achivements = Aboutachievement::latest()->onlyTrashed()->paginate(10);
        }

       
        return view('Admin.WebsitePagesAbout.AchivementTrash', compact("achivements","search"));
    }

        public function WebsiteAboteAchivementReastore($id)
        {
            $achivement= Aboutachievement::withTrashed()->find($id);
            if(!is_null($achivement)){
            $achivement->restore();
        }          
            return redirect(route('WebsiteAboteAchivementTrash'))->with('message','Data restored Successfully!');
        }

            
        public function WebsiteAboteAchivementForceDelete($id)
        {
            $achivement= Aboutachievement::withTrashed()->find($id);
            if(!is_null($achivement)){
            $achivement->forceDelete();
        }          
            return redirect(route('WebsiteAboteAchivementTrash'));
        }

}
