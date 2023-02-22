// delete with sweert alert 
$('.delete').on('click',function(e) {
    e.preventDefault();
    var id = $(this).attr('id');
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
     })
     .then((willDelete) => {
      if (willDelete) {
       var hide_tr = $(this).parents('tr');
       $.ajax({
       url: "/properties/propertyDelete",
       data: {'id':id},
       type: "json",
       method: "get",
       success:function(response){
         if(response == 1){
           hide_tr.hide(); 
         }
       }
     });
     swal("Poof! Your imaginary file has been deleted!", {
         icon: "success",
       });
   return false;
      
     } else {
       swal("Your imaginary file is safe!");
     }
   });
 });

//  get data edit  
 $('.edit').on('click',function(e){
   e.preventDefault();
  var id = $(this).attr('data-id');
   $.ajax({
   url: "/properties/edit",
   data: {'id':id},
   type: "JSON",
   method: "get",
success:function(response){
 
 var result = JSON.parse(response);
  $('#exampleModal').modal('show');
  $('#property-id').val(result['id']);
   $('#user-id').val(result['user_id']);
   $('#property-title').val(result['property_title']);
   $('#property-description').val(result['property_description']);
  document.getElementById(result['category_name']).selected = true;
  // $('#'+result['category_name']).selected = true;
   $('#property-tags').val(result['property_tags']);
  
}
});
});

$('#formData').submit(function(e){
  e.preventDefault();
  var formData = new FormData(this);
$.ajax({
  headers: {
          'X-CSRF-TOKEN': csrfToken
        },
url: "/properties/propertyEdit",
type: "json",
cache: false,
processData: false,
contentType: false,
method: "POST",
data:formData,
success:function(response){
if(response == 1){

$('#exampleModal').modal('hide');
swal("Good job!", "You clicked the button!", " Edit success");
$('#table-hide').load('/properties/properties-show #table-hide');
}
}
});
});



