<nav class="navbar navbar-light client_navbar">
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