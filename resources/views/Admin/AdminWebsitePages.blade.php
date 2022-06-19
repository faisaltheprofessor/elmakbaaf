<x-app-layout>
    <x-slot name="header">
        @include('layouts.AdminSidebar')  
    
<!----Form of Product  ---->
    
<div class="border-collapse w-full flex flex-col pt-4">
    <form class="p-10 bg-white rounded shadow-xl" method="Post" enctype="multipart/form-data"  >
      @csrf
        <p class="text-lg text-gray-800 font-medium pb-4">Add New Product</p>

        <div class="inline-block mt-2 w-1/2 pr-1">
            <label class=" block text-sm text-gray-600" for="">Dsighn</label>
            <input   class="w-full px-2 py-2 text-gray-700 " id="" name="design" type="text" required="" placeholder="" >
        </div>
        <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
            <label class=" block text-sm text-gray-600" for="">Color</label>
            <input   class="w-full px-2 py-2 text-gray-700 " id=""  name="color" type="text" required="" placeholder="" >
        </div>

        <div class="inline-block mt-2 w-1/3 pr-1">
          <label class=" block text-sm text-gray-600" for="">Lenght</label>
          <input   class="w-full px-2 py-2 text-gray-700 " id="" name="lenght" type="number"  required="" placeholder="" >
      </div>
      <div class="inline-block mt-2 -mx-1 pl-1 w-1/3">
          <label class=" block text-sm text-gray-600" for="">Width</label>
          <input   class="w-full px-2 py-2 text-gray-700 " id=""  name="width" type="number" required="" placeholder="" >
      </div>

      <div class="inline-block mt-2 -mx-1 pl-1 w-1/3">
            <label class=" block text-sm text-gray-600" for="">Price</label>
            <input   class="w-full px-2 py-2 m-2 text-gray-700 " id="" name="price" type="text" required="" placeholder="" >
        </div>



        <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
          <label class=" block text-sm text-gray-600" for="">Add Picture</label>
          <input   class="w-full px-2 py-2 text-gray-700 " id=""  name="img" type="file" required="" placeholder="" >
      </div>    
      
        <div class="mt-6">                                
          <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-700 rounded" value="submit" type="submit">Submit</button>                         
         
     </div>
    </form>  

</div>
 
 </x-slot>

</x-app-layout>