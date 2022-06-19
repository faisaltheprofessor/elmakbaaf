<x-app-layout>
    <x-slot name="header">
            
    <div class="border-collapse w-full flex flex-col pt-4">
        <form class="p-10 bg-white rounded shadow-xl" method="Post" enctype="multipart/form-data" >
          @csrf
          @method('PUT')
            <p class="text-lg text-gray-800 font-medium pb-4">Edit OrderedItem</p>

            
            <div class="inline-block mt-2 w-1/2 pr-1">
                <label class=" block text-sm text-gray-600" for="">Collication</label>
                <input   class="w-full px-2 py-2 text-gray-700 " id=""  name="collication"  type="text" required="" placeholder="" value="{{$orderitem->collication}}" >
            </div>
            <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                <label class=" block text-sm text-gray-600" for="">Size</label>
                <input   class="w-full px-2 py-2 text-gray-700 " id=""  name="size" type="text" required="" placeholder="" value="{{$orderitem->size}}">
            </div>
    
            <div class="inline-block mt-2 w-1/2 pr-1">
                <label class=" block text-sm text-gray-600" for="">Dsighn</label>
                <input   class="w-full px-2 py-2 text-gray-700 " id="" name="design" type="text" required="" placeholder="" value="{{$orderitem->design}}" >
            </div>
            <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                <label class=" block text-sm text-gray-600" for="">Color</label>
                <input   class="w-full px-2 py-2 text-gray-700 " id=""  name="color" type="text" required="" placeholder="" value="{{$orderitem->color}}">
            </div>
    
            <div class="inline-block mt-2 w-1/2 pr-1">
              <label class=" block text-sm text-gray-600" for="">Lenght</label>
              <input   class="w-full px-2 py-2 text-gray-700 " id="" name="lenght" type="number"  required="" placeholder=""  value="{{$orderitem->lenght}}">
          </div>
          <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
              <label class=" block text-sm text-gray-600" for="">Width</label>
              <input   class="w-full px-2 py-2 text-gray-700 " id=""  name="width" type="number" required="" value="{{$orderitem->width}}"  >
          </div>
{{-- 
          <div class="inline-block mt-2 w-1/2 pr-1">
            <label class=" block text-sm text-gray-600" for="">Quantity</label>
            <input   class="w-full px-2 py-2 text-gray-700 " id="" name="quantity" type="text"  required="" placeholder=""  value="{{$orderitem->quantity}}">
        </div> --}}
        <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
            <label class=" block text-sm text-gray-600" for="">Quality</label>
            <input   class="w-full px-2 py-2 text-gray-700 " id=""  name="quality" type="text" required="" value="{{$orderitem->quality}}"  >
        </div>

              <div class="inline-block mt-2 -mx-1 pl-1 w-1/2 ml-1">
                <label class=" block text-sm text-gray-600" for="">Unit_area</label>
                <input   class="w-full px-2 py-2 text-gray-700 " id="" name="unit_area" type="text" required="" value="{{$orderitem->unit_area}}" >
            </div>
    

            <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                <label class=" block text-sm text-gray-600" for="">Add Picture</label>

                
                <input   class="w-full px-2 py-2 text-gray-700 " id=""  name="file" type="file" required="" placeholder="" >
                 
                    <img src="{{ asset('Images/Order/'.$orderitem->file) }}" alt="file" width="300px"  height="200px">
             
             
                </div>  
    
            <div class="mt-6 inline-block mt-2 -mx-1 pl-1 w-1/2 ml-1">                                
              <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-700 rounded" value="submit" type="submit">Update</button>                         
             
         </div>

        
        </form>  
    
    </x-slot>
  
    
    
    </x-app-layout>