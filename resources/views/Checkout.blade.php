<x-app-layout>
    <x-slot name="header">
     
      <div class="container mx-auto mt-5">
        <div class="flex my-5">
          <div class="w-3/4 bg-white px-10 py-10">
            <div class="flex justify-between border-b pb-8">
              <h1 class="font-semibold text-2xl">Your Order</h1>
              
            </div>
  
            <table   class="min-w-full"> 
                <thead>                       
                  <tr >
                        <th class="px-2 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Product Details</th>
                        <th class="px-2 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Quantity</th>
                        <th class="px-2 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Price</th>
                        <th class="px-2 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Total</th>                         
                 </tr>
                </thead>
  
                <tbody>
                  @php $sum =0;               
                  @endphp                     
                    @foreach ($carts as $cart) 
                    @php
                        $sum = $sum +($cart->quantity*$cart->product->price);                      
                    @endphp
                    <tr >  
                        <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5"></td>
                        <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$cart->quantity}} </td>
                        <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$cart->product->price}} $</td>
                        <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$cart->quantity*$cart->product->price}} $</td>     
                   </tr>
                  @endforeach
               </tbody>
  
              
             <tr>
               
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
             
                </tr>
  
               
             </table>
  
            
          </div>

          <form action="#" method="post" id="payment-form"> 
         
           @csrf
            <div class="form-row w-1/2">
              <label for="card-element">
                Credit or debit card
              </label>
              <div class="w-5/6" id="card-element">
                <!-- a Stripe Element will be inserted here. -->
              </div>
              <!-- Used to display form errors -->
              <div class="w-1/6" id="card-errors"></div>
            </div>


        <input type="submit" class="submit" value="Submit Payment"> 
          </form>  
 <!--         <div class="bg-white my-4 shadow p-8 rounded-lg">
            <div class="flex items-center mb-4">
                <div class="border-2 border-blue px-3 py-2 rounded-full font-bold text-blue mr-2">1</div>
                <h2 class="text-lg">Your Payment Information</h2>
            </div>
        
            <div class="w-full">
                <label for="payment" class="block text-sm mb-2">Credit Card</label>
                <div class="flex">
                    <input type="text" id="payment" class="w-5/6 flex-1 text-sm bg-grey-light text-grey-darkest rounded-l p-3 focus:outline-none" placeholder="Card Number">
                    <input type="text" id="payment" class="w-1/6 inline-block text-sm bg-grey-light text-grey-darkest p-3 focus:outline-none" placeholder="MM / YY">
                    <input type="text" id="payment" class="w-1/6 inline-block text-sm bg-grey-light text-grey-darkest rounded-r p-3 focus:outline-none" placeholder="CVC">
                </div>
            </div>
        </div>  -->
   </x-slot>
    
   <script src="https://js.stripe.com/v3/"></script>
  <script>
      //stripe Client
    var stripe = Stripe('pk_test_51K0M2EFd1xuHCCifdxYr6p4v71FsZRMxS8yKPpSefNkfhob3iT8u7gSCUMYIFt4r1nVlCbTf3OH20d9ZPhfiXTqv00LFSQSRLB');
      //instance of Element
    var elements = stripe.elements();
      //instance of cart Element
    var card = elements.create('card');
    // Add an instance of the card UI component into the `card-element` <div>
    card.mount('#card-element');




    
    </script> 


</x-app-layout> 