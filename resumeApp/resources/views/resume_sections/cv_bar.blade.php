<div class="row">
    <div class="col-md-10 offset-md-1">
        <div id="navBar">
            <nav class="navbar navbar-expand-lg customNav" id="cv_bar">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar2" aria-controls="navbar2" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                                <img src="resumeApp/resources/views/customTheme/images/newResume/menu.png" alt="menu" width="46px">
                            </span>
                </button>
                <div class="collapse navbar-collapse" id="#navbar2">
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
</script>