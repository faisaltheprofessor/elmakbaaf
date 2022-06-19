<x-app-layout>
    <x-slot name="header">
        @include('layouts.SalseManegerSidebar')  
<!----Form of order  ---->
    


<div class="border-collapse w-full flex flex-col pt-4 bg-gray-100">
 
 
  @if(session()->has('message'))
  <div id="alert" class="flex items-center mb-2 bg-green-300 text-white text-sm font-bold px-4 py-3" role="alert">
      <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
      <p>{{session()->get('message')}}</p>
  </div>
  @endif


     <a href="{{ url('AllOrderedItemCart') }}">
         <button class=" ml-5 bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-full">
                 Item Added
     </button></a>
 
    <form class="p-10 ml-5 mr-5 bg-white rounded shadow-xl" method="Post" enctype="multipart/form-data"  >
      @csrf
        <p class="text-lg text-gray-800 font-medium pb-4">Add Order Items</p>


        <div class="inline-block mt-2 w-1/4 pr-1">
            <label class=" block text-sm text-gray-600" for="">Collection</label>
            <input   class="w-full px-2 py-2 text-gray-700 " id="" name="collication" type="text" required="" placeholder="" >
        </div>
        <div class="inline-block mt-2 -mx-1 pl-1 w-1/4">
            <label class=" block text-sm text-gray-600" for="">Size</label>
            <input   class="w-full px-2 py-2 text-gray-700 " id=""  name="size" type="text" required="" placeholder="" >
        </div>
        <div class="inline-block mt-2 w-1/4 pr-1">
            <label class=" block text-sm text-gray-600" for="">Unit Area</label>
            <input   class="w-full m-2 px-2 py-2 text-gray-700 " id="" name="unit_area" type="text" required="" placeholder="" >
        </div>
        <div class="inline-block mt-2 -mx-1 pl-1 w-1/4">
            <label class=" block text-sm text-gray-600" for="">Color</label>
            <input   class="w-full m-2 px-2 py-2 text-gray-700 " id=""  name="color" type="text" required="" placeholder="" >
        </div>
        
        <div class="inline-block mt-2 w-1/4 pr-1">
            <label class=" block text-sm text-gray-600" for="">Design</label>
            <input   class="w-full px-2 py-2 text-gray-700 " id="" name="design" type="text" required="" placeholder="" >
        </div>
        
        <div class="inline-block mt-2 -mx-1 pl-1 w-1/4">
            <label class=" block text-sm text-gray-600" for="">Quality</label>
            <input   class="w-full px-2 py-2 text-gray-700 " id=""  name="quality" type="text" required="" placeholder="" >
        </div>

        <div class="inline-block mt-2 w-1/4 pr-1">
            <label class=" block text-sm text-gray-600" for="">Length</label>
            <input   class="w-full m-2 px-2 py-2 text-gray-700 " id="" name="lenght" type="text" required="" placeholder="" >
        </div>
        
        <div class="inline-block mt-2 -mx-1 pl-1 w-1/4">
            <label class=" block text-sm text-gray-600" for="">Width</label>
            <input   class="w-full m-2 px-2 py-2 text-gray-700 " id=""  name="width" type="text" required="" placeholder="" >
        </div>
        
        {{-- <div class="inline-block mt-2 w-1/2 pr-1">
            <label class=" block text-sm text-gray-600" for="">Design</label>
            <input   class="w-full px-2 py-2 text-gray-700 "  id="" name="design" type="text" required="" placeholder="" >
        </div> --}}
       
        <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
          <label class=" block text-sm text-gray-600" for="">Add Picture</label>
          <input   class="w-full px-2 py-2 text-gray-700 " id=""  name="file" type="file" required="" placeholder="" >
      </div>    
                           
          <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-700 rounded" value="submit" type="submit">Submit</button>                         
         
  
     
    </form>  

    <main class="my-8">
        <div class="container mx-auto px-6">
            <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 mt-6">
             
              @foreach ($orderitem as $orderitem)
              <form method="post" class="" action="/OrderItemCart">
                @csrf 
              <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                    <div >
                        <td><img  class="flex items-end justify-end h-56 w-full bg-cover"  src="{{ asset('Images/Order/'.$orderitem->file) }}" alt="file"></td>
                    </div>
                    {{-- <div class="px-5 py-3">
                        <span class="text-gray-500 mt-2">collication : {{$orderitem->collication}}</span><br/>
                        <span class="text-gray-500 mt-2">Size : {{$orderitem->size}} </span><br/>   
                        <span class="text-gray-500 mt-2">Unit_area : {{$orderitem->unit_area}}  </span><br/> 
                        <span class="text-gray-500 mt-2">color : {{$orderitem->color}} </span> <br/>
                        <span class="text-gray-500 mt-2">Quality : {{$orderitem->quality}} </span><br/> 
                        <span class="text-gray-500 mt-2">Lenght : {{$orderitem->lenght}} </span><br/> 
                        <span class="text-gray-500 mt-2">Width: {{$orderitem->width}} </span> <br/>
                        <span class="text-gray-500 mt-2">Design : {{$orderitem->design}} </span> 
    
                    </div> --}}

                    
                <div class=" quantity flex flex-row h-10  rounded-lg relative bg-transparent mt-1 px-1 py-1  mx-3">
              
                 
                  <div data-cartid="{{$orderitem->id}}"  class="btnUpdateItem  quantityMines bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                    <span class="m-auto text-2xl font-thin">−</span>
                  </div>
                  <input  class="quantitychange focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="quantity"  required="" placeholder="" value="1">
                  <input  id=""   type="hidden" required="" placeholder="" value="{{$orderitem->id}}" name="orderitem_id" > 
                  <div data-cartid="{{$orderitem->id}}"  class=" btnUpdateItem  quantityPlus    bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                  <span class="m-auto text-2xl font-thin">+</span>
                </div>
                <button href="javascript:void(0)"  recordid="{{$orderitem->id}}"   class="ConfirmDelete bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                  <span class="m-auto text-2xl font-thin">x</span>
                </button>
{{--       
                <div class="flex flex-row h-10 w-75 rounded-lg relative bg-transparent mt-1 px-1 py-1  mx-3">
                
                  <button data-action="decrement" class=" bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                    <span class="m-auto text-2xl font-thin">−</span>
                  </button>
                   <input  id=""   type="hidden" required="" placeholder="" value="{{$orderitem->id}}" name="orderitem_id" >  
                  <input  class=" focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="quantity" value="{{$orderitem->quantity}}">
                <button data-action="increment" class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                  <span class="m-auto text-2xl font-thin">+</span>
                </button>
     --}}
                <button   type="submit" class=" ml-1 mr-0  bg-red-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-full">
                 Add 
                </button>
              
              </div>      
            </form>  
                  </div>      
              @endforeach
  
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



       $("document").ready(function(){
                    setTimeout(function(){
                        $("#alert").remove();
                    },5000);
                });


</script>
 <script>
   
//    $('#submitcartitem').click(function(){
//        $.ajex({
//           url: 'OrderedItemCart',
//           data: $('form').serialize(),
//           type: 'post',
         
//        });

//    });



 </script>
                  
</x-app-layout>