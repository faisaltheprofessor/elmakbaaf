<x-app-layout>
    <x-slot name="header">     
      @include('layouts.SalseManegerSidebar')


      <div class="relative flex items-top justify-center min-h-screen w-full bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
     
        <div class="p-6 -mt-80 bg-white border-b border-gray-200">
          <img class="ml-20" width="200px" src="Images/ELMAAK BAAFT LOGOo.png" alt="img"><br>
         <h1 class="text-2xl"> You're logged in as salse Manager!</h1>
       </div>

   
    </div>


     </x-slot>
  
   
</x-app-layout>
