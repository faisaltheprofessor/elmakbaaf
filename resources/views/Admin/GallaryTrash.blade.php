<x-app-layout>
    <x-slot name="header">
        @include('layouts.AdminSidebar')  
    
<!----Form of Gallary  ---->
    
<div class="border-collapse w-full flex flex-col pt-4 bg-gray-100">

  @if(session()->has('message'))
  <div id="alert" class="flex items-center mb-2 bg-green-300 text-white text-sm font-bold px-4 py-3" role="alert">
      <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
      <p>{{session()->get('message')}}</p>
  </div>
  @endif


   
<br><br>
      <div class="container grid gap-4 mx-auto lg:grid-cols-5">
        @foreach ($gallary as $gallary)
            <div class="w-full rounded h-50">
                <img class="flex items-end justify-end h-56 w-full bg-cover"  src="{{ asset('Images/Gallary/'.$gallary->img) }}" alt="img">
                <br>
                  <span class="ml-8">id = {{$gallary->id}}</span>
                  <a  href="{{url('/websitegallary/reastore',$gallary->id)}}" class="  hover:text-gray-100 ml-5 text-red-400  py-2 px-4 hover:bg-orange-500  border border-orange-500 hover:border-transparent rounded">
                    Restore
                  </a>
                   <a href="javascript:void(0)" recordid="{{$gallary->id}}" class="ConfirmDelete  hover:text-gray-100 ml-5 text-red-400  py-2 px-4 hover:bg-orange-500  border border-orange-500 hover:border-transparent rounded">
                         Delete
                   </a>
             </div>
          
           
     @endforeach
  </div>

    </form>  

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
            window.location.href="/websitegallary/forcedelete/"+recordid;
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