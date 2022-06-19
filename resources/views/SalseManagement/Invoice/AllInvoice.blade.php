<x-app-layout>
    <x-slot name="header">
       @include('layouts.SalseManegerSidebar')
 
            
<div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8 w-full bg-gray-100">  
    <form action="" type="get">
        <div class="align-middle rounded-tl-lg rounded-tr-lg inline-block w-full py-4 overflow-hidden bg-white  px-12">
             <div class="flex justify-between">
                 <div class="inline-flex border rounded w-7/12 px-2 lg:px-6 h-12 bg-transparent">
                    
                    <div class="flex flex-wrap items-stretch w-full h-full mb-6 relative">
                       
                         <input type="search" name="search" class="flex-shrink flex-grow  leading-normal tracking-wide w-px flex-1 border border-none border-l-0 rounded rounded-l-none px-3 relative focus:outline-none text-xxs  lg:text-base text-gray-500 font-thin" placeholder="Search" value="{{$search}}">
                         <button type="submit" >
                              <div class="flex">
                           <span class="flex items-center leading-normal bg-transparent rounded rounded-r-none border border-r-0 border-none lg:px-3 py-2 whitespace-no-wrap text-grey-dark text-sm">
                                <svg width="18" height="18" class="w-4 lg:w-auto" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.11086 15.2217C12.0381 15.2217 15.2217 12.0381 15.2217 8.11086C15.2217 4.18364 12.0381 1 8.11086 1C4.18364 1 1 4.18364 1 8.11086C1 12.0381 4.18364 15.2217 8.11086 15.2217Z" stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M16.9993 16.9993L13.1328 13.1328" stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                    </button>
                   </div>                            
                 </div>
             </div> 
            </form>
     </div>

                 
           
                           <div class="align-middle inline-block min-w-full  overflow-hidden bg-white shadow-lg px-8 pt-3 rounded-bl-lg rounded-br-lg">
                              <table   class="min-w-full"> 
                                <thead>                       
                                  <tr >
                                      <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Invoice Id</th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Client </th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Invoice Date</th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Total Amount</th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Total Square Meters</th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Detail</th>
                                      
                                </thead>
                                   <tbody>
                                 <tr >

                                    @foreach ($invoices as $invoice) 
                                      <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$invoice->id}}</td> 
                                       <td class="px-4 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5" >{{$invoice->client->first_name}} {{$invoice->client->last_name}}</td>
                                       <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5" >{{$invoice->invoice_date}}</td>
                                       <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$invoice->total_amount}}</td>                                   
                                       <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$invoice->total_square_meters}}</td>
                                       <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                                         <a href="{{url('invoice_products/'.$invoice['id'])}}"> View More Detail</a> 
                                    </td>
                                       
              
                                 </tr>
                                     @endforeach
                              </tbody> 
                             </table>
         
                             {{ $invoices->links('pagination::tailwind') }}
    
         </div>
                 </div>
                 </div>                


     </x-slot>

</x-app-layout>