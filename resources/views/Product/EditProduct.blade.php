<x-app-layout>
    <x-slot name="header">
            
    <div class="border-collapse w-full flex flex-col pt-4">
        <form class="p-10 bg-white rounded shadow-xl" method="Post" enctype="multipart/form-data" >
          @csrf
          @method('PUT')
            <p class="text-lg text-gray-800 font-medium pb-4">Edit Product</p>

            <div class="inline-block mt-2 w-1/2 pr-1">
                <label class=" block text-sm text-gray-600" for="">Dsighn</label>
                <input   class="w-full px-2 py-2 text-gray-700 " id="" name="design" type="text" required="" placeholder="" value="{{$product->design}}" >
            </div>
            <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                <label class=" block text-sm text-gray-600" for="">Color</label>
                <input   class="w-full px-2 py-2 text-gray-700 " id=""  name="color" type="text" required="" placeholder="" value="{{$product->color}}">
            </div>
    
            <div class="inline-block mt-2 w-1/2 pr-1">
              <label class=" block text-sm text-gray-600" for="">Lenght</label>
              <input   class="w-full px-2 py-2 text-gray-700 " id="" name="lenght" type="number"  required="" placeholder=""  value="{{$product->lenght}}">
          </div>
          <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
              <label class=" block text-sm text-gray-600" for="">Width</label>
              <input   class="w-full px-2 py-2 text-gray-700 " id=""  name="width" type="number" required="" value="{{$product->width}}"  >
          </div>
    
              <div class="inline-block mt-2 w-1/2 pr-1">
                <label class=" block text-sm text-gray-600" for="">Price</label>
                <input   class="w-full px-2 py-2 text-gray-700 " id="" name="price" type="text" required="" value="{{$product->price}}" >
            </div>
    

            <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                <label class=" block text-sm text-gray-600" for="">Change Picture</label>

                
                <input   class="w-full px-2 py-2 text-gray-700 " id=""  name="img" type="file" required="" placeholder="" >
                 
                    <img src="{{ asset('Images/Product/'.$product->img) }}" alt="img" width="300px">
              </div>  
    
            <div class="mt-6">                                
              <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-700 rounded" value="submit" type="submit">Update</button>                         
             
         </div>

        
        </form>  
    
    </x-slot>
  
    
    
    </x-app-layout>