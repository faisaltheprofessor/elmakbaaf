@extends('mainPage')
@section('Page_Content')

<section class="container mx-auto mt-20 pt-4 pb-12 ">
    <div class="flex flex-col items-center justify-center mb-12">
        <h2 class="text-3xl font-semibold text-gray-800">Our Collections</h2>
        
    </div>
    
    <div class="grid gap-2 md:grid-cols-4 items-center">
        @foreach ($collication as $collication)
        <div class="relative mx-6 items-center">
            <div class="bg-white rounded-lg shadow-md items-center">
                <img src="{{ asset('Images/Collication/'.$collication->img) }}" alt="img" class="w-full  rounded-t-lg">
                <div class="text-center py-8 sm:py-6">
                    <p class="text-xl text-black font-bold mb-2">{{$collication->description}}</p>
                </div>
               
            </div>
        </div>
        @endforeach

        
        <div class="relative mx-6">
            <div class="bg-white rounded-lg shadow-md">
                <img src="Images/Collication/b.jpg" class="w-full rounded-t-lg">
                
                 <div class="text-center py-8 sm:py-6">
                    <p class="text-xl text-black font-bold mb-2">Kilim</p>
                </div>
            </div>
        </div>
        <div class="relative mx-6">
            <div class="bg-white rounded-lg shadow-md">
                <img src="Images/Collication/c.jpg" class="w-full rounded-t-lg">
               
                <div class="text-center py-8 sm:py-6">
                    <p class="text-xl text-black font-bold mb-2">Kilim</p>
                </div>
            </div>
        </div>
        <div class="relative mx-6">
            <div class="bg-white rounded-lg shadow-md">
                <img src="Images/Collication/d.jpg" class="w-full rounded-t-lg">
               
                 <div class="text-center py-8 sm:py-6">
                    <p class="text-xl text-black font-bold mb-2">Kilim</p>
                </div>
            </div>
        </div>


        <div class="relative mx-6">
            <div class="bg-white rounded-lg shadow-md">
                <img src="Images/Collication/e.jpg" class="w-full rounded-t-lg">
               
                 <div class="text-center py-8 sm:py-6">
                    <p class="text-xl text-black font-bold mb-2">Kilim</p>
                </div>
            </div>
        </div>
        <div class="relative mx-6">
            <div class="bg-white rounded-lg shadow-md">
                <img src="Images/Collication/c.jpg" class="w-full rounded-t-lg">
                
                 <div class="text-center py-8 sm:py-6">
                    <p class="text-xl text-black font-bold mb-2">Kilim</p>
                </div>
            </div>
        </div>
        <div class="relative mx-6">
            <div class="bg-white rounded-lg shadow-md">
                <img src="Images/Collication/b.jpg" class="w-full rounded-t-lg">
               
                <div class="text-center py-8 sm:py-6">
                    <p class="text-xl text-black font-bold mb-2">Kilim</p>
                </div>
            </div>
        </div>
        <div class="relative mx-6">
            <div class="bg-white rounded-lg shadow-md">
                <img src="Images/Collication/d.jpg" class="w-full rounded-t-lg">
               
                 <div class="text-center py-8 sm:py-6">
                    <p class="text-xl text-black font-bold mb-2">Kilim</p>
                </div>
            </div> 
        </div> 
    </div>
</section>
@endsection