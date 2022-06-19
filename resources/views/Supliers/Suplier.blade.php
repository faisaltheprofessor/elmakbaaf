<x-app-layout>
    <x-slot name="header">
        @include('layouts.PurcheseManegerSidebar')

        
<!----Form of Add Suplier  ---->
        
        <div class="border-collapse w-full flex flex-col pt-4 bg-gray-100">

            @if(session()->has('message'))
            <div id="alert" class="flex items-center mb-2 bg-green-300 text-white text-sm font-bold px-4 py-3" role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                <p>{{session()->get('message')}}</p>
            </div>
            @endif
            

            <form class="p-10 ml-5 mr-5 bg-white rounded shadow-xl" method="Post">
              @csrf
                <p class="text-lg text-gray-800 font-medium pb-4">Add New Suplier</p>

                <div class="inline-block mt-2 w-1/2 pr-1">
                  <label class=" block text-sm text-gray-600" for="">Name</label>
                  <input   class="w-full px-2 py-2 text-gray-700 " id="" name="first_name" type="text" required="" placeholder="First Name" >
              </div>
              <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                  <label class=" block text-sm text-gray-600" for=""></label>
                  <input   class="w-full px-2 py-2 text-gray-700 " id=""  name="last_name" type="text" required="" placeholder="Last Name" >
              </div>

              <div class="inline-block mt-2 w-1/2 pr-1">
                <label class=" block text-sm text-gray-600" for="">Email</label>
                <input   class="w-full px-2 py-2 text-gray-700 " id="" name="email" type="email"  required="" placeholder="" >
            </div>
            <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                <label class=" block text-sm text-gray-600" for="">Countact Number</label>
                <input   class="w-full px-2 py-2 text-gray-700 " id=""  name="contact_num" type="tel" required="" placeholder="" >
            </div>
  
                <div class="inline-block mt-2 w-1/2 pr-1">
                  <label class=" block text-sm text-gray-600" for="">Company Name</label>
                  <input   class="w-full px-2 py-2 text-gray-700 " id="" name="company_name" type="text" required="" placeholder="" >
              </div>
              <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                  <label class=" block text-sm text-gray-600" for="">Joining Date</label>
                  <input   class="w-full px-2 py-2 text-gray-700 " id=""  name="joining_date" type="date" required="" placeholder="" >
              </div>
            

                <div class="inline-block mt-2 w-1/2 pr-1">
                <label class=" block text-sm text-gray-600" for="">Address</label>
                <label class="block text-sm text-gray-600" for="">Select The Country:</label>
                     <select class="w-full px-5  py-4 rounded"  id="countries" name="country_id">
                        @foreach ($countries as $scountry)
                          <option class="text-black " value="{{$scountry->id}}">{{$scountry->country_name}}</option>
                        @endforeach
                     </select>
                </div>
                
                <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                  <label class="block text-sm text-gray-600" for="">Select The City:</label>
                  <select class="w-full px-5  py-4 rounded"  id="cities" name="city_id">
                    @foreach ($cities as $scity)
                        <option class="text-black " value="{{$scity->id}}">{{$scity->city_name}}</option>
                    @endforeach
                    </select>
                </div>

                 <div class="inline-block mt-2 w-1/2 pr-1">
                  <label class="block text-sm text-gray-600" for="">Select The Street:</label>
                  <select class="w-full px-5  py-4 rounded"  id="streets" name="street_id">
                    @foreach ($streets as $sstreet)
                        <option class="text-black " value="{{$sstreet->id}}">{{$sstreet->street_name}}</option>
                    @endforeach
                    </select>
                </div>
                
                
        <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
            <label class="block text-sm text-gray-600" for="">Select The Catagory:</label>
            <select class="w-full px-2 py-2 text-gray-700 "  id="catagory" name="catagory_id">
              @foreach ($catagories as $scatagory)
                  <option class="text-black " value="{{$scatagory->id}}">{{$scatagory->catagory_name}}</option>
              @endforeach
              </select>
          </div>

  


                <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                    <label class=" text-sm text-gray-600" for=""></label>
                    <input  class="w-full px-2 py-2 text-gray-700 " id=""  name="zip" type="text" required="" placeholder="Zip" >
                </div>


                <div class="mt-6">                                
                  <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-700 rounded" value="submit" type="submit">Submit</button>                         
                 
             </div>
            </form>  

        </div>
     </x-slot>

     <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
     <script>
         
         $(document).ready(function(){
               $('#countries').select2({
                   placeholder : "Select Country",
            
               });
           });
   

         $(document).ready(function(){
             $('#cities').select2({
                 placeholder : "Select City",
          
             });
         });

         $(document).ready(function(){
             $('#streets').select2({
                 placeholder : "Select City",
          
             });
         });
       
         $(document).ready(function(){
             $('#catagories').select2({
                 placeholder : "Select Country",
          
             });
         });
   

         
   $("document").ready(function(){
            setTimeout(function(){
                $("#alert").remove();
            },5000);
     });



        </script>


</x-app-layout>