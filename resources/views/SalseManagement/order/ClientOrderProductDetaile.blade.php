<x-app-layout>
    <x-slot name="header">
<!----table of All Order  ---->     
      
<div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">  
      
</div>       

               <div class="align-middle inline-block min-w-full  overflow-hidden bg-white shadow-lg px-8 pt-3 rounded-bl-lg rounded-br-lg">
                <div class="w-2/3 mx-auto">
                  <div class="bg-white shadow-md rounded my-6">
                    <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                      <thead>
                        <tr>
                          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Order id</th>
                          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Client Name</th>
                          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">client E-mail</th>
                          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Order Date</th>
                          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Date To Praper</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="hover:bg-grey-lighter">
                          <td class="py-4 px-6 border-b border-grey-light">{{$ClientOrderedProductDetail->id}}</td>
                          <td class="py-4 px-6 border-b border-grey-light">{{$ClientOrderedProductDetail->client->first_name}}  {{$ClientOrderedProductDetail->client->last_name}}</td>
                          <td class="py-4 px-6 border-b border-grey-light">{{$ClientOrderedProductDetail->client->email}}</td>
                          <td class="py-4 px-6 border-b border-grey-light">{{$ClientOrderedProductDetail->order_date}}</td>
                          <td class="py-4 px-6 border-b border-grey-light">{{$ClientOrderedProductDetail->date_to_prepare}} </td>
                         
                      </tbody>
                    </table>
                  </div>
                </div>



<table class="border-collapse w-full">
  <thead>
      <tr>
          <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Image</th>
          <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">ID</th>
          <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Collication</th>
          <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Design</th>
          <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Color</th>
          <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Size</th>
          <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Lenght</th>
          <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Width</th>
          <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Unit_area</th>
          <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Quantity</th>
          <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Quality</th>
    
      </tr>
  </thead>
  <tbody>
    @foreach ($ClientOrderedProductDetail['takingorder_orderitem'] as $orderitem) 
      <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
          <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
              <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Image</span>
              <img  width="50px" src="{{ asset('Images/Order/'.$orderitem->orderitem->file) }}" alt="file">
              
          </td>

          <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">ID</span>
            {{$orderitem->id}}
         </td>
        
         
         <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
          <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Design</span>
          {{$orderitem->orderitem->collication}}
         </td>


         <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
          <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Design</span>
          {{$orderitem->orderitem->design}}
         </td>

         <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
          <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Color</span>
          {{$orderitem->orderitem->color}}
         </td>

         <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
          <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Lenght</span>
          {{$orderitem->orderitem->size}}
        </td>

         <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
          <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Lenght</span>
          {{$orderitem->orderitem->lenght}}
        </td>

        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
          <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Width</span>
          {{$orderitem->orderitem->width}}
      </td>

      <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Width</span>
        {{$orderitem->orderitem->unit_area}}
    </td>

      <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Quantity</span>
        {{$orderitem->quantity}}
    </td>

    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
      <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Width</span>
      {{$orderitem->orderitem->quality}}
  </td>

      </tr>
      @endforeach

  </tbody>
</table>

 </div>
         </div>
         </div>                

          

     </x-slot>

</x-app-layout>