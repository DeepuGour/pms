
$(document).ready(function(){
    jQuery.validator.addMethod(
        "regex",
        function (value, element, param) {
            return value.match(new RegExp("^" + param + "$"));
        }
    );
    var ALPHA_REGEX = "[a-zA-Z_ ]*";

    // password add method 
    jQuery.validator.addMethod(
        'Uppercase',
        function (value) {
            return /[A-Z]/.test(value);
        },
        'Your password must contain at least one Uppercase Character.'
    );
    jQuery.validator.addMethod(
        'Lowercase',
        function (value) {
            return /[a-z]/.test(value);
        },
        'Your password must contain at least one Lowercase Character.'
    );
    jQuery.validator.addMethod(
        'Specialcharacter',
        function (value) {
            return /[!@#$%^&*()_-]/.test(value);
        },
        'Your password must contain at least one Special Character.'
    );
    jQuery.validator.addMethod(
        'Onedigit',
        function (value) {
            return /[0-9]/.test(value);
        },
        'Your password must contain at least one digit.'
    );
    $('#formsubmit').validate({
        rules:{
            'user_profile[first_name]':{
                required:true,
                minlength: 3,
                regex: ALPHA_REGEX,
               
            },
            'user_profile[last_name]':{
                required:true,
                minlength: 3,
                regex: ALPHA_REGEX,
          
            },
            'user_profile[contact]':{
                required:true,
                digits: true,
                minlength: 10,
          
            },
            'user_profile[address]':{
                required:true,
                minlength: 3,
            },
            'email':{
                required:true,
                email:true,
            },
            'password':{
                required:true,
                Uppercase: true,
                Lowercase: true,
                Specialcharacter: true,
                Onedigit: true,
                minlength: 8,
            },
            'confirm_password':{
                required: true,
                equalTo: '#password'
              },

        },
        messages:{
            'user_profile[first_name]':{
                required:'Please enter First Name',
                regex: "Please enter characters only"
            },
            'user_profile[last_name]':{
                required:'Please enter Last Name',
                regex: "Please enter characters only"
            },
            'user_profile[contact]':{
                required:'Please enter Contact',
                
            },
            'user_profile[address]':{
                required:'Please enter Address',
                minlength:'please enter 10 digit contact number',
            },
            'emial':{
                required:'Please enter Email Address',
                email:'Please Enter Valid Email Address',
            },
            'password':{
                required:'Please enter Password',
                minlength: "Password need to be at least 8 characters long",
               
            },
            'confirm_password':{
                required:'Please enter Confirm Password',
                equalTo:'Password not Match',
            }
            



        },

        submitHandler: function (form) {
            form.submit();
        }


    });


});