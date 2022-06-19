let ExportProductmonths = new Array();
  let numberOfExport = new Array();

   $(document).ready(function(){

   $.get('/exportproductpermonth',function(response){
    months = response.months
    numberOfSalse = response.order_count_data
    const ctx = document.getElementById('ExportProductChart').getContext('2d');
    const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: months ,
                datasets: [{
                    label: "Exported Products by Month",
                    data: numberOfSalse,                 
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });

   })


       
    });