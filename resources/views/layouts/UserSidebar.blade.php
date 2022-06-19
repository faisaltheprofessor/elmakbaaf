
<div class="md:flex flex-col md:flex-row md:min-h-screen">
    <div @click.away="open = false" class="flex flex-col w-full md:w-64 text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0" x-data="{ open: false }">
      <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between">
        {{-- <a href="#" class="text-lg  tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline font-bold" href="#">My Account</a> --}}
        <button class="rounded-lg md:hidden  focus:outline-none focus:shadow-outline" @click="open = !open">
          <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
            <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
          </svg>
        </button>
      </div>


      <div> <img          
        class="object-cover ml-10 w-32 h-32 rounded-full "
        src="{{ asset('Images/UsersImges/'.Auth::user()->img ) }}"
        alt=""
        aria-hidden="true"
      /></div>
    <div class="ml-12 mt-5">{{ Auth::user()->user_type }}</div>




      <nav :class="{'block': open, 'hidden': !open}" class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">
        <a class="block px-4 py-2 mt-2 text-sm font-bold text-gray-900  "  href="{{url('userdashboard')}}"> Dashboard</a>
        <a class="block px-4 py-2 mt-2 text-sm font-bold text-gray-900 "  href="{{url('shop')}}">shop</a>
        <a class="block px-4 py-2 mt-2 text-sm font-bold text-gray-900 "  href="{{url('checkout')}}">Checkout</a>
        <a class="block px-4 py-2 mt-2 text-sm font-bold text-gray-900 "  href="{{url('myaccount')}}">My All Order</a>
       

      </nav>
    </div>