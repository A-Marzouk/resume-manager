<nav class="navbar navbar-expand-md navbar-light navbar-laravel resume-builder-nav">
  <a class="navbar-brand col-md-2 col-9" href="{{ url('/') }}">
      <img src="/images/resume_builder/123 logo.png" alt="logo">
  </a>
  <button class="navbar-toggler" id="navBarToggle" type="button" data-toggle="collapse" style="border: none;"
          data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" style="background-image: url('/images/newResume/menu.png');"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <!-- Right Side Of Navbar -->
      <li class="navbar-nav chatWithUsText">
          <? if($admin || (session()->get('admin') && session()->get('admin') == 'AdminWasHere')):?>
          <a class="nav-item nav-link customNavLink" href="/admin" style="color:#0290D8;">Admin-area</a>
          <?else :?>
          {{--<a class="nav-item nav-link customNavLink" href="#chatOn" id="liveChat" style="color:#0290D8;">--}}
          {{--<img src="/images/textsms_24px.png" alt="chat img" width="16px">--}}
          {{--&nbsp; Chat with us!--}}
          {{--</a>--}}
          <? endif;?>
      </li>
      <ul class="navbar-nav">
          <!-- Authentication Links -->
          <?php if(!$isClient && !$isAgent): ?>
          <li class="nav-link loginBtn no-outline">
              <a href="{{ route('client.login') }}" data-toggle="modal" data-target="#loginModal"
              >{{ __('Log in') }}</a>
          </li>
          <li class="nav-link loginBtn filled">
              <a href="{{ route('client.login') }}" data-toggle="modal" data-target="#loginModal"
            >{{ __('Sign up') }}</a>
          </li>
          <? else: ?>
          <a class="nav-item nav-link customNavLink" href="/dashboard">
              @if($isClient) {{ currentClient()->contact}} @endif @if($isAgent) {{currentUser()->userData->first_name}} @endif
          </a>
          <a class="nav-item nav-link customNavLink" href="/logout">
              Logout
          </a>

          <? endif;?>
      </ul>
  </div>
</nav>