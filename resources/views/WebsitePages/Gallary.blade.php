@extends('mainPage')
@section('Page_Content')

<section class="pt-4 pb-12 ">
    <div class="my-8 text-center">
      <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
        Gallery</h2>
      <p class="text-xl">Lorem ipsum dolor sit amet consectetur adipisicing elit. soluta sapient</p>
    </div>
    <div class="container grid gap-4 mx-auto lg:grid-cols-5">

{{--      @foreach ($gallary as $gallary)--}}
{{--      <div class="w-full rounded h-50">--}}
{{--        <img class="w-full h-80" src="{{ asset('Images/Gallary/'.$gallary->img) }}" alt="img">--}}
{{--      </div>--}}
{{--      @endforeach--}}

      {{-- <div class="w-full rounded">
        <a href="images/image-2.jpg" data-lightbox="roadtrip"> <img class="w-full h-80" src="Images/Gallary/222.jpg" alt="image"></a>
      </div> --}}

      <div class="w-full rounded">
        <a href="Images/Gallary/333.jfif" data-lightbox="image-1" data-title="My caption">
          <img class="w-full h-80" src="Images/Gallary/333.jfif" alt="image">
        </a>
      </div>


      <div class="w-full rounded">
          <a href="Images/Gallary/888.jpg" data-lightbox="image-1" data-title="My caption">
            <img class="w-full h-80" data-lightbox="image-2" src="Images/Gallary/888.jpg" alt="image">
          </a>
      </div>
      <div class="w-full rounded h-50">
          <a href="Images/Gallary/111.jpg" data-lightbox="image-1" data-title="My caption">
        <img class="w-full h-80" data-lightbox="image-3" src="Images/Gallary/111.jpg" alt="image">
          </a>
      </div>
      <div class="w-full rounded">
          <a href="Images/Gallary/222.jpg" data-lightbox="image-1" data-title="My caption">
        <img class="w-full h-80" data-lightbox="image-4" src="Images/Gallary/222.jpg" alt="image">
          </a>
      </div>
    </div>

  </section>

  @endsection

