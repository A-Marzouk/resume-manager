<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- includes --}}
    <!-- Web Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link href="resumeApp/resources/views/customTheme/css/font-awesome.min.css" rel="stylesheet" media="screen">

    <link href="resumeApp/resources/views/customTheme/css/main.css" rel="stylesheet" media="screen">

    <title>Resume New</title>

    <div id="navBar">
        <nav class="navbar navbar-expand-lg customNav">
            <a class="navbar-brand" href="/">
                <img src="resumeApp/resources/views/customTheme/images/newResume/123wf_logo.png" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <img src="resumeApp/resources/views/customTheme/images/newResume/menu.png" alt="menu" width="46px">
            </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link customNavLink active" href="#">Homepage</a>
                    <a class="nav-item nav-link customNavLink" href="/form/client/register/">Become a client</a>
                    <a class="nav-item nav-link customNavLink" href="#">Talk to sales</a>
                    <a href="/form/client/login/" class="loginBtn">Login</a>
                </div>
            </div>
        </nav>
    </div>

    <div id="freelancersInfo">
        <div class="row text-center">
            <div class="col-md-12">
                <div class="freelancerItem">
                    <img src="resumeApp/resources/views/customTheme/images/newResume/Arnold.jpg" alt="freelancer" class="freelancerImg">
                    <div class="freelancerData">
                        <div class="freelancerName">
                            Dmitri
                        </div>
                        <div class="freelancerJob">
                            Full-Stack Developer
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="line"></div>
                    <div class="socialIcons">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="resumeApp/resources/views/customTheme/images/newResume/behance.png" alt="socialicon">
                                <span class="imgText">behance.com/juannorris</span>
                            </div>
                            <div class="col-md-4">
                                <img src="resumeApp/resources/views/customTheme/images/newResume/dribbble.png" alt="socialicon">
                                <span class="imgText">dribbble.com/j.norris</span>
                            </div>
                            <div class="col-md-4">
                                <img src="resumeApp/resources/views/customTheme/images/newResume/personalweb.png" alt="socialicon">
                                <span class="imgText">jnorris.com</span>
                            </div>
                        </div>
                    </div>
                <div class="line"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 offset-md-4">
                <div class="buttonMain">
                    <a class="hireBtn btn-block hire" href="#">Hire Me</a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="buttonMain">
                    <a class="hireBtn btn-block" href="#">Send me message </a>
                </div>
            </div>
        </div>
    </div>

    <div id="quote">
        <div class="row">
            <div class="col-md-1 offset-md-1">
                <img src="resumeApp/resources/views/customTheme/images/newResume/quote.png" alt="quote">
            </div>
           <div class="col-md-10">
               <div class="quoteText">
                   A highly motivated Graphic Designer with experience in Web Designing/Development and project Management.<br/>Ambitious and detail oriented producing quality materials for any design needs.
               </div>
           </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div id="navBar">
                <nav class="navbar navbar-expand-lg customNav">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <img src="resumeApp/resources/views/customTheme/images/newResume/menu.png" alt="menu" width="46px">
            </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-item nav-link secondNavLink active" href="#about">About</a>
                            <a class="nav-item nav-link secondNavLink " href="#resume">Resume</a>
                            <a class="nav-item nav-link secondNavLink " href="#skills">Skills</a>
                            <a class="nav-item nav-link secondNavLink " href="#work">Work</a>
                            <a class="nav-item nav-link secondNavLink " href="#contact">Contact</a>
                            <a href="#" class="downCV">
                                <img src="resumeApp/resources/views/customTheme/images/newResume/download_cv.png" style="width: 20px;">
                                <img src="resumeApp/resources/views/customTheme/images/newResume/Download CV.png" style="width: 100px;padding-top: 6px;padding-left: 5px;">
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    {{-- About me Section --}}
    <div id="about">
        <div class="row">
            <div class="col-md-5 offset-md-2">
                <div class="row">
                    <div class="col-md-1">
                        <img src="resumeApp/resources/views/customTheme/images/newResume/about_me.png" alt="aboutImg" width="30px;">
                    </div>
                    <div class="col-md-8">
                        <div class="aboutText">
                            ABOUT ME<br>
                            <div class="row">
                                <div class="col-md-5 aboutSubText">
                                    <p>Birthday:</p>
                                    <p>Adress:</p>
                                    <p>Nationality:</p>
                                    <p>Languages:</p>
                                    <p>Email:</p>
                                </div>
                                <div class="col-md-7 aboutSubText">
                                    <p>01/01/2000</p>
                                    <p>Ukrain, Kiev</p>
                                    <p>Ukrainian</p>
                                    <p>English Russian</p>
                                    <p>test@test.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-1">
                        <img src="resumeApp/resources/views/customTheme/images/newResume/what_i_do.png" alt="aboutImg" width="30px;">
                    </div>
                    <div class="col-md-8">
                        <div class="aboutText">
                            WHAT I DO?<br>
                            <div class="row">
                                <div class="col-md-6 aboutSubText">
                                    <p>UI design</p>
                                    <p>UX design</p>
                                    <p>Brochure Design</p>
                                    <p>Logo design</p>
                                    <p>Branding</p>
                                </div>
                                <div class="col-md-6 aboutSubText">
                                    <p>Brochure Design</p>
                                    <p>UX design</p>
                                    <p>Ukrainian</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</head>
<body>





<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script
        src="https://code.jquery.com/jquery-migrate-3.0.1.min.js"
        integrity="sha256-F0O1TmEa4I8N24nY0bya59eP6svWcshqX1uzwaWC4F4="
        crossorigin="anonymous"></script>

</body>
</html>