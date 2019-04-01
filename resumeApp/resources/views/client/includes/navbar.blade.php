<nav class="navbar navbar-light fixed-top client_navbar">

    <a href="#0" class="js-menu-open menu-open" id="menu-open-icon">
        <img src="/resumeApp/public/images/client/Group.png" alt="menu">
    </a>

    <a href="#0" class="js-menu-close d-none" id="menu-close-icon">
        <img src="/resumeApp/public/images/client/close.png" alt="menu">
    </a>

    <a class="navbar-brand" href="/client">
        <img src="/resumeApp/public/images/client/123logo.png" alt="logout">
    </a>
    <div class="form-inline my-2 my-lg-0">

    </div>
    <div class="form-inline my-2 my-lg-0 clientName">
        <div class="logoutButton">
            <a href="#">
                <img src="/resumeApp/public/images/client/log_out.png" alt="logout">
            </a>
        </div>
        <div>
            {{$client->name}}
        </div>
        <div class="clientAvatar">
            <img src="/resumeApp/public/images/client/dummy.png" alt="logout">
        </div>
    </div>
</nav>