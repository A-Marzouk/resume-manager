;(function($){
    "use strict";
    $(document).ready(function () {
        
        $(".button-def, .serv a").click(function(event) {
            event.preventDefault(event);
            $('html, body').stop().animate({
                scrollTop: $(".client-form").offset().top
            }, 1500);
        });
        $('#contact-form').submit(function () {
            function completeAll() {
                $('#contact-form').html('<h2 class="top-text">Thank you for contacting us</h2>');
            }
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: "https://formspree.io/conor@123workforce.com",
                type: "POST",
                async: false,
                data: formData,
                dataType: "json",
                success: function(e) {
                    completeAll();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                },
                cache: false,
                contentType: false,
                processData: false
            });
            return false;
        });
    });
})(jQuery);