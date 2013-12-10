<!DOCTYPE html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
    	<!-- Comment header
        File name : Home page
        Author's Name : Niket Bajaj
        Web site name : NB Blogging
        Any one can view this page and get info. for this website -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>NB Blogging Website</title>
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
        body {
        padding-top: 20px;
        padding-bottom: 20px;
        }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
		<?php
			require_once('session.php'); //calling session function/page
			require_once('connect.php'); //calling connection function/page
			$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);  // query to connect to the database
			$query = "SELECT * FROM blog_login"; // Retrieve the data from the table blog_login.
			$data = mysqli_query($dbc, $query);
			if (!isset($_SESSION['user_id'])) 
			{
				if (isset($_POST['submit'])) 
				{
				$email_id = mysqli_real_escape_string($dbc, trim($_POST['email_id']));
				$password = mysqli_real_escape_string($dbc, trim($_POST['password']));
					if (!empty($email_id) && !empty($password)) 
					{
						if (preg_match ("/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/", $email_id)) 
						{
						$query = "SELECT user_id FROM blog_login WHERE email_id = '$email_id' AND password = SHA('$password')"; //checking user name and password in database
						$data = mysqli_query($dbc, $query);
							if (mysqli_num_rows($data) == 1) 
							{
							  $row = mysqli_fetch_array($data);
							  $_SESSION['user_id'] = $row['user_id'];
							  setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 30));
							  $blogs_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/blogs.php';
							  header('Location: ' . $blogs_url);
							}
							else 
							{
							  echo '<script language="javascript">';
							  echo 'alert ("Sorry, you must enter a valid email address and password to log in.")';
							  echo '</script>';
							}
						}
						else 
						{
						  echo '<script language="javascript">';
						  echo 'alert ("Sorry, Please enter the valid email address")';
						  echo '</script>';
						}
					}
					else 
					{
						echo '<script language="javascript">';
						echo 'alert ("Sorry, you must enter your email address and password to log in.")';
						echo '</script>';
					}
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
                </div>
                <!--end of navbar-header--->
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="signup.php">Sign up</a></li>
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
                    <form class="navbar-form navbar-right" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    	<div class="form-group">
                        	<input type="text" placeholder="Email" class="form-control" name="email_id" id="email_id" value="<?php if (!empty($email_id)) echo $email_id; ?>">
                        </div>
                        <div class="form-group">
                        	<input name="password" id="password" type="password" placeholder="Password" class="form-control">
                        </div>
                        <?php 
						if (!isset($_SESSION['user_id'])) 
						{ ?>
                        	<button type="submit" class="btn btn-success" name="submit" >Sign in</button>
						<?php
						} 
                        else { ?>
							<a href="logout.php" class="btn btn-success"><input type="hidden" class="btn btn-success" name="logout">Logout</a>
                        <?php
						} ?>
                    </form>
                </div><!--/.navbar-collapse -->
			</div><!--end of container--->
		</div><!--end of navbar navbar-inverse navbar-fixed-top--->
        
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h1><a href="index.php" title="NB Blogging" class="logo">
                <img src="img/logo.jpg" width="250" height="120" alt="NB Blogging"/></a>
                </h1>
                <div class="stat">    
                    <p>Create a free blog on NBblogging.com and get started blogging right away. Share your thoughts, join the conversation and meet like minded people. At NBblogging.com you can follow blogggers and topics that interest you and make new friends with similar interests. We are a supportive community of people where real discussions take place and honest opinions are expressed. Welcome to NBblogging!</p>
                </div><!--end of stat--->
            </div><!--end of container--->
 		</div><!--end of jumbotron--->
        
        <div class="container">
        <!-- Example row of columns -->
            <div class="row">
            	<h2>About Us</h2>
                <div class="col-lg-4">
                    <img src="img/icon1.png" width="70" height="70" alt="Custom NB Blog" class="icon"/><h3>Create a custom blog</h3>
                    <p>Our easy-to-use site lets you instantly create and theme a custom blog that matches your personality and interests. You can create a personal blog, just for your thoughts, or create a group blog and invite others who share your interests to join in.</p>
                </div>
                <div class="col-lg-4">
                    <img src="img/icon2.png" width="70" height="70" alt="Connect NB Blog" class="icon"/><h3>Connect with friends</h3>
                    <p>Let your friends know about your new blog by connecting your posts with Facebook or Twitter or make new friends right here on NBblogging.com. If you see someone who shares your interests, you can send them a friend request and follow their blog. You can even create a private blog where you share posts only with friends.</p>
                </div>
                <div class="col-lg-4">
                    <img src="img/icon3.png" width="50" height="50" alt="Discuss NB Blog" class="icon"/><h3>Discuss interesting topics</h3>
                    <p>We’re more than just a blogging site, we’re a community. By using our Topics listings, you’ll be able to find and connect with like-minded people who share your interests. Break out from the one way blogging offered on other sites and start a conversation at NBblogging.com.</p>
                </div>
            </div><!--end of row--->
            <hr>
            <footer>
            	<p>&copy; Niket Bajaj Blogging Website 2013</p>
            </footer>
        </div> <!-- /container -->        
		
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
