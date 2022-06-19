
$(".ConfirmDelete").click(function(){
    var recordid =$(this).attr("recordid");
       Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
         if (result.isConfirmed) {
           Swal.fire(
               'Deleted!',
              'Your file has been deleted.',
                 'success'
           )
            window.location.href="/suplier/delete/"+recordid;
            window.location.href="/scountry/delete/"+recordid;
   
            window.location.href="/sstreet/delete/"+recordid;

}
});    
})  