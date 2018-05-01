<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive Personal Portfolio vCard Template">
    <meta name="author" content="Ahmed Marzouk">

    <title>{{$user->name}} Resume</title>

    <!-- Web Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
    <!-- Bootstrap core CSS -->
    <link href="resumeApp/resources/views/customTheme/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- Font Awesome CSS -->
    <link href="resumeApp/resources/views/customTheme/css/font-awesome.min.css" rel="stylesheet" media="screen">
    <!-- Animate css -->
    <link href="resumeApp/resources/views/customTheme/css/animate.css" rel="stylesheet">
    <!-- Magnific css -->
    <link href="resumeApp/resources/views/customTheme/css/magnific-popup.css" rel="stylesheet">
    <!-- Custom styles CSS -->
    <link href="resumeApp/resources/views/customTheme/css/style.css" rel="stylesheet" media="screen">
    <!-- Responsive CSS -->
    <link href="resumeApp/resources/views/customTheme/css/responsive.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="resumeApp/resources/views/customTheme/images/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="resumeApp/resources/views/customTheme/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="resumeApp/resources/views/customTheme/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="resumeApp/resources/views/customTheme/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="resumeApp/resources/views/customTheme/images/ico/apple-touch-icon-57-precomposed.png">

</head>

<body>
<!-- Preloader -->
<div id="tt-preloader">
    <div id="pre-status">
        <div class="preload-placeholder"></div>
    </div>
</div>

<!-- Home Section -->
<section id="home" class="tt-fullHeight" data-stellar-vertical-offset="50" data-stellar-background-ratio="0.2">
    <div class="intro">
        <div class="intro-sub">I am {{$user->name}} </div>
        <h1>Creative<span> ILLUSTRATOR </span></h1>
        <p>I am a University Graduate of Design . I specialise in character illustration, cartoons & digital portraits</p>

        <div class="social-icons">
            <ul class="list-inline">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
            </ul>
        </div> <!-- /.social-icons -->
    </div>

    <div class="mouse-icon">
        <div class="wheel"></div>
    </div>
</section><!-- End Home Section -->




<!-- Navigation -->
<header class="header">
    <nav class="navbar navbar-custom" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#custom-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="001-michelle.html"><img src="resumeApp/resources/views/customTheme/images/logo.png" alt=""></a>
            </div>

            <div class="collapse navbar-collapse" id="custom-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#resume">Resume</a></li>
                    <li><a href="#skills">Skills</a></li>
                    <li><a href="#works">Works</a></li>
                    <li><a href="#blog">Blog</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
        </div><!-- .container -->
    </nav>
</header><!-- End Navigation -->


<!-- About Section -->
<section id="about" class="about-section section-padding">
    <div class="container">
        <h2 class="section-title wow fadeInUp">About Me</h2>

        <div class="row">

            <div class="col-md-4 col-md-push-8">
                <div class="biography">
                    <div class="myphoto">
                        <img src="resumeApp/resources/views/customTheme/images/myphoto.jpeg" alt="">
                    </div>
                    <ul>
                        <li><strong>Name:</strong> {{$user->name}} </li>
                        <li><strong>Date of birth:</strong> {{$user->birth_date}}</li>
                        <li><strong>Address:</strong> {{$user->city}}</li>
                        <li><strong>Nationality:</strong> {{$user->nationality}}</li>
                        <li><strong>Languages:</strong> {{$user->languages}}</li>
                        <li><strong>Email:</strong> {{$user->email}}</li>
                    </ul>
                </div>
            </div> <!-- col-md-4 -->

            <div class="col-md-8 col-md-pull-4">
                <div class="short-info wow fadeInUp">
                    <h3>Objective</h3>
                    <p> {{$user->careerObjective}}</p>
                </div>

                <div class="short-info wow fadeInUp">
                    <h3>What I Do ?</h3>
                    <p>{{$user->design_styles}}</p>
                    <ul class="list-check">
                        <? $design_skills_checkBoxes = explode(',',$user->design_skills_checkbox)?>
                        @foreach($design_skills_checkBoxes as $skill)
                            <li>{{$skill}}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="my-signature">
                    <img src="resumeApp/resources/views/customTheme/images/sign.png" alt="">
                    <!-- do we need to ad field for signature -->
                </div>

                <div class="download-button">
                    <a class="btn btn-info btn-lg" href="#contact"><i class="fa fa-paper-plane"></i>Send me message</a>
                    <a class="btn btn-primary btn-lg" href="#"><i class="fa fa-download"></i>download my cv</a>
                </div>
            </div>


        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section><!-- End About Section -->


<!-- Video Section -->
<section id="video" class="video-section">
    <div class="tf-bg-overlay">
        <div class="container">
            <div class="control">
                <div class="video-intro text-center">
                    <button type="button" class="play-trigger" data-toggle="modal" data-target="#tour-video"><i class="fa fa-play"></i></button>
                    <h2>Video Introducing</h2>
                </div>

                <!-- Video Modal -->
                <div class="modal modal-video" id="tour-video">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Video Tour</h4>
                            </div>
                            <div class="modal-body">
                                <div class="video-container">
                                    <iframe src="http://player.vimeo.com/video/118119037" name="vimeoplayer" id="nofocusvideo" width="500" height="281"></iframe>
                                </div><!--/.video-container-->
                            </div>
                            <!--/.modal-body-->
                        </div>
                        <!--/.modal-content-->
                    </div>
                    <!--/.modal-dialog-->
                </div>
                <!--/.modal-->
            </div>
            <!--/.control-->
        </div>
        <!--/.container-->
    </div>
    <!--/.overlay-->
</section>
<!-- /.Video Section -->


<!-- Resume Section -->
<section id="resume" class="resume-section section-padding">
    <div class="container">
        <h2 class="section-title wow fadeInUp">Resume</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="resume-title">
                    <h3>Education</h3>
                </div>
                <div class="resume">
                    <ul class="timeline">
                        <li>
                            <div class="posted-date">
                                <span class="month">2013-2017</span>
                            </div><!-- /posted-date -->

                            <div class="timeline-panel wow fadeInUp">
                                <div class="timeline-content">
                                    <div class="timeline-heading">
                                        <h3>Bachelor degree certificate</h3>
                                        <span>Cebu Technological University-Main Campus <br/>M.J. Cuenco Ave. R. Palma St., Cebu City</span>
                                    </div><!-- /timeline-heading -->

                                    <div class="timeline-body">
                                        <p></p>
                                    </div><!-- /timeline-body -->
                                </div> <!-- /timeline-content -->
                            </div><!-- /timeline-panel -->
                        </li>

                        <li class="timeline-inverted">
                            <div class="posted-date">
                                <span class="month">2011-2012</span>
                            </div><!-- /posted-date -->

                            <div class="timeline-panel wow fadeInUp">
                                <div class="timeline-content">
                                    <div class="timeline-heading">
                                        <h3>Secondary school certificate</h3>
                                        <span>Pusok National High School Pusok Lapu-Lapu  City</span>
                                    </div><!-- /timeline-heading -->

                                    <div class="timeline-body">
                                        <p></p>
                                    </div><!-- /timeline-body -->
                                </div> <!-- /timeline-content -->
                            </div> <!-- /timeline-panel -->
                        </li>

                        <li>
                            <div class="posted-date">
                                <span class="month">2007-2008</span>
                            </div><!-- /posted-date -->

                            <div class="timeline-panel wow fadeInUp">
                                <div class="timeline-content">
                                    <div class="timeline-heading">
                                        <h3>Prmary school certificate</h3>
                                        <span>Lapu-Lapu City,  Central Elementary School<br/>P. Rodriguez St. Lapu-Lapu City	</span>
                                    </div><!-- /timeline-heading -->

                                    <div class="timeline-body">
                                        <p></p>
                                    </div><!-- /timeline-body -->
                                </div> <!-- /timeline-content -->
                            </div><!-- /timeline-panel -->
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- /row -->

        <div class="row">
            <div class="col-md-12">
                <div class="resume-title">
                    <h3>SEMINAR’S ATTENDED</h3>
                </div>
                <div class="resume">
                    <ul class="timeline">
                        <li class="timeline-inverted">
                            <div class="posted-date">
                                <span class="month">2017</span>
                            </div><!-- /posted-date -->

                            <div class="timeline-panel wow fadeInUp">
                                <div class="timeline-content">
                                    <div class="timeline-heading">
                                        <h3>Women Techmakers Cebu</h3>
                                        <span>Cap Theater Cebu City<br/>April 1, 2017</span>
                                    </div><!-- /timeline-heading -->

                                    <div class="timeline-body">
                                        <p></p>
                                    </div><!-- /timeline-body -->
                                </div> <!-- /timeline-content -->
                            </div> <!-- /timeline-panel -->
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- /row -->
    </div><!-- /.container -->
</section><!-- End Resume Section -->


<!-- Skills Section -->
<section id="skills" class="skills-section section-padding">
    <div class="container">
        <h2 class="section-title wow fadeInUp">Skills</h2>

        <div class="row">
            <div class="col-md-6">
                <div class="skill-progress">
                    <div class="skill-title"><h3>Adobe Photoshop</h3></div>
                    <div class="progress">
                        <div class="progress-bar six-sec-ease-in-out" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" ><span>100%</span>
                        </div>
                    </div><!-- /.progress -->
                </div><!-- /.skill-progress -->

                <div class="skill-progress">
                    <div class="skill-title"><h3>Adobe Illustrator</h3></div>
                    <div class="progress">
                        <div class="progress-bar six-sec-ease-in-out" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" ><span>100%</span>
                        </div>
                    </div><!-- /.progress -->
                </div><!-- /.skill-progress -->
                <div class="skill-progress">
                    <div class="skill-title"><h3>Coreldraw</h3></div>
                    <div class="progress">
                        <div class="progress-bar six-sec-ease-in-out" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" ><span>100%</span>
                        </div>
                    </div><!-- /.progress -->
                </div><!-- /.skill-progress -->
            </div><!-- /.col-md-6 -->

            <div class="col-md-6">
                <div class="skill-progress">
                    <div class="skill-title"><h3>Adobe inDesign</h3></div>
                    <div class="progress">
                        <div class="progress-bar six-sec-ease-in-out" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" ><span>90%</span>
                        </div>
                    </div><!-- /.progress -->
                </div><!-- /.skill-progress -->
                <div class="skill-progress">
                    <div class="skill-title"><h3>After Effects</h3></div>
                    <div class="progress">
                        <div class="progress-bar six-sec-ease-in-out" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" ><span>90%</span>
                        </div>
                    </div><!-- /.progress -->
                </div><!-- /.skill-progress -->
                <div class="skill-progress">
                    <div class="skill-title"><h3>Adobe  Muse</h3></div>
                    <div class="progress">
                        <div class="progress-bar six-sec-ease-in-out" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" ><span>90%</span>
                        </div>
                    </div><!-- /.progress -->
                </div><!-- /.skill-progress -->

            </div><!-- /.col-md-6 -->
        </div><!-- /.row -->

        <div class="skill-chart text-center">
            <h3>More skills</h3>
        </div>

        <div class="row more-skill text-center">
            <div class="col-xs-12 col-sm-4 col-md-2">
                <div class="chart" data-percent="100" data-color="e74c3c">
                    <span class="percent"></span>
                    <div class="chart-text">
                        <span>Detail orientated</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-2">
                <div class="chart" data-percent="100" data-color="2ecc71">
                    <span class="percent"></span>
                    <div class="chart-text">
                        <span>Team player</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-2">
                <div class="chart" data-percent="80" data-color="3498db">
                    <span class="percent"></span>
                    <div class="chart-text">
                        <span>Adobe Flash</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-2">
                <div class="chart" data-percent="80" data-color="3498db">
                    <span class="percent"></span>
                    <div class="chart-text">
                        <span>Sketch up</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-2">
                <div class="chart" data-percent="50" data-color="3498db">
                    <span class="percent"></span>
                    <div class="chart-text">
                        <span>AutoCad</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-2">
                <div class="chart" data-percent="50" data-color="3498db">
                    <span class="percent"></span>
                    <div class="chart-text">
                        <span>Solidworks</span>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- /.container -->
</section><!-- End Skills Section -->


<!-- Works Section -->
<section id="works" class="works-section section-padding">
    <div class="container">
        <h2 class="section-title wow fadeInUp">Works</h2>

        <ul class="list-inline" id="filter">
            <li><a class="active" data-group="all">All</a></li>
            <li><a data-group="design">Design</a></li>
            <li><a data-group="web">Web</a></li>
            <li><a data-group="interface">Interface</a></li>
            <li><a data-group="identety">Identity</a></li>
        </ul>

        <div class="row">
            <div id="grid">
                <div class="portfolio-item col-xs-12 col-sm-4 col-md-3" data-groups='["all", "identety", "interface"]'>
                    <div class="portfolio-bg">
                        <div class="portfolio">
                            <div class="tt-overlay"></div>
                            <div class="links">
                                <a class="image-link" href="resumeApp/resources/views/customTheme/images/works/portfolio-1.jpg"><i class="fa fa-search-plus"></i></a>
                                <a href="#"><i class="fa fa-link"></i></a>
                            </div><!-- /.links -->
                            <img src="resumeApp/resources/views/customTheme/images/works/portfolio-1.jpg" alt="image">
                            <div class="portfolio-info">
                                <h3>Portfolio Title</h3>
                            </div><!-- /.portfolio-info -->
                        </div><!-- /.portfolio -->
                    </div><!-- /.portfolio-bg -->
                </div><!-- /.portfolio-item -->
                <div class="portfolio-item col-xs-12 col-sm-4 col-md-3" data-groups='["all", "identety", "web"]'>
                    <div class="portfolio-bg">
                        <div class="portfolio">
                            <div class="tt-overlay"></div>
                            <div class="links">
                                <a class="image-link" href="resumeApp/resources/views/customTheme/images/works/portfolio-2.jpg"><i class="fa fa-search-plus"></i></a>
                                <a href="#"><i class="fa fa-link"></i></a>
                            </div><!-- /.links -->
                            <img src="resumeApp/resources/views/customTheme/images/works/portfolio-2.jpg" alt="image">
                            <div class="portfolio-info">
                                <h3>Portfolio Title</h3>
                            </div><!-- /.portfolio-info -->
                        </div><!-- /.portfolio -->
                    </div><!-- /.portfolio-bg -->
                </div><!-- /.portfolio-item -->
                <div class="portfolio-item col-xs-12 col-sm-4 col-md-3" data-groups='["all", "interface"]'>
                    <div class="portfolio-bg">
                        <div class="portfolio">
                            <div class="tt-overlay"></div>
                            <div class="links">
                                <a class="image-link" href="resumeApp/resources/views/customTheme/images/works/portfolio-3.jpg"><i class="fa fa-search-plus"></i></a>
                                <a href="#"><i class="fa fa-link"></i></a>
                            </div><!-- /.links -->
                            <img src="resumeApp/resources/views/customTheme/images/works/portfolio-3.jpg" alt="image">
                            <div class="portfolio-info">
                                <h3>Portfolio Title</h3>
                            </div><!-- /.portfolio-info -->
                        </div><!-- /.portfolio -->
                    </div><!-- /.portfolio-bg -->
                </div><!-- /.portfolio-item -->
                <div class="portfolio-item col-xs-12 col-sm-4 col-md-3" data-groups='["all", "identety", "design"]'>
                    <div class="portfolio-bg">
                        <div class="portfolio">
                            <div class="tt-overlay"></div>
                            <div class="links">
                                <a class="image-link" href="resumeApp/resources/views/customTheme/images/works/portfolio-4.jpg"><i class="fa fa-search-plus"></i></a>
                                <a href="#"><i class="fa fa-link"></i></a>
                            </div><!-- /.links -->
                            <img src="resumeApp/resources/views/customTheme/images/works/portfolio-4.jpg" alt="image">
                            <div class="portfolio-info">
                                <h3>Portfolio Title</h3>
                            </div><!-- /.portfolio-info -->
                        </div><!-- /.portfolio -->
                    </div><!-- /.portfolio-bg -->
                </div><!-- /.portfolio-item -->
                <div class="portfolio-item col-xs-12 col-sm-4 col-md-3" data-groups='["all", "identety", "design"]'>
                    <div class="portfolio-bg">
                        <div class="portfolio">
                            <div class="tt-overlay"></div>
                            <div class="links">
                                <a class="image-link" href="resumeApp/resources/views/customTheme/images/works/portfolio-5.jpg"><i class="fa fa-search-plus"></i></a>
                                <a href="#"><i class="fa fa-link"></i></a>
                            </div><!-- /.links -->
                            <img src="resumeApp/resources/views/customTheme/images/works/portfolio-5.jpg" alt="image">
                            <div class="portfolio-info">
                                <h3>Portfolio Title</h3>
                            </div><!-- /.portfolio-info -->
                        </div><!-- /.portfolio -->
                    </div><!-- /.portfolio-bg -->
                </div><!-- /.portfolio-item -->
                <div class="portfolio-item col-xs-12 col-sm-4 col-md-3" data-groups='["all", "identety", "design"]'>
                    <div class="portfolio-bg">
                        <div class="portfolio">
                            <div class="tt-overlay"></div>
                            <div class="links">
                                <a class="image-link" href="resumeApp/resources/views/customTheme/images/works/portfolio-6.jpg"><i class="fa fa-search-plus"></i></a>
                                <a href="#"><i class="fa fa-link"></i></a>
                            </div><!-- /.links -->
                            <img src="resumeApp/resources/views/customTheme/images/works/portfolio-6.jpg" alt="image">
                            <div class="portfolio-info">
                                <h3>Portfolio Title</h3>
                            </div><!-- /.portfolio-info -->
                        </div><!-- /.portfolio -->
                    </div><!-- /.portfolio-bg -->
                </div><!-- /.portfolio-item -->
                <div class="portfolio-item col-xs-12 col-sm-4 col-md-3" data-groups='["all", "identety", "web"]'>
                    <div class="portfolio-bg">
                        <div class="portfolio">
                            <div class="tt-overlay"></div>
                            <div class="links">
                                <a class="image-link" href="resumeApp/resources/views/customTheme/images/works/portfolio-7.jpg"><i class="fa fa-search-plus"></i></a>
                                <a href="#"><i class="fa fa-link"></i></a>
                            </div><!-- /.links -->
                            <img src="resumeApp/resources/views/customTheme/images/works/portfolio-7.jpg" alt="image">
                            <div class="portfolio-info">
                                <h3>Portfolio Title</h3>
                            </div><!-- /.portfolio-info -->
                        </div><!-- /.portfolio -->
                    </div><!-- /.portfolio-bg -->
                </div><!-- /.portfolio-item -->
                <div class="portfolio-item col-xs-12 col-sm-4 col-md-3" data-groups='["all", "design"]'>
                    <div class="portfolio-bg">
                        <div class="portfolio">
                            <div class="tt-overlay"></div>
                            <div class="links">
                                <a class="image-link" href="resumeApp/resources/views/customTheme/images/works/portfolio-8.jpg"><i class="fa fa-search-plus"></i></a>
                                <a href="#"><i class="fa fa-link"></i></a>
                            </div><!-- /.links -->
                            <img src="resumeApp/resources/views/customTheme/images/works/portfolio-8.jpg" alt="image">
                            <div class="portfolio-info">
                                <h3>Portfolio Title</h3>
                            </div><!-- /.portfolio-info -->
                        </div><!-- /.portfolio -->
                    </div><!-- /.portfolio-bg -->
                </div><!-- /.portfolio-item -->
            </div><!-- /#grid -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- End Works Section -->


<!-- Facts Section -->
<section id="facts" class="facts-section text-center" data-stellar-vertical-offset="50" data-stellar-background-ratio="0.2">
    <div class="tt-overlay-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="count-wrap">
                        <div class="col-sm-3 col-xs-6">
                            <i class="fa fa-flask"></i>
                            <h3 class="timer">7</h3>
                            <p>Years of Experience</p>
                        </div>
                        <div class="col-sm-3 col-xs-6">
                            <i class="fa fa-thumbs-up"></i>
                            <h3 class="timer">651</h3>
                            <p>Projects Done</p>
                        </div>
                        <div class="col-sm-3 col-xs-6">
                            <i class="fa fa-users"></i>
                            <h3 class="timer">251</h3>
                            <p>Happy Clients</p>
                        </div>
                        <div class="col-sm-3 col-xs-6">
                            <i class="fa fa-trophy"></i>
                            <h3 class="timer">5</h3>
                            <p>Awards Won</p>
                        </div>
                    </div><!-- /count-wrap -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
</section> <!-- End Facts Section -->


<!-- Hire Section -->
<section class="hire-section text-center" data-stellar-vertical-offset="50" data-stellar-background-ratio="0.2">
    <div class="hire-section-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>I'm available for freelance project</h2>
                    <a href="#" class="btn btn-default">Get Hired</a>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.hire-section-bg -->
</section><!-- End Hire Section -->



<!-- Contact Section -->
<section id="contact" class="contact-section section-padding">
    <div class="container">
        <h2 class="section-title wow fadeInUp">Get in touch</h2>

        <div class="row">
            <div class="col-md-6">
                <div class="contact-form">
                    <strong>Send me a message</strong>
                    <form name="contact-form" method="post" action="resumeApp/resources/views/customTheme/php/sendemail.php">
                        <div class="form-group">
                            <label for="InputName1">Name</label>
                            <input type="text" name="name" class="form-control" id="InputName1" required="">
                        </div>
                        <div class="form-group">
                            <label for="InputEmail1">Email</label>
                            <input type="email" name="email" class="form-control" id="InputEmail1" required="">
                        </div>
                        <div class="form-group">
                            <label for="InputSubject">Subject</label>
                            <input type="text" name="subject" class="form-control" id="InputSubject">
                        </div>
                        <div class="form-group">
                            <label for="InputTextarea">Message</label>
                            <textarea name="message" class="form-control" id="InputTextarea" rows="5" required=""></textarea>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div><!-- /.col-md-6 -->

            <div class="col-md-6">
                <div class="row center-xs">
                    <div class="col-sm-6">
                        <i class="fa fa-map-marker"></i>
                        <address>
                            <strong>Address/Street</strong>
                            {{$user->city}}
                        </address>
                    </div>

                    <div class="col-sm-6">
                        <i class="fa fa-mobile"></i>
                        <div class="contact-number">
                            <strong>Phone Number</strong>
                            (001) 0123 111222<br>
                            (001) 0123 333444
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="location-map">
                            <div id="mapCanvas" class="map-canvas"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- End Contact Section -->


<!-- Footer Section -->
<footer class="footer-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="copyright text-center">
                    <p>&copy; TrendyTheme 2018. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer><!-- End Footer Section -->


<!-- Scroll-up -->
<div class="scroll-up">
    <a href="#home"><i class="fa fa-angle-up"></i></a>
</div>

<!-- Javascript files -->
<script src="resumeApp/resources/views/customTheme/js/jquery.js"></script>
<script src="resumeApp/resources/views/customTheme/bootstrap/js/bootstrap.min.js"></script>
<script src="resumeApp/resources/views/customTheme/js/jquery.stellar.min.js"></script>
<script src="resumeApp/resources/views/customTheme/js/jquery.sticky.js"></script>
<script src="resumeApp/resources/views/customTheme/js/smoothscroll.js"></script>
<script src="resumeApp/resources/views/customTheme/js/wow.min.js"></script>
<script src="resumeApp/resources/views/customTheme/js/jquery.countTo.js"></script>
<script src="resumeApp/resources/views/customTheme/js/jquery.inview.min.js"></script>
<script src="resumeApp/resources/views/customTheme/js/jquery.easypiechart.js"></script>
<script src="resumeApp/resources/views/customTheme/js/jquery.shuffle.min.js"></script>
<script src="resumeApp/resources/views/customTheme/js/jquery.magnific-popup.min.js"></script>
<script src="http://a.vimeocdn.com/js/froogaloop2.min.js"></script>
<script src="resumeApp/resources/views/customTheme/js/jquery.fitvids.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
<script src="resumeApp/resources/views/customTheme/js/scripts.js"></script>
</body>
</html>