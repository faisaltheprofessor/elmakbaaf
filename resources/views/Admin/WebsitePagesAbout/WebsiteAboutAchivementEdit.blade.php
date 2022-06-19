<x-app-layout>
    <x-slot name="header">
        @include('layouts.AdminSidebar')  
    
<!----Form of Edit Achivement  ---->
    
<div class="border-collapse w-full flex flex-col pt-4 bg-gray-100">
    <form class=" ml-5 mr-5 p-10 bg-white rounded shadow-xl" method="post" enctype="multipart/form-data"  >
      @csrf
      @method('PUT')
      <p class="text-lg text-gray-800 font-medium pb-4">Add New Achivement</p>


      <div class="inline-block mt-2 w-1/4 pr-1">
          <label class=" block text-sm text-gray-600" for="">Titale</label>
          <input   class="w-full px-2 py-2 text-gray-700 " id="" name="titale" type="text" required="" placeholder="" value="{{$achivement->titale}}" >
      </div>
      <div class="inline-block mt-2 -mx-1 pl-1 w-1/4">
          <label class=" block text-sm text-gray-600" for="">Year</label>
          <input   class="w-full px-2 py-2 text-gray-700 " id=""  name="year" type="text" required="" placeholder="" value="{{$achivement->year}}" >
      </div>
      <div class="inline-block mt-2 w-1/4 pr-1">
          <label class=" block text-sm text-gray-600" for="">Achivement</label>
          <input   class="w-full m-2 px-2 py-2 text-gray-700 " id="" name="achivement" type="text" required="" placeholder="" value="{{$achivement->titale}}">
      </div>
      <div class="inline-block mt-2 -mx-1 pl-1 w-1/4">
          <label class=" block text-sm text-gray-600" for="">Description</label>
          <input   class="w-full m-2 px-2 py-2 text-gray-700 " id=""  name="description" type="text" required="" placeholder="" value="{{$achivement->description}}">
      </div>

        <div class="mt-6">                                
          <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-700 rounded" value="submit" type="submit">Update</button>                                  
      </div>

    </form>
</div>
 </x-slot>

</x-app-layout>      