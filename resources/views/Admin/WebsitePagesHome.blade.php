<x-app-layout>
    <x-slot name="header">
        @include('layouts.AdminSidebar')  
    
<!----Form of slideshow  ---->
   
<div class="border-collapse w-full flex flex-col pt-4 bg-gray-100">

  
  @if(session()->has('message'))
  <div id="alert" class="flex items-center mb-2 bg-green-300 text-white text-sm font-bold px-4 py-3" role="alert">
      <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
      <p>{{session()->get('message')}}</p>
  </div>
  @endif

  
    <form class="p-10 ml-5 mr-5 bg-white rounded shadow-xl" method="Post" enctype="multipart/form-data" action="/slideshow" >
      @csrf
        <p class="text-lg text-gray-800 font-medium pb-4">Add New Slide Show Picture</p>

       
        <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
          <label class=" block text-sm text-gray-600" for="">Add Picture:</label>
          <input   class="w-full px-2 py-2 text-gray-700 " id=""  name="img" type="file" required="" placeholder="" >
       </div>    

        <div class="mt-6">                                
          <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-700 rounded" value="submit" type="submit">Submit</button>                                  
      </div>
<br><br>


      <div class="container grid gap-4 mx-auto lg:grid-cols-5">
             @foreach ($slideshows as $slideshow)
                 <div class="w-full rounded h-50">
                     <img class="flex items-end justify-end h-56 w-full bg-cover"  src="{{ asset('Images/Slideshow/'.$slideshow->img) }}" alt="file">
                      <br>
                     <span class="ml-8">id = {{$slideshow->id}}</span>
                     <a href="javascript:void(0)" recordid="{{$slideshow->id}}" class="ConfirmDelete ml-5 text-red-400  py-2 px-4 hover:bg-orange-500  border border-orange-500 hover:border-transparent rounded">
                             Delete  {{-- <i class="material-icons-round text-base">delete_outline</i> --}}
                        </a>
                  </div>
               
          @endforeach
      </div>

      {{ $slideshows->links('pagination::tailwind') }}

    </form>  
   

 </x-slot>
 <script>
                      
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
            window.location.href="/slideshow/delete/"+recordid;
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