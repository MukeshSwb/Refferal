
// On full page load after that loader is hide on the screen
$(window).on("load", function () {
    $(".loader").fadeOut("slow");
});

$(function () {
    OnClickEvent.init();
    Validation.init();
    OnChangeEvent.init();
    OnPageLoadEvent.init();
});

if (typeof file_type == "undefined") {
    var file_type = "";
}
// OnPageLoad Jquery Events
OnPageLoadEvent = {
    init: function () {
    },
 };

// All Page OnChange Jquery Events
OnChangeEvent = {
    init: function () {
    },
};

function showCoverSpinLoader() {
    $("#cover-spin").show();
}

// All On Page load Jquery Event
OnClickEvent = {
    init: function () {
        $(document).on("click",".side-nav__item",function(){
            $(".side-nav__item").removeClass("side-nav__item-active");
            // $(this).addClass("side-nav__item-active");
        });
    },
};

// All validations
Validation = {
    init: function () {
        Validation.validforms();
    },
    validforms: function () {
        $("#registration").validate({
            ignore: [],
            rules:{
                first_name:{
                    required:true,
                },
                last_name:{
                    required:true
                },
                email:{
                    required:true
                },
                mobile_no:{
                    required:true
                },
                password:{
                    required:true,
                    minlength: 6,
                },
                confirm_password:{
                    required:true,
                    minlength: 6,
                    equalTo: "#password",
                },
                referral_code:{
                    required:true
                },
            },
            messages:{
                first_name:{
                    required : "First name is required",
                },
                last_name:{
                    required : "Last name is required",
                },
                email:{
                    required:"Email is required"
                },
                mobile_no:{
                    required:"Mobile number is required"
                },
                password:{
                    required:"Enter the password",
                    minlength: "password minimum length is 6 characters",
                },
                confirm_password:{
                    required:"Enter the confirm password",
                    minlength: "Confirm password minimum length is 6 characters",
                    equalTo: "Password doesn't match",
                },
                referral_code:{
                    required:"Referral code is required"
                },
            },
           
            submitHandler: function (form){
                $("#cover-spin").show();
                form.submit();
            }
        });


        // Check Additional methos using validations
        //Value Must be Greter Than Zero
        $.validator.addMethod("valueMustGreterThanZero",function (value, element, param) {
            if (value > 0) return true;
            else return false;
        },VALIDATIONS.VALUE_MUST_BE_GREATER_THEN_ZERO);

        // Check email valid or not
        $.validator.addMethod("checkValidEmail",function (value, element, param) {
            return value.match(
                /^[a-zA-Z0-9_\.%\+\-]+@[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,}$/
            );
        },VALIDATIONS.PLEASE_ENTER_VALID_EMAIL);

        $.validator.addMethod("checkValidUrl",function (value, element, param) {
            return value.match(/http:\/\/(?:www.)?(?:(vimeo).com\/(.*)|(youtube).com\/watch\?v=(.*?)&)/);
        },"Please Enter Valid Url!");

        // Check only allowed only sting valid
        $.validator.addMethod("allowedOnlyString",function (value, element, param) {
            return value.match(/^[a-zA-Z]+$/);
        },VALIDATIONS.ALLOWED_ONLY_CHARACTER_VALUE);

        // Number is not allowed additional validations
        $.validator.addMethod("lettersonly",function (value, element, param) {
            return this.optional(element) || /^[a-z]+$/i.test(value);
        },VALIDATIONS.NUMBER_IS_NOT_PERMITTED);
    },
};

// Error Handling Display Message
function ErrorHandlingMessage(response) {
    $("#cover-spin").hide();
    var data = JSON.parse(JSON.stringify(response));
    var errorResponse = data.responseJSON;
    if (errorResponse.status === "failed") {
        toastr.error(errorResponse.message);
    }
}

// Close Popup Modal & reset
function closePopupModal($id) {
    $("#" + $id).on("hidden.bs.modal", function (e) {
        $(this).find("input,textarea,select").val("").end().find("input[type=checkbox], input[type=radio]").prop("checked", "").end();
    });
}

function ShowLoader(){
    $("#cover-spin").show();
}