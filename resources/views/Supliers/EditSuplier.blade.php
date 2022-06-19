<!----Form to Edit suplier  ---->
<x-app-layout>
    <x-slot name="header">
            
    <div class="border-collapse w-full flex flex-col pt-4">
        <form class="p-10 bg-white rounded shadow-xl" method="Post">
          @csrf
          @method('PUT')
            <p class="text-lg text-gray-800 font-medium pb-4">Edit Suplier</p>
    
            <div class="inline-block mt-2 w-1/2 pr-1">
              <label class=" block text-sm text-gray-600" for="">Name</label>
              <input class="w-full px-2 py-2 text-gray-700 " id="" name="first_name" type="text" required="" placeholder="First Name"  value="{{$suplier->first_name}}" >
          </div>
          <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
              <label class=" block text-sm text-gray-600" for=""></label>
              <input   class="w-full px-2 py-2 text-gray-700 " id=""  name="last_name" type="text" required="" placeholder="Last Name" value="{{$suplier->last_name}}" >
          </div>
    
          <div class="inline-block mt-2 w-1/2 pr-1">
            <label class=" block text-sm text-gray-600" for="">Email</label>
            <input   class="w-full px-2 py-2 text-gray-700 " id="" name="email" type="email"  required="" placeholder=""  value="{{$suplier->email}}">
        </div>
        <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
            <label class=" block text-sm text-gray-600" for="">Countact Number</label>
            <input   class="w-full px-2 py-2 text-gray-700 " id=""  name="contact_num" type="tel" required="" placeholder="" value="{{$suplier->contact_num}}" >
        </div>
    
            <div class="inline-block mt-2 w-1/2 pr-1">
              <label class=" block text-sm text-gray-600" for="">Company Name</label>
              <input   class="w-full px-2 py-2 text-gray-700 " id="" name="company_name" type="text" required="" placeholder="" value={{$suplier->company_name}} >
          </div>
          <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
              <label class=" block text-sm text-gray-600" for="">Joining Date</label>
              <input   class="w-full px-2 py-2 text-gray-700 " id=""  name="joining_date" type="date" required="" placeholder="" value="{{$suplier->joining_date}}" >
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
                <input  class="w-full px-2 py-2 text-gray-700 " id=""  name="" type="text" required="" placeholder="Zip"  value="{{$suplier->zip}}">
            </div>
    
    
            <div class="mt-6">                                
              <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-700 rounded" value="submit" type="submit">Submit</button>                         
             
         </div>
        </form>  
    
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
   
        
       </script>
    
    
    </x-app-layout>