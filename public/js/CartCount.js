// $(document).ready(function(){
 

    function loadcart(req, response){
        $.ajax({
           method: "GET",
           url:"/load-cart-data",

           success:function(abc){
                console.log(abc.count)
            //    $('.cart-count').html('');
               $('.cart-count').html(abc.count);
            //    alert(response.count);
            // console.log(response);
            
           }
        });
    }
loadcart();
// });