<x-app-layout>
  <x-slot name="header">
    @include('layouts.PurcheseManegerSidebar')  


        <div class="justify-center min-h-screen bg-gray-100 w-full mt-3 ">
          
            <div class="w-full  shadow-lg bg-gray-100">
                <div class="flex justify-between p-4">
                  <div class="w-64 flex-shrink-0 md:mx-0 mx-auto text-center md:text-left md:mt-0 mt-10">
                    <a class="flex title-font font-medium items-center mb-4 md:mb-0">
                      <img width="65px" src="Images/ELMAAK BAAFT LOGOo.png" alt="">
                        <span class="ml-3 text-xl">Elamak Baaft</span>                     
                    </a>
                    <p class="mt-2  text-black-500 ml-3 text-xl"></p>
                    <span class="text-sm">P:+93773252214 | +93774000439 </span>                 
                    <span class="text-sm"> E: info@afghancarpetnshc.com</span>                 
                    <span class="text-sm">  W:WWW.afghancarpetnshc.com </span>
                                
                  </div>


                    <div class="p-2">
                        <ul class="flex">                       
                                <li class="flex flex-col p-2 border-l-2 border-indigo-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="text-sm">
                                       Elamak Baaft.West Kabul Carpet Market
                                    </span>
                                    <span class="text-sm">
                                      Dawakhana Squre, District 3th
                                   </span>
                                   <span class="text-sm">
                                     Kabul,Afghanistan
                                 </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="w-full  bg-gray-200">
                      <div class="flex justify-between p-4">
                        <div>
                            
                            <h6 class="font-bold">Licence# : <span class="text-sm font-medium"> D-77181</span></h6>
                        </div>
                        <div class="w-80">
                            <h1 class="font-bold  text-xl">  Inventory</h1>   
                            <span class="text-sm">
                              Elamak Baaft.West Kabul Carpet Market
                           </span>                        
                        </div>
                        <div class="w-40">
                          <div>                      
                            <h6 class="font-bold">Licence# : <span class="text-sm font-medium"> D-77181</span></h6>
                        </div>
                        </div>
                        <div></div>
                    </div>

                    </div>
                    <div class="flex justify-between p-4">
                        <div>
                            <h6 class="font-bold">Receipt Date : <span class="text-sm font-medium"> {{$ReceiptProductDetail->receipt_date}}</span></h6>
                        
                        </div>
                       
                        <div class="w-40">
                            <address class="text-sm">
                                <span class="font-bold">Vendor : {{$ReceiptProductDetail->suplier->first_name}} {{$ReceiptProductDetail->suplier->last_name}}</span>
                              
                            </address>
                        </div>
                        <div></div>
                    </div>



                    <table class="border-collapse w-full">
                      <thead>
                          <tr>
                              <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Order#</th>
                              <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Design</th>
                              <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Quantity</th>
                              <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Lenght</th>
                              <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Width</th>
                              <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Total</th>
                              <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Price/meter</th>
                              <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Total Price</th>
                              <th class="p-3 font-bold uppercase  text-blue-500 border border-gray-300 hidden lg:table-cell">Comment</th>
                          </tr>
                      </thead>
                       <tbody>
                       @foreach ($ReceiptProductDetail['receipt_product'] as $product) 
                          <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">                   
                              <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">ID</span>
                                {{$product->id}}
                             </td>
                            
                             
                             
                    
                             <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                              <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Design</span>
                              {{$product->product->design}} 
                             </td>
                    
                             <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                              <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Color</span>
                             {{$product->quantity}}
                             </td>
                    
                             <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                              <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Lenght</span>
                              {{$product->product->lenght}}
                            </td>
                    
                             <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                              <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Lenght</span>
                              {{$product->product->width}}
                            </td>
                    
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                              <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Width</span>
                              {{($product->product->lenght/100*$product->product->width/100)}}
                          </td>
                    
                          <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Width</span>
                           {{$product->product->price}} $
                        </td>
                    
                          <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Quantity</span>
                            {{($product->quantity*(($product->product->lenght/100*$product->product->width/100)*$product->product->price))}} $
                        </td>
                    
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                          <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Width</span>
             
                      </td>
                    
                          </tr>
                          @endforeach
                    
                      </tbody> 
                    </table>

                    <div class="p-2">
                      <ul class=" flex items-end justify-end">
                        <br><br>     
                        <p class="text-sm font-bold">Grand Total :  </p>                         
                              <li class="flex flex-col p-2 border-l-2 border-indigo-200">
                        
                                    <p class="text-sm font-bold">Total Square Meter : {{$ReceiptProductDetail->total_square_meters}} </p>
                                   <p class="text-sm font-bold">Total Pieces : {{$ReceiptProductDetail->total_amount}}</p>
                                   <p class="text-sm font-bold">Total Bales : {{$ReceiptProductDetail->total_bales}}</p>
                                   <p class="text-sm font-bold">Total Price : {{$ReceiptProductDetail->total_price}}</p>
                              </li>
                          </ul>
                      </div>

                      <div class="w-full  bg-gray-200">
                        <div class="flex justify-between p-4">
                          <div class="flex items-center justify-center">
                            Thank you very much for doing business with us.
                        </div>
                        <div class="flex items-end justify-end space-x-3">
                            {{-- <button class="px-4 py-2 text-sm text-green-600 bg-green-100">Print</button> --}}
                            <a href="{{url('print-pdf-receipt/'.$ReceiptProductDetail['id'])}}" class="px-4 py-2 text-sm text-blue-600 bg-blue-100">Save</a>
                            {{-- <button class="px-4 py-2 text-sm text-red-600 bg-red-100">Cancel</button> --}}
                        </div>
                        </div>
                      </div>
                  </div>
                        </div>                      
                    </div>
 
     
                  </x-slot>

                </x-app-layout>


