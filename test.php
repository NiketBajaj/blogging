<!DOCTYPE html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
    <!-- Comment header
        File name : Signup page
        Author's Name : Niket Bajaj
        Web site name : NB Blogging
        Any one can sign up from this page to start blogging on website  -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>NB Blogging Website</title>
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
        body {
        padding-top: 50px;
        padding-bottom: 20px;
        }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
		<?php
			session_start(); //calling session function/page
			require_once('connect.php'); //calling connection function/page
			$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);  // query to connect to the database
			if (isset($_POST['submit'])) 
			{
				$image = addslashes(file_get_contents($_FILE['image']['tmp_name'])); //SQL Injection defence!
				$sql = "INSERT INTO test_image (image) VALUES ('{$image}')";
				if (!mysql_query($sql)) { // Error handling
    				echo "Something went wrong! :("; 
				}
			}
        ?>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">NB Blog</a>
                </div><!--end of navbar-header--->
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li class="active"><a href="signup.php">Sign up</a></li>
                        <li><a href="blogs.php">Blogs</a></li>
                        <li><a href="c_blogs.php">Create Blogs</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="privacy.php">Privacy</a></li>
                                <li><a href="terms.php">Terms</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!--/.navbar-collapse -->
            </div><!--end of container--->
        </div><!--end of navbar navbar-inverse navbar-fixed-top--->
        
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
        <!-- Example row of columns -->
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form">
                    <legend>Registration</legend>
                    <label>File: </label><input type="file" name="image" />
    				<input type="submit" />
                    <br />
                </div>
                <!--End of form div--->
            </form>
            <!--End of form--->
            </div> <!-- /container -->  
      	</div><!--end of jumbotron--->
        <div class="container">
        	<hr>
            <footer>
                <p>&copy; Niket Bajaj Blogging Website 2013</p>
            </footer>
        </div><!-- /container -->  
              
		<script src="js/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script>
			var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src='//www.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
