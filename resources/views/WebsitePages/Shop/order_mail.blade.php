<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

     
  <img  width="85px" src="{{ asset('Images/ELMAAK BAAFT LOGOo.png') }}" alt="img">
  {{-- <img  src="Images/ELMAAK BAAFT LOGOo.png" alt=""> --}}
    <h4>ELMAAK BAAFT</h4>
    <h4>your order id is : {{$order->id}} </h4>
    <h3>Total Price is : {{$order->totalprice}}</h3>
    <h4>Order Date : {{$order->order_date}} </h4>
    <h4>Your Debet cart Number is : {{$order->debet_cart_number}} </h4>
   <br><br><br>  
      
    </div>       


 

    <table class="border-collapse w-full">
      <thead>
          <tr>
              <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Image</th>
              <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">ID</th>
              <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Design</th>
              <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Color</th>
              <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Lenght</th>
              <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Width</th>
              <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Quantity</th>
              <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Price</th>
          </tr>
      </thead>
      <tbody>
        @foreach ($order['order_product'] as $product) 
          <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
              <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                 
                  <img  width="50px" src="{{ asset('Images/Product/'.$product->product->img) }}" alt="img">
         </td>

              <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
               
                {{$product->id}}
             </td>

             <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
             
              {{$product->product->design}}
             </td>

             <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
            
              {{$product->product->color}}
             </td>

             <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
             
              {{$product->product->lenght}}
            </td>

            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
          
              {{$product->product->width}}
          </td>

          <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
          
            {{$product->quantity}}
        </td>
         
        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
          
          {{$product->product->price}}
      </td>
          </tr>
          @endforeach
   
      </tbody>
  </table>
    <h5>Thanks for chosing us.</h5>
     </div>
             </div>
             </div>                
 
    
</body>
</html>