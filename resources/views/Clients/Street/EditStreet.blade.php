<x-app-layout>
    <x-slot name="header">
        
  
<!----Form of editing Street  ---->
        
        <div class="border-collapse w-full flex flex-col pt-4">
            <form  class="p-10 bg-white rounded shadow-xl" method="Post">
                @csrf
                @method('PUT')
               
                <div class="mt-2">
                    <label class="block text-sm text-gray-600" for="">Select The City:</label><br>
                    <select class="w-full px-5  py-4 rounded"  id="cities" name="city_id">
                    @foreach ($cities as $city)
                        <option class="text-black " value="{{$city->id}}">{{$city->city_name}}</option>
                    @endforeach
                    </select>
                </div>
                 
                <div class="mt-2">
                     <label class="block text-sm text-gray-600" for="">Edit Street:</label><br>
                     <input   class="w-full px-5  py-4 text-gray-700  rounded" id=""   type="text" required="" name="street_name" placeholder="" value="{{$street->street_name}}">
               </div>
                
                  <div class="mt-6">                                     
                    <button  class="px-4 py-1 text-white font-light tracking-wider bg-blue-700 rounded"  value="Update">Update</button>
               </div>
               </form>
     </x-slot>

         
     <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
     <script>
         
         $(document).ready(function(){
             $('#cities').select2({
                 placeholder : "Select City",
          
             });
         });
    </script>
</x-app-layout>