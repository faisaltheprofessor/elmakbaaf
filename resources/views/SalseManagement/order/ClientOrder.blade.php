<x-app-layout>
    <x-slot name="header">
       @include('layouts.SalseManegerSidebar')  

      <div class="container mx-auto mt-5">
        <div class="flex my-5">
          <div class="w-3/4 bg-white px-10 py-10">
            <div class="flex justify-between border-b pb-8">
              <h1 class="font-semibold text-2xl">Client Order</h1>
              
            </div>
  
            <table   class="min-w-full"> 
                <thead>                       
                  <tr >
                       <th class="px-2 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Image</th>
                        <th class="px-2 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Collication</th>
                        <th class="px-2 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Quality</th>
                        <th class="px-2 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Design</th>
                        <th class="px-2 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Color</th>  
                        <th class="px-2 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Size</th>
                        <th class="px-2 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Unit Area</th>
                        <th class="px-2 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Quantity</th>
                        <th class="px-2 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Bal</th>                       
                 </tr>
                </thead>
  
                <tbody>
                                     
                    @foreach ($cartitemorders as $cartitemorder) 
                   
                    <tr >  
                      <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5" >
                        <img  width="50px" src="{{ asset('Images/Order/'.$cartitemorder->orderitem->file) }}" alt="img">
                       
                      </td>
                        <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$cartitemorder->orderitem->collication}}</td>
                        <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5"> {{$cartitemorder->orderitem->quality}}</td>
                        <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$cartitemorder->orderitem->design}}</td>
                        <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$cartitemorder->orderitem->color}}</td> 
                        <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$cartitemorder->orderitem->size}}</td>
                        <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$cartitemorder->orderitem->unit_area}}</td> 
                        <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                          <div class="flex flex-row h-10 w-40 rounded-lg relative bg-transparent mt-1 px-1 py-1  mx-3">
              
                            <input  class=" focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="quantity"  required="" placeholder="" value="{{$cartitemorder->quantity}}">
                            <button data-cartid="{{$cartitemorder->id}}"  class="btnUpdateItem  quantityMines bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                              <span class="m-auto text-2xl font-thin">−</span>
                            </button>
                           
                          <button data-cartid="{{$cartitemorder->id}}"  class=" btnUpdateItem  quantityPlus    bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                            <span class="m-auto text-2xl font-thin">+</span>
                          </button>
                          <button  href="javascript:void(0)"  recordid="{{$cartitemorder->id}}"   class="ConfirmDelete bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                            <span class="m-auto text-2xl font-thin">x</span>
                          </button>
                          </div>

                        </td>
                        <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5"></td>     
                   </tr>
                  @endforeach
               </tbody>
  
              
             <tr>
               
               <td  class="px-2 py-2 whitespace-no-wrap border-b text-blue-900  text-sm leading-5"></td>
               <td  class="px-2 py-2 whitespace-no-wrap border-b text-blue-900  text-sm leading-5"></td>
               <td  class="px-2 py-2 whitespace-no-wrap border-b text-blue-900  text-sm leading-5"></td>
               <td  class="px-2 py-2 whitespace-no-wrap border-b text-blue-900  text-sm leading-5"></td>
             </tr>
  
              <tr>   
                  <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900  text-sm leading-5">
                    <a href="{{url('AllOrderedItemCart')}}" class="flex font-semibold text-indigo-600 text-sm ">
          
                      <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512"><path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/></svg>
                      Continue 
                    </a>
                  </td>
                  <td  class="px-2 py-2 whitespace-no-wrap border-b text-blue-900  text-sm leading-5"></td>
                  <td  class="px-2 py-2 whitespace-no-wrap border-b text-blue-900  text-sm leading-5"></td>
                  <td  class="px-2 py-2 whitespace-no-wrap border-b text-blue-900  text-sm leading-5"></td>
             
                </tr>
  
               
             </table>
  
            
          </div>


   
          <div id="summary" class="w-1/4 px-8 py-10">
            <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
            <div>
             
         <div class="border-collapse w-full flex flex-col pt-4">
            <form class="p-10l" method="Post" enctype="multipart/form-data"  >     
               @csrf
              <label class="font-medium inline-block mb-3 text-sm uppercase">Client Name</label>
              <select class="p-2 text-sm w-full"  id="clients" name="client_id">
                @foreach ($clients as $client)
                    <option class="text-black " value="{{$client->id}}">{{$client->first_name}}</option>
                @endforeach
                </select>
            </div>
            <div class="py-2">
              <label for="promo" class="font-semibold inline-block  text-sm uppercase">Order date</label>
              <input  class="p-2 text-sm w-full" id="" name="order_Date" type="date" required="" placeholder="">
            </div>
            <div class="py-2">
                <label for="promo" class="font-semibold inline-block  text-sm uppercase">Date To Prepare</label>
                <input class="p-2 text-sm w-full" id=""  name="date_to_prepare" type="date" required="" placeholder="">
            </div>
            
              <button class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full"  value="submit" type="submit">Place Order</button> 
            </div>
          </div>
        </form>
        </div>
        
      

   </x-slot>
    
      
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
   <script>
      $(document).ready(function(){
          $('#clients').select2({
              placeholder : "Select Client",
       
          });
      });


      
      

$(document).ready(function(){

  $(".ConfirmDelete").click(function(){
         
         var recordid =$(this).attr("recordid");
            Swal.fire({
               title: 'Are you sure?',
               text: "You won't be able to revert this!",
               icon: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               confirmButtonText: 'Yes, delete it!'
             }).then((result) => {
              if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                   'Your file has been deleted.',
                      'success'
                )
                 window.location.href="/OrderItemCart/delete/"+recordid;          
    }
});
         
})  
    
    $(document).on('click','.btnUpdateItem',function(){
         if($(this).hasClass('quantityMines')){
           
           var quantity=$(this).prev().val();
             //  alert(quantity);
               if(quantity<=1){
                 alert("Item quantity must 1 or grater then 1");
               }else{
                   new_quantity = parseInt(quantity)-1;
                    // alert(new_quantity);
               }
          // return false;
         }
   
        
         if($(this).hasClass('quantityPlus')){
            var quantity = $(this).prev().prev().val();
            // alert(quantity);
            new_quantity = parseInt(quantity)+1;
           
         }
            //  alert(new_quantity);
   
            //paking cart id
          var cartid =$(this).data('cartid');
          //  alert(cartid);
   
           //pass to ajex
           $.ajax({
            //data to send
            data:{"cartid":cartid, "quantity":new_quantity, _token:'{{csrf_token()}}'},
            url:'/update-clientorder-item-quantity',
            type:'post',
            success:function(resp){
                    // alert(resp);
                  //  $("#cartsTable").html(resp.view);
                    location.reload();
                    },error:function(){
                      //  alert("error");
                      location.reload();
                  
                    }
      });
   
                   });
   
   });
  </script>
  

</x-app-layout> 