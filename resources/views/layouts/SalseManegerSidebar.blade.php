
    <div class="md:flex flex-col md:flex-row md:min-h-screen">
        <div @click.away="open = false" class="flex flex-col w-full md:w-64 text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0" x-data="{ open: false }">
          <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between">
            {{-- <a href="#" class="text-lg  tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline font-bold" href="{{ url('salse') }}">Salse Manager</a> --}}
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
            <div class="flex flex-col sm:flex-row sm:justify-around">
              <div class="w-64 h-screen bg-white">
                  <nav class="mt-10">
                    
                    <div x-data="{ open: false }">
                        <button @click="open = !open" class="w-full flex justify-between items-center py-3  text-gray-600 cursor-pointer hover:bg-gray-100 hover:text-gray-700 focus:outline-none">
                            
                          <span class="flex items-center">
                                {{-- <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg> --}}
    
                              <a href="{{ url('salse') }}">  <span class="mx-4 font-medium">Deshboard</span></a>
                            </span>
{{--     
                            <span>
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>
                                    <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span> --}}
                        </button>
{{--     
                        <div x-show="open" class="bg-gray-100">
                            <a class="py-2 px-12 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="{{ url('addClient') }}">Add New Client</a>
                            <a class="py-2 px-12 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="{{ url('allClient') }}"> Clients Record</a>
                            <a class="py-2 px-12 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="{{ url('phone') }}">Contact</a>
                            
                        </div> --}}
                    </div>

                      <div x-data="{ open: false }">
                          <button @click="open = !open" class="w-full flex justify-between items-center py-3  text-gray-600 cursor-pointer hover:bg-gray-100 hover:text-gray-700 focus:outline-none">
                              
                            <span class="flex items-center">
                                  {{-- <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                  </svg> --}}
      
                                  <span class="mx-4 font-medium">Client Accounts</span>
                              </span>
      
                              <span>
                                  <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>
                                      <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                  </svg>
                              </span>
                          </button>
      
                          <div x-show="open" class="bg-gray-100">
                              <a class="py-2 px-12 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="{{ url('addClient') }}">Add New Client</a>
                              <a class="py-2 px-12 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="{{ url('allClient') }}"> Clients Record</a>
                              <a class="py-2 px-12 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="{{ url('phone') }}">Contact</a>
                              
                          </div>
                      </div>
    
    
                      <div x-data="{ open: false }">
                        <button @click="open = !open" class="w-full flex justify-between items-center py-3  text-gray-600 cursor-pointer hover:bg-gray-100 hover:text-gray-700 focus:outline-none">
                            <span class="flex items-center">
                                {{-- <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg> --}}
    
                                <span class="mx-4 font-medium">Address</span>
                            </span>
    
                            <span>
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>
                                    <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </button>
    
                        <div x-show="open" class="bg-gray-100">
                            <a class="py-2 px-12 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="{{ url('country') }}">Country</a>
                            <a class="py-2 px-12 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white"  href="{{ url('city') }}">City</a>
                            <a class="py-2 px-12 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="{{ url('street') }}">Street</a>
                        </div>
                    </div>
    
    
                    <div x-data="{ open: false }">
                      <button @click="open = !open" class="w-full flex justify-between items-center py-3  text-gray-600 cursor-pointer hover:bg-gray-100 hover:text-gray-700 focus:outline-none">
                          <span class="flex items-center">
                              {{-- <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                              </svg> --}}
    
                              <span class="mx-4 font-medium">Making Order</span>
                          </span>
    
                          <span>
                              <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>
                                  <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                              </svg>
                          </span>
                      </button>
    
                      <div x-show="open" class="bg-gray-100">
                          <a class="py-2 px-12 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="{{url('/OrderedItem')}}">Making New Order</a>
                          <a class="py-2 px-12 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="{{ url('AllOrderedItemCart') }}">All Product Item </a>
                          <a class="py-2 px-12 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="{{ url('ClientAllOrder') }}">Orders Records </a>
                      </div>
                  </div>
    
                  <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex justify-between items-center py-3  text-gray-600 cursor-pointer hover:bg-gray-100 hover:text-gray-700 focus:outline-none">
                        <span class="flex items-center">
                            {{-- <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg> --}}
    
                            <span class="mx-4 font-medium">Invoice</span>
                        </span>
    
                        <span>
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>
                                <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </button>
    
                    <div x-show="open" class="bg-gray-100">
                        
                        <a class="py-2 px-12 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white"  href="{{ url('allProduct') }}">All Products</a>
                        <a class="py-2 px-12 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="{{ url('makeinvoice')}}"> Make Invoice </a>
                        <a class="py-2 px-12 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="{{ url('AllInvoice') }}">All Invoice/bill</a>
                    </div>
                </div>

                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex justify-between items-center py-3  text-gray-600 cursor-pointer hover:bg-gray-100 hover:text-gray-700 focus:outline-none">
                        <span class="flex items-center">
                            {{-- <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg> --}}
    
                            <span class="mx-4 font-medium">Charts </span>
                        </span>
    
                        <span>
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>
                                <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </button>
    
                    <div x-show="open" class="bg-gray-100">
                        
                        <a class="py-2 px-12 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white"  href="{{ url('clientpermonth') }}">Client Per Month</a>
                        <a class="py-2 px-12 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="{{ url('salsepermonth')}}"> Salse Per Month </a>
                        <a class="py-2 px-12 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="{{ url('orderpermonth') }}">Order Per Month</a>
                        <a class="py-2 px-12 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="{{ url('exportproductpermonth') }}">Export Product Per Month</a>
                    </div>
                </div>
       

                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex justify-between items-center py-3  text-gray-600 cursor-pointer hover:bg-gray-100 hover:text-gray-700 focus:outline-none">
                        <span class="flex items-center">
                       
        
                            <span class="mx-4 font-medium">Trash</span>
                        </span>
        
                        <span>
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>
                                <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </button>
        
                    <div x-show="open" class="bg-gray-100">
                        <a class="py-2 px-12 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="{{ url('countrytrash') }}">Country Trash</a>
                        <a class="py-2 px-12 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white"  href="{{ url('citytrash') }}">City Trash</a>
                        <a class="py-2 px-12 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="{{ url('streettrash') }}">Street Trash</a>
                        <a class="py-2 px-12 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="{{ url('clienttrash') }}">Client Trash</a>
                        <a class="py-2 px-12 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white"  href="{{ url('phonetrash') }}">Client Contact Trash</a>
                        <a class="py-2 px-12 block text-sm text-gray-600 hover:bg-blue-500 hover:text-white" href="{{ url('OrderedItemtrash') }}">Order Item Trash</a>

                        
                        
                    </div>
                </div>
        

                  </nav>          
              </div>
          </div>

    
          </nav>
        </div>