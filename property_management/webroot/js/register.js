$('#btn-submit').click(function (e) {
      

    $count = 0;
      //input filld
      $(".form-control").each(function () {
          if ($(this).hasClass('form-control')) {
             
              if ($.trim($(this).val()) == "") {
                  var inputname = $(this).attr("name"); // input name attribut get
                  switch (inputname) {
                      case "user_profile[first_name]":
                              $("#error_first_name").html("Please enter first name");
                              $count = 1;
                              break;
                      case "user_profile[last_name]":
                              $("#error_last_name").html("Please enter last name");
                              $count = 1;
                              break;
                     case "user_profile[contact]":
                        $("#error_contact").html("Please enter contact");
                        $count = 1;
                        break;
                     case "user_profile[address]":
                            $("#error_address").html("Please enter address");
                            $count = 1;
                            break;
                     case "email":
                              $("#error_email").html("Please enter email address");
                              $count = 1;
                              break;
                     case "image_file":
                              $("#error_image_file").html("Please Select image");
                              $count = 1;
                              break;
                     case "password":
                          $('#error_password').html("Please enter password");
                          $count = 1;
                          break;
                     case "confirm_password":
                              $('#error_confirm_password').html("Please enter confirm password");
                              $count = 1;
                              break;
                      default:
                          $count = 0;
                          
                      }
                      
                      
                  }else{
                    $("#error_first_name").html("");
                    $("#error_last_name").html("");
                    $("#error_contact").html("");
                    $("#error_address").html("");
                    $("#error_email").html("");
                    $("#error_image").html("");
                    $('#error_password').html("");
                    $("#error_confirm-password").html("");
    
                      $count = 0;
              }

          
          }

      });
      
                  if($count == 1){
                      e.preventDefault();
                    }
              

  });

//   //email validation
//   $('input[name="email"]').blur(function () {
//       var email = $(this).val();
//       var atposition = email.indexOf("@");
//       var dotposition = email.lastIndexOf(".");
//       if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= email.length) {
//           $(this).css("border-bottom", "3px solid red");
//           $("#error_email").html("Please enter a valid e-mail address");
//       }
//       else {
//           $(this).css("border-bottom", "2px solid green");
//           $('#error_email').html("")

//       }

//   });
// // contact 
//   $('#user-profile-contact').blur(function () {
//       var cellPhone1 = $('#user-profile-contact').val();
//               if (cellPhone1.length < 10 || cellPhone1.length > 10) {
//                   $(this).css("border", "2px solid red");
//                  span = "Set 10 digit cell number";
//                  $('#error_contact').html(span);
//              }
//              else if (isNaN(cellPhone1)) {
//               $(this).css("border", "2px solid red");
//                  span = "Cell  number field only number put";
//                  $('#error_contact').html(span);

//              }
//              else {
//               $(this).css("border", "2px solid green");
//                  $("#error_contact").html("");

//              }
//          });
     //password match 
      $('input[name="confirm_password"]').keyup(function () {
          
                  if ($(this).val()!=$('input[name="password"]').val()) {
                      $(this).css("border-bottom", "2px solid red");
                     span = "password not match";
                     $("#error_confirm_password").html(span);
                 }
                 else {
                     $("#error_confirm_password").html("");
  
                 }
             });
  
 //focus
  $('.form-control').focus(function () {

      $(".form-control").each(function () {
          if ($(this).hasClass('form-control')) {
            
          $(this).click(function(){
              $(this).css('border-bottom','2px solid green');
                  var inputname = $(this).attr("name"); // input name attribut get
                  switch (inputname) {
                      case "user_profile[first_name]":
                        $("#error_first_name").html("");
                        $count = 1;
                        break;
                        case "user_profile[last_name]":
                        $("#error_last_name").html("");
                        $count = 1;
                        break;
                        case "user_profile[contact]":
                        $("#error_contact").html("");
                        $count = 1;
                        break;
                        case "user_profile[address]":
                        $("#error_address").html("");
                        $count = 1;
                        break;
                        case "email":
                        $("#error_email").html("");
                        $count = 1;
                        break;
                        case "image_file":
                        $("#error_image_file").html("");
                        $count = 1;
                        break;
                        case "password":
                        $('#error_password').html("");
                        $count = 1;
                        break;
                        case "confirm_password":
                        $('#error_confirm_password').html("");
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
    case "user_profile[first_name]":
        $("#error_first_name").html("Please enter first name");
        $count = 1;
        break;
            case "user_profile[last_name]":
                    $("#error_last_name").html("Please enter last name");
                    $count = 1;
                    break;
            case "user_profile[contact]":
            $("#error_contact").html("Please enter contact");
            $count = 1;
            break;
            case "user_profile[address]":
                $("#error_address").html("Please enter address");
                $count = 1;
                break;
            case "email":
                    $("#error_email").html("Please enter email address");
                    $count = 1;
                    break;
            case "image_file":
                    $("#error_image_file").html("Please Select image");
                    $count = 1;
                    break;
            case "password":
                $('#error_password').html("Please enter password");
                $count = 1;
                break;
            case "confirm_password":
                    $('#error_confirm_password').html("Please enter confirm password");
                    $count = 1;
                    break;
                        }
                            
                  
          }else{
            $("#error_first_name").html("");
            $("#error_last_name").html("");
            $("#error_contact").html("");
            $("#error_address").html("");
            $("#error_email").html("");
            $("#error_image").html("");
            $('#error_password').html("");
            $("#error_confirm-password").html("");

          }
          });
      
      }
}); 

