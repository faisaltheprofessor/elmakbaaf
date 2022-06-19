<x-app-layout>
  <x-slot name="header">
 @include('layouts.UserSidebar')  
    <div class="container mx-auto mt-10 " id="cartsTable">
      <div class="flex shadow-md my-10">
        <div class="w-3/4 bg-white px-10 py-10">
          <div class="flex justify-between border-b pb-8">
            <h1 class="font-semibold text-2xl">Your Shopping Cart</h1>
            
          </div>

          <table   class="min-w-full"> 
              <thead>                       
                <tr >
                      <th class="px-2 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Product Details</th>
                      <th class="px-2 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Product Info</th>
                      <th class="px-2 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Quantity</th>
                      <th class="px-2 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Price</th>
                      <th class="px-2 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Total</th> 
                       
                                 
               </tr>
              </thead>

              <tbody >
                @php $sum =0;
                
                
                @endphp                     
                  @foreach ($carts as $cart) 
                  @php
                      $sum = $sum +($cart->quantity*$cart->product->price);
                     
                  @endphp
                  <tr >  
                      <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5" >
                        <img  width="50px" src="{{ asset('Images/Product/'.$cart->product->img) }}" alt="img">
                       
                      </td>
                      <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5" >
          
                        <p>Lenght :{{$cart->product->lenght}}  Width :{{$cart->product->width}}</p>                       
                        <p>Design :{{$cart->product->design}}  color :{{$cart->product->color}}</p>
                      </td>
                     
                      
                      <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5" >
                        <div class="flex flex-row h-10 w-40 rounded-lg relative bg-transparent mt-1 px-1 py-1  mx-3">
              
                          <input  class=" focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="quantity"  required="" placeholder="" value="{{$cart->quantity}}">
                          <button data-cartid="{{$cart->id}}"  class="btnUpdateItem  quantityMines bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                            <span class="m-auto text-2xl font-thin">−</span>
                          </button>
                         
                        <button data-cartid="{{$cart->id}}"  class=" btnUpdateItem  quantityPlus    bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                          <span class="m-auto text-2xl font-thin">+</span>
                        </button>
                        <button href="javascript:void(0)"  recordid="{{$cart->id}}" id="delete_product"   class="ConfirmDelete bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                          <span class="m-auto text-2xl font-thin">x</span>
                        </button>
                        </div>
                      </td>
                      
                      <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$cart->product->price}} $</td>
                      <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$cart->quantity*$cart->product->price}} $</td>
                     
                      {{-- <td  class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                        <input type="checkbox" name="select_product[]"  cart-id="{{$cart->id}}">
                        
                         <button class="px-2 py-1 text-white font-light tracking-wider bg-red-500 rounded"  data-id="{{$cart->id}}" value="" id="delete_product">X</button>
                      </td>      --}}
                 </tr>
                @endforeach
             </tbody>

            
           <tr>
             <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900  text-sm leading-5"></td>
             <td  class="px-2 py-2 whitespace-no-wrap border-b text-blue-900  text-sm leading-5"></td>
             <td  class="px-2 py-2 whitespace-no-wrap border-b text-blue-900  text-sm leading-5"></td>
             <td  class="px-2 py-2 whitespace-no-wrap border-b text-blue-900  text-sm leading-5">Total Price :</td>
             <td  class="px-2 py-2 whitespace-no-wrap border-b text-blue-900  text-sm leading-5">{{$sum}} $</td>
           </tr>

            <tr>   
                <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900  text-sm leading-5">
                  <a href="{{ route('shop_index') }}" class="flex font-semibold text-indigo-600 text-sm ">
        
                    <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512"><path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/></svg>
                    Continue Shopping
                  </a>
                </td>
                <td  class="px-2 py-2 whitespace-no-wrap border-b text-blue-900  text-sm leading-5"></td>
                <td  class="px-2 py-2 whitespace-no-wrap border-b text-blue-900  text-sm leading-5"></td>
                <td  class="px-2 py-2 whitespace-no-wrap border-b text-blue-900  text-sm leading-5"></td>
              
            <!--    <td  class="px-2 py-2 whitespace-no-wrap border-b text-blue-900  text-sm leading-5">Pay with eway <input name="eway"  type="checkbox"></td>                            
                <td  class="px-2 py-2 whitespace-no-wrap border-b text-blue-900  text-sm leading-5">
               <button  class="px-4 py-2 text-white font-light tracking-wider bg-red-500 rounded" type="submit" id="buy_product">Buy</button> </td> !-->
               {{-- <td  class="px-2 py-2 whitespace-no-wrap border-b text-blue-900  text-sm leading-5">
                <a href="{{ route('checkout.index') }}" class="flex font-semibold text-indigo-600 text-sm ">
                  <button class="bg-indigo-500 font-semibold hover:bg-indigo-600 px-4 py-2 text-sm text-white uppercase ">Checkout</button> </td>     
                </a>
              </tr> --}}

             
           </table>

          
        </div>
  
        <div id="summary" class="w-1/4 px-8 py-10">
          <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
         <form action="" method="Post">
          @csrf
          <div>
            <label class="font-medium inline-block mb-3 text-sm uppercase">Date</label>
            <input type="date" id="" placeholder="" name="order_date" class="p-2 text-sm w-full">
          </div>
          {{-- <div>
            <label for="" class="font-semibold inline-block mb-3 text-sm uppercase">phone number</label>
            <input type="text" id="" placeholder="" name="" class="p-2 text-sm w-full">
          </div> --}}

          <div >
            <label for="" class="font-semibold inline-block mb-3 text-sm uppercase"> Debet cart Number</label>
            <input type="text" id="" placeholder="" name="debet_cart_number" class="p-2 text-sm w-full">
          </div>

          <div>
            <label for="" class="font-semibold inline-block mb-3 text-sm uppercase">Total Price</label>
            <input type="text" id="" placeholder="" name="totalprice" class="p-2 text-sm w-full"  value="{{$sum}} $">
          </div>
         
          <div class="border-t mt-8">
          
            <button value="submit" type="submit" class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">Buy</button>

          </div>
        </form>
        </div>
  
      </div>
    </div>
 </x-slot>

 <script>

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
                 window.location.href="/cart/delete/"+recordid;
              
             
    }
});
         
})  



  $(document).on('click','.btnUpdateItem',function(){
       if($(this).hasClass('quantityMines')){
         
         var quantity=$(this).prev().val();
            // alert(quantity);
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
        // alert(cartid);

         //pass to ajex
         $.ajax({
          //data to send
          data:{"cartid":cartid, "quantity":new_quantity, _token:'{{csrf_token()}}'},
          url:'/update-cart-item-quantity',
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

                
{{--           

     <script>    

     $(document).ready(function(){
       $.ajaxSetup({
          headers:{
            'X-CRSF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
       });
   
             $('#delete_product').on('click', function(){
               if(confirm('Are you Sure to remove this prodct!')){
                 var id =$(this).data('id');
                 $.ajax({
                   url:'{{route("cart.delete")}}',
                   data:{
                         'id':id
                   },
//relode after delating the product
                   success:function(data){
                     location.reload();
                   }

                 });
               }
             });

             
//Update Carts Quantity
      
      $(document).on('click','.btnUpdateItem',function(){
         if($(this).hasClass('quantityMines')){
           
           var quantity=$(this).prev().val();
          //  alert(quantity);
               if(quantity<=1){
                 alert("Item quantity must 1 or grater then 1");
               }else{
                   new_quantity = parseInt(quantity)-1;
                  //  alert(new_quantity);
               }
          // return false;
         }

         if($(this).hasClass('quantityPlus')){
            var quantity = $(this).prev().prev().val();
            // alert(quantity);
            new_quantity = parseInt(quantity)+1;

           
         }
             alert(new_quantity);

            //paking cart id
          // var cartid =$(this).data('cartid');
          //  alert(cartid);

          //pass to ajex
          // $.ajax({
          //   //data to send
          //   data:{"cartid":cartid, "quantity":new_quantity, _token:'{{csrf_token()}}'},
          //   url:'/update-cart-item-quantity',
          //   type:'post',
          //   success:function(resp){
          //           // alert(resp);
          //         //  $("#cartsTable").html(resp.view);
          //           location.reload();
          //           },error:function(){
          //             //  alert("error");
          //             location.reload();
                  
          //           }

                   });

                  });

      });
  


//            $('#buy_product').on('click',function(){
//                var cart_id = [];


//       /*         //for payment
//                var payment_type ='';
//                    if($('input[name="eway"]').is(':checked')){
                 
//                      payment_type = 'eway';

//                  } else{
//                       payment_type = 'pay_person';
//                  }
//       */


//                jQuery('input[name="select_product[]"]:checkbox:checked').each(function(i){
//                     cart_id[i] = $(this).attr('cart-id');
//                });
               
//                if(cart_id.length ==0){
//                  alert('Select at least one product!');
//                }else{
//                  $.ajax({
//                   
//                   type:'post',
//                   data:{
//                     cart_id:cart_id,
//                     _token:'{{csrf_token()}}'   

//                   },   

//                   success:function(data){
// //payment 
//               //      if(data.type='eway'){
//               //          window.location = data.url;
//               //      }else{

//                     location.reload();
//               //       }
//                   }
//                  });                 
//                }
//              });
             

//   });
             
     --}}
