<?PHP include "app/inc.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>You've Been Schooled</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">You've Been Schooled</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#download">Download</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Features</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#screenshots">Screenshots</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                    <li>
                        <a data-toggle="modal" data-target="#myModal1" href="#">Register</a>
                    </li>
                    <li>
                        <a data-toggle="modal" data-target="#myModal2" href="#">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="header-content">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4 text-center">
                    <?PHP printmessages(); ?>
                </div>
            </div>
            <div class="header-content-inner">
                <h1>You've Been Schooled</h1>
                <hr>
                <p>You've Been School brings educational games to the classroom. Students can play each of the three games to test their knowledge in Maths, Spelling and their memory skills!. While they are busy engaging in these educational games their teachers can monitor each students results via our You've Been Schooled Website.</p>
                <a href="#download" class="btn btn-primary btn-xl page-scroll">Download Now</a>
            </div>
        </div>
    </header>

    <section class="bg-primary" id="download">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">We've got what you need!</h2>
                    <hr class="light">
                    <p class="text-faded">Try our demo now, or go straight to downloading our app from your appstore.</p>
                    <a href="demo/index.html" class="btn btn-default btn-xl" style="font-size:20px">Demo</a>&nbsp;&nbsp;<a href="#" class="btn btn-default btn-xl" style="font-size:20px"><i class="fa fa-android wow bounceIn"></i>&nbsp;&nbsp;Download</a>&nbsp;&nbsp;<a href="#" class="btn btn-default btn-xl" style="font-size:20px"><i class="fa fa-apple wow bounceIn"></i>&nbsp;&nbsp;Download</a>
                </div>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">FEATURES</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-calculator wow bounceIn text-primary"></i>
                        <h3>Maths Game</h3>
                        <p class="text-muted">Our interactive maths game is challenging and fun for students to learn.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-pencil wow bounceIn text-primary" data-wow-delay=".1s"></i>
                        <h3>Spelling Game</h3>
                        <p class="text-muted">With the help of images and sound our spelling game fully engages students in the learning experience.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-puzzle-piece wow bounceIn text-primary" data-wow-delay=".2s"></i>
                        <h3>Memory</h3>
                        <p class="text-muted">Our last game test students memory skills with a find the matching pair game.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-pie-chart wow bounceIn text-primary" data-wow-delay=".3s"></i>
                        <h3>Admin Section</h3>
                        <p class="text-muted">Teachers can use the admin section to easily view student results and analyse a students progress.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="no-padding" id="screenshots">
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="img/portfolio/1.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="img/portfolio/2.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="img/portfolio/3.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="img/portfolio/4.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="img/portfolio/5.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="img/portfolio/6.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Get In Touch!</h2>
                    <hr class="primary">
                    <p>Got any questions? Feel free to send us and email and we will get back to you as soon as we can.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4 text-center">
                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="mailto:20046687@mail.wit.ie">20046687@mail.wit.ie</a></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form id="register" action="process_register.php" method="post">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Register</h4>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                    <input type="text" class="form-control" name="firstname" placeholder="First Name">
                  </div>          
                  <div class="form-group">
                    <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="school" placeholder="School">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" name="pass" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" name="confirmpass" placeholder="Confirm Password">
                  </div>              
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Register</button>
              </div>
            </form>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
             <form id="login" action="process_login.php" method="post">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Login</h4>
              </div>
              <div class="modal-body">          
                  <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                  </div>            
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
            </form> 
        </div>
      </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script>
    $( document ).ready(function() {
        window.setTimeout(function() {
            $(".alert-success").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 2000);
    });
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>

</body>

</html>
