  var i;
  $(function(){
    $('.quantityPlus').click(function(){
      
     i=parseInt($('.quantitychange').val());
     i=i+1;
     $('.quantitychange').val(i);
       
    })

    $('.quantityMines').click(function(){    
      i=parseInt($('.quantitychange').val());
      i=i-1;
      if(i==-1){
        i=1;
      }
      $('.quantitychange').val(i);
        
     })
  })      