
{{-- <x-app-layout>
  <x-slot name="header"> --}}
    @extends('mainPage')
    @section('Page_Content')
    <main class="my-8">
      <div class="container mx-auto px-6">
          <h3 class="text-gray-700 text-2xl font-medium">Elamak Bafft Products :</h3>
          {{-- <span class="mt-3 text-sm text-gray-500">200+ Products</span> --}}
          <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
            @foreach ($products as $product)
            <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                  <div class="flex items-end justify-end h-56 w-full ">
                    <img   src="{{ asset('Images/Product/'.$product->img) }}" alt="img"></td>
                  </div>
                  <div class="px-5 py-3">
                      <h3 class="text-gray-700 uppercase">Catagory : {{$product->catagory->catagory_name}}</h3>
                      <span class="text-gray-500 mt-2">Price :  {{$product->price}} $</span>          
                  </div>
                       <form method="post" class="">
                                  @csrf    
                        
                          <input  id=""   type="hidden" required="" placeholder="" value="{{$product->id}}" name="product_id" >    
              

                          <div class=" quantity flex flex-row h-10  rounded-lg relative bg-transparent mt-1 px-1 py-1  mx-3">
                        
                          
                            <div data-cartid="{{$product->id}}"  class="btnUpdateItem  quantityMines bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                              <span class="ml-3 text-2xl font-thin">−</span>
                            </div>
                            
                            <input  class="quantitychange focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="quantity"  required="" placeholder="" value="1">
            
                            <div data-cartid="{{$product->id}}"  class=" btnUpdateItem  quantityPlus    bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                            <span class="m-auto text-2xl font-thin">+</span>
                          </div>
                      {{-- <div class="flex flex-row h-10 w-75 rounded-lg relative bg-transparent mt-1 px-1 py-1  mx-3">               
                          <button  class=" bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                            <span class="m-auto text-2xl font-thin">−</span>
                          </button>
                          <input  class=" focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="quantity" value="1">
                        <button class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                          <span class="m-auto text-2xl font-thin">+</span>
                        </button> --}}

                        <button  type="submit" class="ml-3 p-2 rounded-full bg-red-600 text-white   hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                          <svg class="h-5 w-20" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </button>
                        
                        {{-- <button class="p-2 rounded-full bg-blue-600 text-white mx-2   hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                          <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </button>
                        --}}
                      </div>      
                  </form>  
              </div>      
          @endforeach
          </div>
          {{ $products->links('pagination::tailwind') }}  
  </main>
    {{-- </x-slot> --}}

    @endsection
    
 




{{-- 

  </x-app-layout>  --}}