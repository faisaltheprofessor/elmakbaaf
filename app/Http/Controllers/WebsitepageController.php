<?php

namespace App\Http\Controllers;

use App\Models\Websitepage;
use Illuminate\Http\Request;
use App\Models\Slideshow;
use App\Models\Websitegallary;
use App\Models\Aboutcollection;
use App\Models\Aboutachievement;
use App\Models\Aboutourhistory;

class WebsitepageController extends Controller
{

    public function main()
    {
        return view('mainPage');
    }

    public function home()
    {
        $slideshows = Slideshow::latest()->paginate(15);
        return view('WebsitePages.Home', compact("slideshows"));
    }


    public function about()
    {
        $history = Aboutourhistory::get();
        return view('WebsitePages.About.About', compact("history"));
    }


    
    public function carpetvalue()
    {
        return view('WebsitePages.About.OurCarpetValues');
    }

    
    public function collection()
    {
        $collication = Aboutcollection::get();
        return view('WebsitePages.About.Collections',compact("collication"));
    }
  
    public function achievement()
    {
        $achivement = Aboutachievement::get();
        return view('WebsitePages.About.OurAchievement',compact("achivement"));
    }
  
    
    public function contactus()
    {
        return view('WebsitePages.Contact');
    }

    public function gallary()
    {
        $gallary =  Websitegallary::get();
        return view('WebsitePages.Gallary',compact("gallary"));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(Websitepage $websitepage)
    {
        //
    }

    public function edit(Websitepage $websitepage)
    {
        //
    }


    public function update(Request $request, Websitepage $websitepage)
    {
        //
    }

}
