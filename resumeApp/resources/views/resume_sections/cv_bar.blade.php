<div class="row d-none d-lg-block">
    <div class="col-md-10 offset-md-1">
        <div id="navBar">
            <nav class="navbar navbar-expand-lg customNav" id="cv_bar">
                <div id="#navbar2">
                    <div class="navbar-nav" id="navbar2Links">
                        <a class="nav-item nav-link secondNavLink active " href="#about">About</a>
                        <a class="nav-item nav-link secondNavLink " href="#audio">Resume</a>
                        <a class="nav-item nav-link secondNavLink " href="#skills">Skills</a>
                        <a class="nav-item nav-link secondNavLink " href="#work">Work</a>
                        <a class="nav-item nav-link secondNavLink " href="#ourClients">Contact</a>
                        <a href="#" class="downCV">
                            <img src="resumeApp/resources/views/customTheme/images/newResume/download_cv.png" style="width: 20px">
                            <img src="resumeApp/resources/views/customTheme/images/newResume/Download CV.png" style="width: 100px;padding-top: 6px;padding-left: 5px;">
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

<div class="row d-lg-none">
    <div class="col-12 mobileNav" id="navbar2LinksMobile">
        <a class="nav-item nav-link secondNavLink navMobileLink active " href="#about">About</a>
        <a class="nav-item nav-link secondNavLink navMobileLink" href="#audio">Resume</a>
        <a class="nav-item nav-link secondNavLink navMobileLink" href="#skills">Skills</a>
        <a class="nav-item nav-link secondNavLink navMobileLink" href="#work">Work</a>
        <a class="nav-item nav-link secondNavLink navMobileLink" href="#ourClients">Contact</a>
        <a href="#" class="downCV">
            <img src="resumeApp/resources/views/customTheme/images/newResume/download_cv.png" style="width: 20px">
        </a>
    </div>
</div>

<script>
    // Add active class to the current button (highlight it)
    var header = document.getElementById("navbar2Links");
    var btns = header.getElementsByClassName("secondNavLink");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }

    // Add active class to the current button (highlight it)
    var headerMobile = document.getElementById("navbar2LinksMobile");
    var btnsMobile = headerMobile.getElementsByClassName("navMobileLink");
    for (var i = 0; i < btnsMobile.length; i++) {
        btnsMobile[i].addEventListener("click", function() {
            var current = document.querySelectorAll(".active");
            current[1].className = current[1].className.replace(" active", "");
            this.className += " active";
        });
    }
</script>