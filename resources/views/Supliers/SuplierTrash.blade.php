<x-app-layout>
    <x-slot name="header">
        @include('layouts.PurcheseManegerSidebar')   
 

<!----table of All Suplier  ---->
        
      
            <div class=" bg-gray-100 -my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">  
               
                @if(session()->has('message'))
                <div id="alert" class="flex items-center mb-2 bg-green-300 text-white text-sm font-bold px-4 py-3" role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                    <p>{{session()->get('message')}}</p>
                </div>
                @endif
                
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
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">ID</th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">First Name</th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Last Name</th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Company Name</th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Joining Date</th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">E-Mail</th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Phone Number</th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Country</th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">City</th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Street</th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Catagory</th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Zip</th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Actions</th>
                                 </tr>
                                </thead>
                                <tbody>
                                 <tr >
                                    @foreach ($supliers as $suplier)   
                                       <td class="px-4 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5" >{{$suplier->id}}</td>
                                       <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5" >{{$suplier->first_name}}</td>
                                       <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$suplier->last_name}}</td>
                                       <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$suplier->company_name}}</td>
                                       <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$suplier->joining_date}}</td>
                                       <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$suplier->email}}</td>
                                       <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$suplier->contact_num}}</td>
                                       <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$suplier->country->country_name}}</td>
                                       <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$suplier->city->city_name}}</td>
                                       <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$suplier->street->street_name}}</td>
                                       <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$suplier->catagory->catagory_name}}</td>
                                       <td class="px-4 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5" >{{$suplier->zip}}</td>
                                       
                                        <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">                                      
                                        <a href="{{url('/suplier/reastore',$suplier->id)}}" class="text-blue-400 hover:text-gray-100 mx-2">
                                            Restore
                                        </a>
                                        <a href="javascript:void(0)"  recordid="{{$suplier->id}}" class="ConfirmDelete   text-red-400 hover:text-gray-100 ml-2">
                                            Delete
                                        </a>
                                    </td>
                                 </tr>
                                     @endforeach
                              </tbody>
                             </table>
                             {{ $supliers->links('pagination::tailwind') }}
         
   
                 </div>
                 </div>                


     </x-slot>

     <script>
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
                   window.location.href="/suplier/forcedelete/"+recordid;
                 
               
      }
});
           
 })  



 
    $("document").ready(function(){
            setTimeout(function(){
                $("#alert").remove();
            },5000);
     });


     </script>

</x-app-layout>