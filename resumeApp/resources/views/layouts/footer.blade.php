<div class="customFooter">
    <div class="row container1">
        <div class="col-md-4 offset-md-1 three">
            <div class="footerText">
                © Copyright 2018 123Workforce.<br/>
                All Rights Reserved.<br/>
                <div class="skypeText" style="padding-top: 5px;">
                    <a href="{{route('terms')}}" target="_blank">
                        <span style="opacity: 1;">Terms & Conditions</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-2 text-center two">
            <div class="footerImg">
                <img src="/resumeApp/resources/views/customTheme/images/newResume/logo.png" alt="logo">
            </div>
        </div>
        <div class="col-md-4 one text-right">
            <div class="footerText text-right">
                info@123workforce.com<br>
                (+44) 2037000685
            </div>
        </div>
        <div class="col-md-4 offset-md-7 text-right four">
            <div class="skypeText">
                <a href="skype:conor_827?call">
                    <img src="/resumeApp/resources/views/customTheme/images/skypeLogo.png" alt="skype" width="25px" style="opacity: 1;">
                    <span>Call us on Skype</span>
                </a>
            </div><br/>
                <!-- Load Facebook SDK for JavaScript -->
            <div id="fb-root"></div>
            <script>
                    (function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s); js.id = id;
                        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));
            </script>
            <!-- Your customer chat code -->
                <div class="fb-customerchat"
                     attribution=setup_tool
                     page_id="1010896968958465"
                     theme_color="#0084ff">
                </div>
            {{-- facebook like button --}}
            <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1';
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
            {{-- end of like button  script --}}
            <div>
                <a href="https://www.facebook.com/123workforce">
                    <img src="/resumeApp/resources/views/customTheme/images/newResume/fb.png" alt="fb" width="25px">
                </a>
                <a href="https://www.instagram.com/123workforce/">
                    <img src="/resumeApp/resources/views/customTheme/images/newResume/instagram.png" alt="insta" width="25px">
                </a>
            </div><br/>
            {{--<div style="padding-top: 6px;" class="fb-like" data-href="https://123workforce.com/" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>--}}
            {{--<div style="padding-top:10px;" class="fb-page" data-href="https://www.facebook.com/123workforce" data-tabs="timeline" data-width="180" data-height="70" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/123workforce" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/123workforce">123 Workforce</a></blockquote></div>--}}
        </div>
        <div class="col-md-12 text-center">
            <div class="fb-page" data-href="https://www.facebook.com/123workforce/" data-tabs="timeline" data-width="500" data-height="70" data-small-header="false" data-adapt-container-width="false" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/123workforce/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/123workforce/">123 Workforce</a></blockquote></div>
        </div>
</div>

<style>
    .fb_customer_chat_bubble_pop_in {
        bottom: 45px !important;
    }

    #fb-root > div.fb_dialog.fb_dialog_advanced.fb_shrink_active {
        bottom: 100px !important;
    }
    .fb-customerchat.fb_invisible_flow.fb_iframe_widget iframe {
        bottom: 100px !important;
    }
</style>