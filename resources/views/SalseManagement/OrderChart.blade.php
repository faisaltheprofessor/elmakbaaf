<x-app-layout>
    <x-slot name="header">     
      @include('layouts.SalseManegerSidebar')

      <div class="grid grid-rows-4 grid-flow-col ml-72">
                <div>
                  <div class="card-body grid grid-cols-2 gap-6 lg:grid-cols-1">
                    <div class="">
                         <p class="text-black font-medium">Orders Per month</p>           
                        <div class=" mb-2 flex items-center">
                            <div class="py-1 px-3 rounded bg-green-200 text-green-900 mr-3">
                                <i class="fa fa-caret-up"></i>
                            </div>
                            <p class="text-black"><span class="num-2 text-green-400"></span><span class="text-green-400">% more Order</span> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corrupti, illum? Obcaecati iure officia modi consequuntur dolo</p>
                        </div>
            
                        <div class="flex items-center">
                            <div class="py-1 px-3 rounded bg-red-200 text-red-900 mr-3">
                                <i class="fa fa-caret-down"></i>
                            </div>
                            <p class="text-black"><span class="num-2 text-red-400"></span><span class="text-red-400">% revenue per sale</span> Lorem ipsum dolor sit amet consectetur </p>
                        </div>
            
                    </div>
                
                               
                <canvas id="OrderChart" width="800" height="400"></canvas>
                 
                </div>

      </div>    
     </x-slot>
     
   

    <script src="js/chartjs.js"></script>
    <script src="js/OrderChart.js"></script>

   
   
</x-app-layout>
