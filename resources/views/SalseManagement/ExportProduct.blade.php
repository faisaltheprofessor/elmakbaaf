<x-app-layout>
    <x-slot name="header">     
      @include('layouts.SalseManegerSidebar')

      <div class="grid grid-rows-4 grid-flow-col ml-72">
                <div>
                  <div class="card-body grid grid-cols-2 gap-6 lg:grid-cols-1">
                    <div class="">
                         <p class="text-black font-medium">Exported Products month</p>           
                        <div class=" mb-2 flex items-center">
                            <div class="py-1 px-3 rounded bg-green-200 text-green-900 mr-3">
                                <i class="fa fa-caret-up"></i>
                            </div>
                            <p class="text-black"><span class="num-2 text-green-400"></span><span class="text-green-400">% </span> in comparison to last month.</p>
                        </div>
            
                        <div class="flex items-center">
                            <div class="py-1 px-3 rounded bg-red-200 text-red-900 mr-3">
                                <i class="fa fa-caret-down"></i>
                            </div>
                            <p class="text-black"><span class="num-2 text-red-400"></span><span class="text-red-400">% revenue per</span> in comparison to last month.</p>
                        </div>
            
                    </div>
                
                   
                  <canvas  id="ExportProductChart" class="" width="900"  height="500"></canvas>
                 
                </div>


      </div>    
     </x-slot>
     


    <script src="js/chartjs.js"></script>
    <script src="js/ExportProduct.js"></script>

   
   
</x-app-layout>
