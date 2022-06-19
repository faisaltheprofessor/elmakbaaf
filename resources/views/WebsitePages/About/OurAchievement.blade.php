@extends('mainPage')
@section('Page_Content')
<br>
<br/>
<section class="pt-4 pb-12 ">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-col text-center w-full mb-20">
        <h1 class="text-2xl font-medium title-font mb-4 text-gray-900">Our Achievement</h1>
       
      </div>
      <div class=" flex-wrap -m-4  grid gap-2 md:grid-cols-4 items-center">
        @foreach ($achivement as $achivement) 
        <div class="p-4  ">
          <div class="h-full flex flex-col items-center text-center">
            
            <div class="w-full">
              <h2 class="title-font font-medium text-lg text-gray-900">{{$achivement->titale}}</h2>
              <h3 class="text-gray-500 mb-3">{{$achivement->year}}</h3>
              <p class="mb-4">{{$achivement->achivement}}</p>
              <p class="mb-4">---------------------</p>   
              <p class="mb-4">{{$achivement->description}}</p>                   
                                  
            </div>
          </div>
        </div>
        @endforeach

        <div class="p-4  ">
          <div class="h-full flex flex-col items-center text-center">
            
            <div class="w-full">
              <h2 class="title-font font-medium text-lg text-gray-900">Kabul - Afghanistan</h2>
              <h3 class="text-gray-500 mb-3">2004</h3>
              <p class="mb-4">2nd Afghan Handmade Carpet Exhibition</p>
              <p class="mb-4">---------------------</p>   
              <p class="mb-4">Honorary Award</p>                   
                                  
            </div>
          </div>
        </div> <div class="p-4  ">
          <div class="h-full flex flex-col items-center text-center">
            
            <div class="w-full">
              <h2 class="title-font font-medium text-lg text-gray-900">Kabul - Afghanistan</h2>
              <h3 class="text-gray-500 mb-3">2004</h3>
              <p class="mb-4">2nd Afghan Handmade Carpet Exhibition</p>
              <p class="mb-4">---------------------</p>   
              <p class="mb-4">Honorary Award</p>                   
                                  
            </div>
          </div>
        </div>



        <div class="p-4  ">
          <div class="h-full flex flex-col items-center text-center">
            
            <div class="w-full">
              <h2 class="title-font font-medium text-lg text-gray-900">Kabul - Afghanistan</h2>
              <h3 class="text-gray-500 mb-3">2004</h3>
              <p class="mb-4">2nd Afghan Handmade Carpet Exhibition</p>
              <p class="mb-4">---------------------</p>   
              <p class="mb-4">Honorary Award</p>                   
                                  
            </div>
          </div>
        </div>



        <div class="p-4  ">
          <div class="h-full flex flex-col items-center text-center">
            
            <div class="w-full">
              <h2 class="title-font font-medium text-lg text-gray-900">Kabul - Afghanistan</h2>
              <h3 class="text-gray-500 mb-3">2004</h3>
              <p class="mb-4">2nd Afghan Handmade Carpet Exhibition</p>
              <p class="mb-4">---------------------</p>   
              <p class="mb-4">Honorary Award</p>                   
                                  
            </div>
          </div>
        </div>


      </div>
    </div>
  </section>
  @endsection