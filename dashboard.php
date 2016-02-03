<?PHP include "app/message/messagemanager.php"; ?>
<!DOCTYPE html>
<!-- saved from url=(0039)http://getbootstrap.com/examples/cover/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Index</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
	<style type="text/css">:root .carbonad,
:root #content > #right > .dose > .dosesingle,
:root #content > #center > .dose > .dosesingle,
:root #carbonads-container
{display:none !important;}</style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Cover</h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li class="active"><a href="#">Home</a></li>
                  <li><a data-toggle="modal" data-target="#myModal1" href="#">Register</a></li>
                  <li><a  data-toggle="modal" data-target="#myModal2" href="#">Login</a></li>
                </ul>
              </nav>
			  <?PHP printmessages(); ?>
            </div>
          </div>

          <div class="inner cover">		  


            <h1 class="cover-heading">Cover your page.</h1>
			
            <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
            <p class="lead">
              <a href="#" class="btn btn-lg btn-default">Learn more</a>
            </p>
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p>Cover template for <a href="http://getbootstrap.com/">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
            </div>
          </div>

        </div>

      </div>

    </div>
	
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
				<input type="text" class="form-control" name="pass" placeholder="Password">
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control" name="confirmpass" placeholder="Confirm Password">
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
				<input type="text" class="form-control" name="password" placeholder="Password">
			  </div>			
		  </div>
		  <div class="modal-footer">
			<button type="submit" class="btn btn-primary">Login</button>
		  </div>
		</form> 
    </div>
  </div>
</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  

</body></html>