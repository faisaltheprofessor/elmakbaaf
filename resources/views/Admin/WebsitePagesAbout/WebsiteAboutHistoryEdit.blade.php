<x-app-layout>
    <x-slot name="header">
        @include('layouts.AdminSidebar')  
    
<!----Edit Form of History  ---->
    
<div class="border-collapse w-full flex flex-col pt-4 bg-gray-100">
    <form class="p-10 ml-5 mr-5 bg-white rounded shadow-xl" method="Post" enctype="multipart/form-data"  >
        @csrf
        @method('PUT')
      <p class="text-lg text-gray-800 font-medium pb-4">Edit history</p>

 
      <div class="inline-block mt-2 -mx-1 pl-1 w-1/4">
          <label class=" block text-sm text-gray-600" for="">Year</label>
          <input   class="w-full px-2 py-2 text-gray-700 " id=""  name="year" type="text" required="" placeholder="" value="{{$history->year}}">
      </div>
    
      <div class="inline-block mt-2 -mx-1 pl-1 w-1/4">
          <label class=" block text-sm text-gray-600" for="">Description</label>
          <input   class="w-full m-2 px-2 py-2 text-gray-700 " id=""  name="description" type="text" required="" placeholder="" value=" {{$history->description}}" >
      </div>

         <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
          <label class="ml-5 block text-sm text-gray-600" for="">Change Picture:</label>
          <input   class=" ml-3 w-full px-2 py-2 text-gray-700 " id=""  name="img" type="file" required="" placeholder="" >
          <img src="{{ asset('Images/History/'.$history->img)  }}" alt="img" width="300px">
       </div> 

        <div class="mt-6">                                
          <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-700 rounded" value="submit" type="submit">Submit</button>                                  
      </div>
    </form>
    <br>

</x-app-layout>