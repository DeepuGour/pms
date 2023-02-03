$('#btn-submit').click(function (e) {


    $count = 0;
    //input filld
    $(".form-control").each(function () {
        if ($(this).hasClass('form-control')) {

            if ($.trim($(this).val()) == "") {
                var inputname = $(this).attr("name"); // input name attribut get
                switch (inputname) {


                    case "email":
                        $("#error_email").html("Please enter Username");
                        $count = 1;
                        break;

                    case "password":
                        $('#error_password').html("Please enter password");
                        $count = 1;
                        break;

                    default:
                        $count = 0;

                }


            } else {
                $(this).css('border-bottom', '2px solid green');
                $(this).css('border-bottom', '2px solid green');

                $("#error_email").html("");
                $('#error_password').html("");

                $count = 0;
            }


        }

    });

    if ($count == 1) {
        e.preventDefault();
    }


});

//email validation
$('#email').keyup(function () {
    var email = $('#email').val();
    var atposition = email.indexOf("@");
    var dotposition = email.lastIndexOf(".");
    if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= email.length) {
        $(this).css("border-bottom", "3px solid red");
        $("#error_email").html("Please enter a valid Username");
    }
    else {
        $(this).css("border-bottom", "2px solid green");
        $('#error_email').html("")

    }

});



//focus
$('.form-control').focus(function () {

    $(".form-control").each(function () {
        if ($(this).hasClass('form-control')) {

            $(this).click(function () {
                $(this).css('border-bottom', '2px solid green');
                var inputname = $(this).attr("name"); // input name attribut get
                switch (inputname) {

                    case "email":
                        $("#error_email").html("");
                        $count = 1;
                        break;

                    case "password":
                        $('#error_password').html("");
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
                $(this).css('border-bottom', '2px solid red');
                var inputname = $(this).attr("name"); // input name attribut get
                switch (inputname) {
                    case "email":
                        $("#error_email").html("Please enter email address");
                        $count = 1;
                        break;

                    case "password":
                        $('#error_password').html("Please enter password");
                        $count = 1;
                        break;
                }


            } else {
                $(this).css('border-bottom', '2px solid green');
                $("#error_email").html("");
                $('#error_password').html("");


            }
        });

    }
});

