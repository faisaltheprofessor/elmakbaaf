@extends('mainPage')
@section('Page_Content')
{{-- <section class="pt-4 pb-12 "> --}}
<section class="pt-4 pb-12 px-4 py-16 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 lg:py-32">
    <div class="flex flex-col lg:flex-row lg:-mx-8">
      <div >
        <h2 class="text-3xl leading-tight font-bold mt-4">Our History</h2>
        <p class="text-lg mt-4 font-semibold">Since 1995</p>
        <p class="mt-2 leading-relaxed">We are a family business with over 20 years experience in handmade carpet industry. Its origins date back to 1995 in Kabul the capital of Afghanistan.Whose citizen’s main source of income has were handmade carpet weaving.
             More than 20 years after its founding, Elmak Baaft is still a family owned and operated company. Run by the same family that founded it and its principal activity is still the manufacture of custom woven wool rich carpets. At present It no only works with local raw materials but also selects the best wool form around the
        </p>
      </div>
    </div>
    @foreach ($history as $history) 
    <div class="md:flex mt-8">
         <div class="w-16 h-16 bg-blue-600 rounded-full">
            <img src="{{ asset('Images/History/'.$history->img) }}"  alt="img">
         </div>
        <div class="md:ml-8 mt-4 md:mt-0">
          <h4 class="text-xl font-bold leading-tight">{{$history->year}}</h4>
          <p class="mt-2 leading-relaxed">{{$history->description}}</p>
        </div>
      </div>
    </div>
    @endforeach


    <div class="md:flex mt-8">
        <div>
          <div class="w-16 h-16 bg-blue-600 rounded-full">
            <img src="Images/56.png" alt="" class="h-20 mx-auto">
          </div>
        </div>
        <div class="md:ml-8 mt-4 md:mt-0">
          <h4 class="text-xl font-bold leading-tight">2014</h4>
          <p class="mt-2 leading-relaxed">Access to global market</p>
        </div>
      </div>
    </div>
 

  <div class="md:flex mt-8">
    <div>
      <div class="w-16 h-16 bg-blue-600 rounded-full"></div>
    </div>
    <div class="md:ml-8 mt-4 md:mt-0">
      <h4 class="text-xl font-bold leading-tight">2017</h4>
      <p class="mt-2 leading-relaxed">Rebuilding and showcasing the afghan handmade carpet industry.</p>
    </div>
  </div>
</div>
</section>


@endsection