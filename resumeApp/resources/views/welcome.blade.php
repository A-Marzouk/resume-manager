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
    <div style="position: absolute;">
        <iframe src="{{$user->googleCalendar}}" style="border: 0" width="289" height="200" frameborder="0" scrolling="no"></iframe>
    </div>
    <div class="intro">
        <div class="intro-sub">I am {{$user->name}} </div>
        <h1><span> {{$user->jobTitle}} </span></h1>
        <p>{{$user->intro}}</p>

        <div class="social-icons">
            <ul class="list-inline">
                <li><a href="{{$user->githubLink}}"><i class="fa fa-github"></i></a></li>
                {{--<li><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
                <li><a href="{{$user->stackoverflowLink}}"><i class="fa fa-stack-overflow"></i></a></li>
                {{--<li><a href="#"><i class="fa fa-dribbble"></i></a></li>--}}
                {{--<li><a href="#"><i class="fa fa-pinterest"></i></a></li>--}}
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
                        <img src="{{$user->photo}}" alt="">
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
                        <? $counter = count($design_skills_checkBoxes);
                        if($counter > 6 ){
                            $counter = 6 ;
                        }
                        ?>
                        <? if($counter > 0):?>
                            @for($i=0; $i<$counter; $i++)
                                <li>{{$design_skills_checkBoxes[$i]}}</li>
                            @endfor
                        <? endif;?>
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
                                    <iframe src="http://player.vimeo.com/video/118119037?title=My%20Working%20times" name="vimeoplayer" id="nofocusvideo" width="500" height="281"></iframe>
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
                        <? if(!empty($education['title'][0])):?>
                            <li>
                            <div class="posted-date">
                                <span class="month">{{$education['year'][0]}}</span>
                            </div><!-- /posted-date -->

                            <div class="timeline-panel wow fadeInUp">
                                <div class="timeline-content">
                                    <div class="timeline-heading">
                                        <h3>{{$education['title'][0]}}</h3>
                                        <span>{{$education['description'][0]}}</span>
                                    </div><!-- /timeline-heading -->

                                    <div class="timeline-body">
                                        <p></p>
                                    </div><!-- /timeline-body -->
                                </div> <!-- /timeline-content -->
                            </div><!-- /timeline-panel -->
                        </li>
                        <? endif;?>
                            <? if(!empty($education['title'][1])):?>
                            <li class="timeline-inverted">
                            <div class="posted-date">
                                <span class="month">{{$education['year'][1]}}</span>
                            </div><!-- /posted-date -->

                            <div class="timeline-panel wow fadeInUp">
                                <div class="timeline-content">
                                    <div class="timeline-heading">
                                        <h3>{{$education['title'][0]}}</h3>
                                        <span>{{$education['description'][0]}}</span>
                                    </div><!-- /timeline-heading -->

                                    <div class="timeline-body">
                                        <p></p>
                                    </div><!-- /timeline-body -->
                                </div> <!-- /timeline-content -->
                            </div> <!-- /timeline-panel -->
                        </li>
                        <? endif;?>
                            <? if(!empty($education['title'][2])):?>
                            <li>
                            <div class="posted-date">
                                <span class="month">{{$education['year'][2]}}</span>
                            </div><!-- /posted-date -->

                            <div class="timeline-panel wow fadeInUp">
                                <div class="timeline-content">
                                    <div class="timeline-heading">
                                        <h3>{{$education['title'][2]}}</h3>
                                        <span>{{$education['description'][1]}}</span>
                                    </div><!-- /timeline-heading -->

                                    <div class="timeline-body">
                                        <p></p>
                                    </div><!-- /timeline-body -->
                                </div> <!-- /timeline-content -->
                            </div><!-- /timeline-panel -->
                        </li>
                        <? endif;?>
                            <? if(!empty($education['title'][3])):?>
                            <li class="timeline-inverted">
                                <div class="posted-date">
                                    <span class="month">{{$education['year'][3]}}</span>
                                </div><!-- /posted-date -->

                                <div class="timeline-panel wow fadeInUp">
                                    <div class="timeline-content">
                                        <div class="timeline-heading">
                                            <h3>{{$education['title'][3]}}</h3>
                                            <span>{{$education['description'][3]}}</span>
                                        </div><!-- /timeline-heading -->

                                        <div class="timeline-body">
                                            <p></p>
                                        </div><!-- /timeline-body -->
                                    </div> <!-- /timeline-content -->
                                </div> <!-- /timeline-panel -->
                            </li>
                        <? endif;?>
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
                        <? if(!empty($trainings['title'][0])):?>
                            <li class="timeline-inverted">
                            <div class="posted-date">
                                <span class="month">{{$trainings['year'][0]}}</span>
                            </div><!-- /posted-date -->

                            <div class="timeline-panel wow fadeInUp">
                                <div class="timeline-content">
                                    <div class="timeline-heading">
                                        <h3>{{$trainings['title'][0]}}</h3>
                                        <span>{{$trainings['description'][0]}}</span>
                                    </div><!-- /timeline-heading -->

                                    <div class="timeline-body">
                                        <p></p>
                                    </div><!-- /timeline-body -->
                                </div> <!-- /timeline-content -->
                            </div> <!-- /timeline-panel -->
                        </li>
                        <? endif;?>
                        <? if(!empty($trainings['title'][1])):?>
                            <li>
                            <div class="posted-date">
                                <span class="month">{{$trainings['year'][1]}}</span>
                            </div><!-- /posted-date -->

                            <div class="timeline-panel wow fadeInUp">
                                <div class="timeline-content">
                                    <div class="timeline-heading">
                                        <h3>{{$trainings['title'][1]}}</h3>
                                        <span>{{$trainings['description'][1]}}</span>
                                    </div><!-- /timeline-heading -->

                                    <div class="timeline-body">
                                        <p></p>
                                    </div><!-- /timeline-body -->
                                </div> <!-- /timeline-content -->
                            </div> <!-- /timeline-panel -->
                        </li>
                        <? endif;?>
                        <? if(!empty($trainings['title'][2])):?>
                            <li class="timeline-inverted">
                            <div class="posted-date">
                                <span class="month">{{$trainings['year'][2]}}</span>
                            </div><!-- /posted-date -->

                            <div class="timeline-panel wow fadeInUp">
                                <div class="timeline-content">
                                    <div class="timeline-heading">
                                        <h3>{{$trainings['title'][2]}}</h3>
                                        <span>{{$trainings['description'][2]}}</span>
                                    </div><!-- /timeline-heading -->

                                    <div class="timeline-body">
                                        <p></p>
                                    </div><!-- /timeline-body -->
                                </div> <!-- /timeline-content -->
                            </div> <!-- /timeline-panel -->
                        </li>
                        <? endif;?>
                        <? if(!empty($trainings['title'][3])):?>
                            <li>
                            <div class="posted-date">
                                <span class="month">{{$trainings['year'][3]}}</span>
                            </div><!-- /posted-date -->

                            <div class="timeline-panel wow fadeInUp">
                                <div class="timeline-content">
                                    <div class="timeline-heading">
                                        <h3>{{$trainings['title'][3]}}</h3>
                                        <span>{{$trainings['description'][3]}}</span>
                                    </div><!-- /timeline-heading -->

                                    <div class="timeline-body">
                                        <p></p>
                                    </div><!-- /timeline-body -->
                                </div> <!-- /timeline-content -->
                            </div> <!-- /timeline-panel -->
                        </li>
                        <? endif;?>
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
            <div class="col-md-12">
                <? $counter = count($primarySkills);
                    if($counter > 6 ){
                        $counter = 6 ;
                    }
                ?>
                <? if($counter > 1):?>
                    <? for($i=0; $i<$counter;$i++): ?>
                        <div class="skill-progress col-md-6">
                        <div class="skill-title"><h3>{{$primarySkills[$i]}}</h3></div>
                        <div class="progress">
                            <div class="progress-bar six-sec-ease-in-out" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" ><span>100%</span>
                            </div>
                        </div><!-- /.progress -->
                    </div><!-- /.skill-progress -->
                    <? endfor;?>
                <? endif;?>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

        <div class="skill-chart text-center">
            <h3>More skills</h3>
        </div>

        <div class="row more-skill text-center">
            <?
                $counter = count($charSkills);
                if($counter > 6 ){
                    $counter = 6 ;
                }
            ?>
            <? if($counter > 1):?>
                <? for($i=0; $i<6;$i++): ?>
                    <div class="col-xs-12 col-sm-4 col-md-2">
                    <div class="chart" data-percent="100" data-color="e74c3c">
                        <span class="percent"></span>
                        <div class="chart-text">
                            <span>{{substr($charSkills[$i], 0, strpos($charSkills[$i], ":"))}}</span>
                        </div>
                    </div>
                </div>
                <?endfor;?>
            <? endif;?>
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
            <? $works = explode(',',$user->works);?>
            <div id="grid">
                @foreach($works as $workSrc):
                    <div class="portfolio-item col-xs-12 col-sm-4 col-md-3" data-groups='["all", "identety", "interface"]'>
                    <div class="portfolio-bg">
                        <div class="portfolio">
                            <div class="tt-overlay"></div>
                            <div class="links">
                                <a class="image-link" href="{{$workSrc}}"><i class="fa fa-search-plus"></i></a>
                                <a href="#"><i class="fa fa-link"></i></a>
                            </div><!-- /.links -->
                            <img src="{{$workSrc}}" alt="image" width="170" height="170">
                            <div class="portfolio-info">
                                <h3>Portfolio Title</h3>
                            </div><!-- /.portfolio-info -->
                        </div><!-- /.portfolio -->
                    </div><!-- /.portfolio-bg -->
                </div><!-- /.portfolio-item -->
                @endforeach
            </div><!-- /#grid -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- End Works Section -->

<!-- Hire Section -->
<section class="hire-section text-center" data-stellar-vertical-offset="50" data-stellar-background-ratio="0.2">
    <div class="hire-section-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>I'm available for freelance project</h2>
                    <div>
                        {{--<iframe src="https://calendar.google.com/calendar/embed?src=gd1nhjvups52h5poa17oejfqo0%40group.calendar.google.com&ctz=Europe%2FKiev" style="border-radius: 5px; border: 5px solid lightgray;" width="70%" height="250" frameborder="0" scrolling="no"></iframe>--}}
                    </div>
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