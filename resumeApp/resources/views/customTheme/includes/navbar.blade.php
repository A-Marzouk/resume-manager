<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand col-md-3 col-9" href="{{ url('/') }}">
            <img src="/resumeapp/resources/views/customTheme/images/newResume/123wf_logo.png" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <a class="nav-item nav-link customNavLink " href="/">Homepage</a>
                <a class="nav-item nav-link customNavLink active" href="/form/client/register/">Become a client</a>
                <a class="nav-item nav-link customNavLink" href="#">Talk to sales</a>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <?php if(auth()->guard('client')->guest()): ?>
                <li></li>
                <li class="nav-link loginBtn">
                    <a href="{{ route('client.login') }}">{{ __('Log in') }}</a> <span style="color: #18A6DF;">/</span>
                    <a href="{{ route('client.register') }}">{{ __('Join') }}</a>
                </li>
                <? else: ?>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::guard('client')->user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('client.logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('client.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                <? endif;?>
            </ul>
        </div>
    </div>
</nav>