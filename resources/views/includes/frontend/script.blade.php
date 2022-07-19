<script>
    var isRtl="LTR"
    var rtlTrue=false;
    if(isRtl=='RTL'){
        rtlTrue=true;
    }
</script>

<!--Js-->
<script src="frontend/js/jquery-3.6.0.min.js"></script>
<script src="frontend/js/bootstrap.min.js"></script>
<script src="frontend/js/popper.min.js"></script>
<script src="frontend/js/jquery-ui.min.js"></script>
<script src="frontend/js/jquery.magnific-popup.min.js"></script>
<script src="frontend/js/jquery.collapse.js"></script>
<script src="frontend/js/owl.carousel.min.js"></script>
<script src="frontend/js/swiper-bundle.js"></script>
<script src="frontend/js/jquery.filterizr.min.js"></script>
<script src="frontend/js/select2.min.js"></script>
<script src="frontend/js/wow.min.js"></script>
<script src="frontend/js/jquery.dataTables.min.js"></script>
<script src="frontend/js/viewportchecker.js"></script>
<script src="frontend/js/bootstrap-datepicker.min.js"></script>
<script src="frontend/js/cookie-consent.js"></script>
<script src="frontend/js/jquery-ui.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script src="frontend/js/custom.js"></script>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="toastr/toastr.min.js"></script>
<script>
    </script>



<script>
    //Search
    function openSearch() {
        document.getElementById("myOverlay").style.display = "block";
    }

    function closeSearch() {
        document.getElementById("myOverlay").style.display = "none";
    }

    //Mobile Menu
    function openNav() {
        document.getElementById("mySidenav").style.width = "100%";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }

	(function($) {

    "use strict";
    // load available appointment in doctor details
    $(document).on('change', '#datepicker-value', function() {
            var value=$(this).val();
            var lawyer_id=$("#lawyer_id").val();
            var url="http://127.0.0.1:8000/get-appointment";
            $.ajax({
            type: 'GET',
            url: url,
            data:{'lawyer_id':lawyer_id,'date':value},
            success: function (response) {
                if(response.success){
                    $("#doctor-available-schedule").html(response.success)
                    $("#schedule-box-outer").removeClass('d-none')
                    $("#doctor-schedule-error").addClass('d-none')
                    $("#sub").prop("disabled", false);
                }
                if(response.error){
                    $("#schedule-box-outer").addClass('d-none')
                    $("#doctor-schedule-error").removeClass('d-none')
                    $("#doctor-schedule-error").html(response.error)
                    $("#sub").prop("disabled", true);
                }

            },
            error: function(err) {
                console.log(err);
            }
        });
    });
	})(jQuery);


    // load doctor in modal
    function loadDoctor(){
        var id=$(".department-id").val();
        if(id){
            var url="http://127.0.0.1:8000/get-department-doctor"+"/"+id;
            $.ajax({
                type: 'GET',
                url: url,
                success: function (response) {
                    $(".lawyer-id").html(response)
                    $("#modal-doctor-box").removeClass('d-none')
                },
                error: function(err) {
                    console.log(err);
                }
            });

        }
    }
    // load doctor in mobile menu modal
    function loadMobileModalDoctor(){
        var id=$(".modal-department-id").val();
        if(id){
            var url="http://127.0.0.1:8000/get-department-doctor"+"/"+id;
            $.ajax({
                type: 'GET',
                url: url,
                success: function (response) {
                    $(".modal-lawyer-id").html(response)
                    $("#mobile-modal-doctor-box").removeClass('d-none')
                },
                error: function(err) {
                    console.log(err);
                }
            });

        }
    }

    // load date in modal
    function loadDate(){
        var lawyerId=$('.lawyer-id').val()
        $('#modal_lawyer_id').val(lawyerId)
        $("#modal-date-box").removeClass('d-none')

    }

    // load date in mobile menu modal
    function loadModalDate(){
        var lawyerId=$('.modal-lawyer-id').val()
        $('#mobile_modal_lawyer_id').val(lawyerId)
        $("#mobile-modal-date-box").removeClass('d-none')

    }




	(function($) {

    "use strict";
    // load available appointment in appoinment model
    $(document).on('change', '#modal-datepicker-value', function() {
            var value=$(this).val();
            var lawyer_id=$("#modal_lawyer_id").val();
            var url="http://127.0.0.1:8000/get-appointment";
            $.ajax({
            type: 'GET',
            url: url,
            data:{'lawyer_id':lawyer_id,'date':value},
            success: function (response) {
                if(response.success){
                    $("#available-modal-schedule").html(response.success)
                    $("#modal-schedule-box").removeClass('d-none')
                    $("#modal-schedule-error").addClass('d-none')
                    $("#modal-sub").prop("disabled", false);
                }
                if(response.error){
                    $("#modal-schedule-box").addClass('d-none')
                    $("#modal-schedule-error").removeClass('d-none')
                    $("#modal-schedule-error").html(response.error)
                    $("#modal-sub").prop("disabled", true);


                }
            },
            error: function(err) {
                console.log(err);
            }
        });
    });

    // load available appointment in appoinment model
    $(document).on('change', '#mobile-modal-datepicker-value', function() {
            var value=$(this).val();
            var lawyer_id=$("#mobile_modal_lawyer_id").val();
            var url="http://127.0.0.1:8000/get-appointment";
            $.ajax({
            type: 'GET',
            url: url,
            data:{'lawyer_id':lawyer_id,'date':value},
            success: function (response) {
                if(response.success){
                    $("#available-mobile-modal-schedule").html(response.success)
                    $("#mobile-modal-schedule-box").removeClass('d-none')
                    $("#mobile-modal-schedule-error").addClass('d-none')
                    $("#mobile-modal-sub").prop("disabled", false);
                }
                if(response.error){
                    $("#mobile-modal-schedule-box").addClass('d-none')
                    $("#mobile-modal-schedule-error").removeClass('d-none')
                    $("#mobile-modal-schedule-error").html(response.error)
                    $("#mobile-modal-sub").prop("disabled", true);
                }
            },
            error: function(err) {
                console.log(err);
            }
        });
    });
	})(jQuery);


// stripe

$(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('d-none');

        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('d-none');
        e.preventDefault();
      }
    });

    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }

  });

  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }

});




</script>

<script>

    var receiver_id = '';
    

	(function($) {

    "use strict";

    $(document).ready(function () {
        $('.user').on('click',function () {
            $('.user').removeClass('active');
            $(this).addClass('active');
            $(this).find('.pending').remove();

            receiver_id = $(this).attr('id');
            $.ajax({
                type: "get",
                url: "http://127.0.0.1:8000/frontend/get-message"+ "/" + receiver_id,
                data: "",
                cache: false,
                success: function (data) {
                    $('#messages').html(data);
                    scrollToBottomFunc();
                }
            });
        });

        $(document).on('keyup', '.input-text input', function (e) {
            var message = $(this).val();

            if(message != ''){
                $("#sentMessageBtn").prop("disabled", false);
            }else{
                $("#sentMessageBtn").prop("disabled", true);
            }

            if (e.keyCode == 13 && message != '' && receiver_id != '') {
                $(this).val('');

                var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                // project demo mode check
                var isDemo="1"
                var demoNotify="Demo Mode"
                if(isDemo==0){
                    toastr.error(demoNotify);
                    return;
                }
                // end
                $.ajax({
                    type: "get",
                    url: "http://127.0.0.1:8000/frontend/send-message",
                    data: datastr,
                    cache: false,
                    success: function (data) {
                        scrollToBottomFunc();
                        $('#' + data.lawyer_id).click();

                    },
                    error: function (jqXHR, status, err) {
                    }
                })
            }
        });


        $(document).on('click', '#zoom_demo_mode', function () {
        var demoNotify="Demo Mode"
        toastr.error(demoNotify);
    });

    });
	})(jQuery);


    // make a function to scroll down auto
    function scrollToBottomFunc() {
        $('.message-wrapper').animate({
            scrollTop: $('.message-wrapper').get(0).scrollHeight
        }, 50);
    }

    // send messag by click button
    function sendMessage(){
        var message=$(".submit").val();
        $(".submit").val('');
        var datastr = "receiver_id=" + receiver_id + "&message=" + message;

        // project demo mode check
        var isDemo="1"
         var demoNotify="Demo Mode"
         if(isDemo==0){
             toastr.error(demoNotify);
             return;
         }
         // end
        $.ajax({
            type: "get",
            url: "http://127.0.0.1:8000/frontend/send-message",
            data: datastr,
            cache: false,
            success: function (data) {
                scrollToBottomFunc();
                $('#' + data.lawyer_id).click();
            },
            error: function (jqXHR, status, err) {
            }
        })


    }

</script>