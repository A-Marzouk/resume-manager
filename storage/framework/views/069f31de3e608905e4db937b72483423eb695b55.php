<script type="text/javascript" src="/js/app.js"></script>
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script
        src="https://code.jquery.com/jquery-migrate-3.0.1.min.js"
        integrity="sha256-F0O1TmEa4I8N24nY0bya59eP6svWcshqX1uzwaWC4F4="
        crossorigin="anonymous"></script>

<script type="text/javascript" src="/js/slick-master/slick/slick.min.js"></script>
<script>
    $(document).ready(function(){
        $('.slickSlide').slick({
            lazyLoad: 'ondemand',
            dots: true,
            arrows:false,
            slidesToShow: 6,
            slidesToScroll: 3,
            autoplay:true,
            responsive: [
                {
                    breakpoint: 478,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    }
                },
                {
                    breakpoint: 680,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 2,
                    }
                },
                {
                    breakpoint: 911,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    }
                }
            ]
        });

        $('.slickSlide_portfolio').slick({
            lazyLoad: true,
            dots: true,
            arrows:false,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay:true,
        });

        if ($("#sendMessage").length ){
            setTimeout(function(){
                $('#messagesBox').animate({scrollTop: $("#messagesBox").offset().top}, 'slow');
            }, 1000);
        }
        if ($("#chatLogs").length ){
            setTimeout(function(){
                $('html,body').animate({scrollTop: $("#sendMessage").offset().top}, 'slow');
            }, 1000);
        }

        if($('#chatBox').length){
            $("#liveChat").click(function(){
                $("#chatBox").animate({right: '10px',bottom:'10px',opacity:'1'});
                $("#chatBox").removeClass('d-none');
                // close the navbar
                $('#chatBox').animate({scrollTop: $("#sendMessage").offset().top}, 'slow');
                $('#messagesBox').animate({scrollTop: $("#sendMessage").offset().top}, 'slow');
                // $('#navBarToggle').click();
            });

            $('#chatMin').on('click',function(){
                $("#liveChat").click();
                $('#chatMinBox').addClass('d-none');
            });

            $("#closeChat").click(function(){
                $("#chatBox").animate({bottom: '-550px',opacity:'1'});
                $("#chatBox").addClass('d-none');

                // show the minimized version
                $('#chatMinBox').removeClass('d-none');
            });
        }

    });

    $('.single-item').slick({
        lazyLoad: 'ondemand',
        dots: true,
        arrows:false,
        slidesToShow: 2,
        slidesToScroll: 2,
        responsive: [
            {
                breakpoint: 786,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });


    function handler1() {
        $('img', this).attr('src','/images/Circle-PNG-HD.png');
        $(this).one("click", handler2);
    }
    function handler2() {
        $('img', this).attr('src','/images/img_143278 (2).png');
        $(this).one("click", handler1);
    }

    $(".designerBtn a").one("click", handler1);


</script>
