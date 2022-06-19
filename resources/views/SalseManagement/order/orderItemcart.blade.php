<x-app-layout>
  <x-slot name="header">
<!----table of All product  ---->
@include('layouts.SalseManegerSidebar')       
 <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8 bg-gray-100 w-full">  
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
                                      <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">collection </th>
                                      <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">size</th>
                                      <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">unit_area</th>
                                      
                                      <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Design</th>
                                      <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Color</th>
                                      <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Lenght</th>
                                      <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Width</th>
                                      <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Quality</th>
                                      {{-- <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Quality</th> --}}
                                      <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Image</th>
                    
                                      <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Action</th>
                                      <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Add this
                                        <a href="{{ url('ClientOrder') }}">
                                          <button class=" ml-5 bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-full">
                                                  Checkout
                                      </button></a>
                                  
                                      </th>
                              
                               </tr>
                              </thead>
                              <tbody>
                               <tr >

                                @foreach ($orderitem as $orderitem)  
                                     <td class="px-4 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5" >{{$orderitem->id}}</td>
                                     <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5" >{{$orderitem->collication}}</td>
                                     <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5"> {{$orderitem->size}}</td>
                                     <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$orderitem->unit_area}}</td>
                                     <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5" >{{$orderitem->design}}</td>
                                     <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$orderitem->color}}</td>
                                     <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$orderitem->lenght}}</td>
                                     <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$orderitem->width}}</td>
                                     {{-- <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5" >{{$orderitem->quantity}}</td> --}}
                                     <td class="px-2 py-2 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$orderitem->quality}}</td>
                                     
                                      <td><img  width="80px" height="80px" src="{{ asset('Images/Order/'.$orderitem->file) }}" alt="file"></td>

                                     <td class="px-2 flex py-7 whitespace-no-wrap  text-blue-900 border-gray-500 text-sm border-b leading-5">                                      
                                      <a href="{{url('/OrderedItem/edit',$orderitem->id)}}" class="text-blue-400  mt-8 hover:text-gray-100 mx-2">
                                          <i class="material-icons-outlined text-base">edit</i>
                                      </a>

                                      <div href="javascript:void(0)"  recordid="{{$orderitem->id}}" class="ConfirmDelete  mt-8 text-red-400 hover:text-gray-100 ml-2">
                                              <svg
                                              class="w-5 "
                                              aria-hidden="true"
                                              fill="currentColor"
                                              viewBox="0 0 20 20"
                                            >
                                              <path
                                                fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"
                                              ></path>
                                            </svg>
                                      </div>
                                  </td>
                           
                                 <td class="px-2 py-2 whitespace-no-wrap border-b text-green-500 border-gray-500 text-sm leading-5">
                                             
                                  <form method="post" class="" action="/OrderItemCart">
                                    @csrf 
                                                <div class=" quantity flex flex-row h-10 w-40 rounded-lg relative bg-transparent mt-1 px-1 py-1  mx-3">
                          
                                                <div data-cartid="{{$orderitem->id}}"  class="btnUpdateItem  quantityMines bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                                                  <span class="m-auto text-2xl font-thin">−</span>
                                                </div>
                                                <input  class="quantitychange focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="quantity"  required="" placeholder="" value="1">
                                                <input  id=""   type="hidden" required="" placeholder="" value="{{$orderitem->id}}" name="orderitem_id" > 
                                                <div data-cartid="{{$orderitem->id}}"  class=" btnUpdateItem  quantityPlus    bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                                                <span class="m-auto text-2xl font-thin">+</span>
                                              </div>

                                        
                                          <button   type="submit" class=" ml-1 mr-0  bg-red-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-full">
                                            Add 
                                          </button>
                                      
                                           </div>      
                                        </form>   
                                      </tr>
                                 </td>
                                 
                                  @endforeach
                            </tbody>
                           </table>
 
               </div>
               </div>                
   </x-slot>

   <script>

    var i;
    $(function(){
      $('.quantityPlus').click(function(){
        
       i=parseInt($('.quantitychange').val());
       i=i+1;
       $('.quantitychange').val(i);
         
      })
  
      $('.quantityMines').click(function(){    
        i=parseInt($('.quantitychange').val());
        i=i-1;
        if(i==-1){
          i=1;
        }
        $('.quantitychange').val(i);
          
       })
    })
  
  
    $(".ConfirmDelete").click(function(){
           
           var recordid =$(this).attr("recordid");
              Swal.fire({
                 title: 'Are you sure?',
                 text: "",
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
                   window.location.href="/OrderedItem/delete/"+recordid;
                
               
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













{{-- 
 <x-app-layout>
    <x-slot name="header">
<main class="my-8">
    <div class="container mx-auto px-6">
        <h3 class="text-gray-700 text-2xl font-medium">Elamak Bafft Products</h3>
      
        <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 mt-6">
         
          @foreach ($orderitem as $orderitem)
         <form method="post" class="" action="/OrderItemCart">
            @csrf 
          <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                <div >
                    <img  class=" items-end justify-center h-56 w-full bg-cover"  src="{{ asset('Images/Order/'.$orderitem->file) }}" alt="file">
                </div>
                <div class="px-5 py-3">
                    <span class="text-gray-500 mt-2">collication : {{$orderitem->collication}}</span><br/>
                    <span class="text-gray-500 mt-2">Size : {{$orderitem->size}} </span><br/>   
                    <span class="text-gray-500 mt-2">Unit_area : {{$orderitem->unit_area}}  </span><br/> 
                    <span class="text-gray-500 mt-2">color : {{$orderitem->color}} </span> <br/>
                    <span class="text-gray-500 mt-2">Quality : {{$orderitem->quality}} </span><br/> 
                    <span class="text-gray-500 mt-2">Lenght : {{$orderitem->lenght}} </span><br/> 
                    <span class="text-gray-500 mt-2">Width: {{$orderitem->width}} </span> <br/>
                    <span class="text-gray-500 mt-2">Design : {{$orderitem->design}} </span> 

                </div>
  

                <div class=" quantity flex flex-row h-10 w-40 rounded-lg relative bg-transparent mt-1 px-1 py-1  mx-3">
              
                 
                  <div data-cartid="{{$orderitem->id}}"  class="btnUpdateItem  quantityMines bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                    <span class="m-auto text-2xl font-thin">−</span>
                  </div>
                  <input  class="quantitychange focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="quantity"  required="" placeholder="" value="1">
                  <input  id=""   type="hidden" required="" placeholder="" value="{{$orderitem->id}}" name="orderitem_id" > 
                  <div data-cartid="{{$orderitem->id}}"  class=" btnUpdateItem  quantityPlus    bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                  <span class="m-auto text-2xl font-thin">+</span>
                </div>
                <div href="javascript:void(0)"  recordid="{{$orderitem->id}}"   class="ConfirmDelete bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                  <span class="m-auto text-2xl font-thin">x</span>
                </div>

           
            <button   type="submit" class=" bg-red-600 text-white mx-2  hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
              add to order
            </button>
          
          </div>      
        </form>  
              </div>      
          @endforeach
  </main>

</x-slot>

<script>

  var i;
  $(function(){
    $('.quantityPlus').click(function(){
      
     i=parseInt($('.quantitychange').val());
     i=i+1;
     $('.quantitychange').val(i);
       
    })

    $('.quantityMines').click(function(){    
      i=parseInt($('.quantitychange').val());
      i=i-1;
      if(i==-1){
        i=1;
      }
      $('.quantitychange').val(i);
        
     })
  })


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
                 window.location.href="/OrderedItem/delete/"+recordid;
              
             
    }
});
         
})  

</script>              
</x-app-layout> --}}