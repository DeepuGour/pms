$('#btn-submit').click(function (e) {
      

    $count = 0;
      //input filld
      $(".form-control").each(function () {
          if ($(this).hasClass('form-control')) {
             
              if ($.trim($(this).val()) == "") {
                  var inputname = $(this).attr("name"); // input name attribut get
                  switch (inputname) {
                      case "category_name":
                          $("#error_category_name").html("Please enter Category Name");
                          $count = 1;
                          break;
                      case "property_title":
                          $("#error_property_title").html("Please enter Property Title");
                          $count = 1;
                          break;
                      case "property_description":
                          $("#error_property_description").html("Please enter Property Description");
                          $count = 1;
                          break;
                      case "property_category":
                          $("#error_property_category").html("Please enter Property Category");
                          $count = 1;
                          break;
                      case "property_tags":
                          $("#error_property_tags").html("Please enter Property Tags");
                          $count = 1;
                          break;
                      case "image_file":
                          $("#error_image_file").html("Please Select image");
                          $count = 1;
                          break;
                   
                      default:
                          $count = 0;
                          
                      }
                      
                      
                  }else{
                    $("#error_category_name").html("");
                    $("#error_property_title").html("");
                    $("#error_property_description").html("");
                    $("#error_property_category").html("");
                    $("#error_property_tags").html("");
                    $("#error_image").html("");
                 
    
                      $count = 0;
              }

          
          }

      });
      
                  if($count == 1){
                      e.preventDefault();
                    }
              

  });

   
//  //focus
  $('.form-control').focus(function () {

      $(".form-control").each(function () {
          if ($(this).hasClass('form-control')) {
            
          $(this).click(function(){
              $(this).css('border-bottom','2px solid green');
                  var inputname = $(this).attr("name"); // input name attribut get
                  switch (inputname) {
                      case "category_name":
                          $("#error_category_name").html("");
                          $count = 1;
                          break;
                      case "property_title":
                          $("#error_property_title").html("");
                          $count = 1;
                          break;
                      case "property_description":
                          $("#error_property_description").html("");
                          $count = 1;
                          break;
                      case "property_category":
                          $("#error_property_category").html("");
                          $count = 1;
                          break;
                      case "property_tags":
                          $("#error_property_tags").html("");
                          $count = 1;
                          break;
                      case "image_file":
                          $("#error_image_file").html("");
                          $count = 1;
                          break;
              
                       
                        
                  }
               });
          
          }

 
          
        
      });
     
});

// blur use


  $(".form-control").each(function () {
      if ($(this).hasClass('form-control')) {
          $('.form-control').blur(function () {
          if ($.trim($(this).val()) == "") {
              $(this).css('border-bottom','2px solid red');
              var inputname = $(this).attr("name"); // input name attribut get
              switch (inputname) {
                case "category_name":
                    $("#error_category_name").html("Please enter Category Name");
                    $count = 1;
                    break;
                case "property_title":
                    $("#error_property_title").html("Please enter Property Title");
                    $count = 1;
                    break;
                case "property_description":
                    $("#error_property_description").html("Please enter Property Description");
                    $count = 1;
                    break;
                case "property_category":
                    $("#error_property_category").html("Please enter Property Category");
                    $count = 1;
                    break;
                case "property_tags":
                    $("#error_property_tags").html("Please enter Property Tags");
                    $count = 1;
                    break;
                case "image_file":
                    $("#error_image_file").html("Please Select image");
                    $count = 1;
                    break;
              }          
                  
          }else{
            $("#error_category_name").html("");
            $("#error_property_title").html("");
            $("#error_property_description").html("");
            $("#error_property_category").html("");
            $("#error_property_tags").html("");
            $("#error_image").html("");

          }
          });
      
      }
}); 
