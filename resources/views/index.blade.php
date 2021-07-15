<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Hire Top Freelance Designers & Scale your Creative Workforce with no overheads - Connecting companies with Top Freelance Designers.">
    <meta name="keywords" content="UI/UX, Motion Design, Graphic Design, Illustrator, Interaction">
    
    <title>Hire Talented Software Engineers | 123 Workforce</title>
   
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;1,700&family=Noto+Sans:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <!-- Styles -->
    @include('layouts.includes.styles')
  </head>
  <body >
  <!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        xfbml            : true,
        version          : 'v9.0'
      });
    };

    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

  <!-- Your Chat Plugin code -->
  <div class="fb-customerchat"
       attribution=setup_tool
       page_id="1010896968958465">
  </div>

      <homepage-root id="homepageRoot"></homepage-root>
   
    @include('layouts.includes.scripts')


  </body>
</html>
