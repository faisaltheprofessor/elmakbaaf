@extends('mainPage')
@section('Page_Content')

<section class="pt-4 pb-12 ">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <div class="swiper mySwiper">

          <div class="swiper-wrapper">
            @foreach ($slideshows as $slideshow)
            <div class="swiper-slide ">
              <img
                class="object-cover  w-full h-96"
                src="{{ asset('Images/Slideshow/'.$slideshow->img) }}" alt="img"
                alt=""
              />
            </div>
            @endforeach

            {{-- <div class="swiper-slide">
              <img
                class="object-cover w-full h-96"
                src="Images/6.jpg"
                alt=""
              />
            </div>
            <div class="swiper-slide">
              <img
                class="object-cover w-full h-96"
                src="Images/6.jpg"
                alt=""
              />
            </div>
            <div class="swiper-slide">
              <img
                class="object-cover w-full h-96"
                src="Images/6.jpg"
                alt=""
              />
            </div> --}}

          </div>

          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-pagination"></div>

        </div>


    </div>
    <div class="bg-white">




  <div >
    <!-- Image gallery -->
    <div class="mt-6 max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-3 lg:gap-x-8">

      <div class="py-10 lg:pt-6 lg:pb-16 lg:col-start-1 lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
        <!-- Description and details -->

        <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
          <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">
            Oriental Carpets
          </h1>
          <h4 class="  tracking-tight text-gray-900 sm:text-3xl">
            A Living History
          </h4>
        </div>

        <div>
          <h3 class="sr-only">Description</h3>

          <div class="space-y-6">
            <p class="text-base text-gray-900">Creating the personal look in our home requires thought, planning and a reasonable knowledge of the wide range of products available. One decorated item that has remained popular and in demand through the years, no matter what the fashion and always with an enthusiastic following, is the authentic hand knotted Oriental rug. No other decorative item has had such an influence with such a diverse public.</p>
         </div>
         <div class="space-y-6">
           <br>

          <p class="text-base text-gray-900">Creating the personal look in our home requires thought, planning and a reasonable knowledge of the wide range of products available. One decorated item that has remained popular and in demand through the years, no matter what the fashion and always with an enthusiastic following, is the authentic hand knotted Oriental rug. No other decorative item has had such an influence with such a diverse public.</p>
       </div>

       <div class="space-y-6">
        <br>

       <p class="text-base text-gray-900">  <div class="space-y-6">
       <p class="text-base text-gray-900">Oriental rugs as textile art vie with picture for space on our walls. Applications are limitless, inviting us to Break, the rules and explore the many possibilities the bring</p>

      </div></p>
    </div>
        </div>

      </div>
      <div class="aspect-w-4 aspect-h-5 sm:rounded-lg sm:overflow-hidden lg:aspect-w-3 lg:aspect-h-4">
        <img src="Images/HomePage/67.PNG" alt="Model wearing plain white basic tee." class="w-full h-full object-center object-cover">
      </div>
        <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
            <img src="Images/HomePage/68.PNG" alt="Model wearing plain gray basic tee." class="w-full h-96 object-center object-cover">
       </div>

       <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
        <img src="Images/HomePage/69.PNG" alt="Model wearing plain gray basic tee." class="w-full h-96 object-center object-cover">
      </div>
    <div class="mt-10">
      <h2 class="text-2xl font-extrabold tracking-tight  sm:text-3xl  text-gray-900">Making the selection…</h2>

      <div class="mt-4 space-y-6">
        <p class=" text-xl text-gray-600">When selecting a rug, closeness of knotting, clarity of design, quality of wools (or silk), dyes and color used finally, the finishing are all important consideration, Designs of rugs are usually either geometric shapes - from towns villages and tribal tradition - or floral - from workshops where precision and attentions to details are paramount.</p>

      </div>
    </div>

    </div>


</div>

</div>


</section>
@endsection
