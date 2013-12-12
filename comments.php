<!DOCTYPE html>
<html lang="en">
    <head>
    <!-- Comment header
        File name : Comment page
        Author's Name : Niket Bajaj
        Web site name : NB Blogging
        All blogs having comment section but only user who login can comment any blog  -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <title>NB Blogging Website</title>
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
        
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Custom styles for this template -->
        <link href="css/offcanvas.css" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
	<body>
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
                            <li><a href="index.php">Home</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="signup.php">Sign up</a></li>
                            <li><a href="blogs.php">Blogs</a></li>
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
            <div class="jumbotron">
            	<div class="container">
                
		<?php
			session_start(); //calling session function/page
			require_once('connect.php'); //calling connection function/page
			$dbc2 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);  // query1 to connect to the database
			$query2 = "SELECT * FROM blog_comments"; // Retrieve the data from the table blog_comments.
			$data2 = mysqli_query($dbc2, $query2);
			$user_name= $_REQUEST["user_name"];
			$comment= $_REQUEST["comment"];
			$query1= $_REQUEST["query1"];
			
			if (!isset($_SESSION['user_id'])) //checking if user is login or not if not he/she can't access this page.
			{
				header("location:http://webdesign4.georgianc.on.ca/~200247801/NBblogging/signup.php");
				exit();
			}
			if (!empty($comment) && !empty($user_name))
			{
				$query3 = "INSERT INTO blog_comments (user_name, blogs_id, comment) VALUES ('$user_name', '$query1', '$comment')";
				mysqli_query($dbc2, $query3);
				mysqli_close($dbc2);
				header("location:http://webdesign4.georgianc.on.ca/~200247801/NBblogging/view_blogs.php?view=$query1");
				exit();
			}
			else 
			{
				echo '<script language="javascript">';
				echo 'alert ("Sorry, Please enter all information")';
				echo '</script>';
				header("location:http://webdesign4.georgianc.on.ca/~200247801/NBblogging/view_blogs.php?view=$query1");
				exit();
			}
        ?>
        </div> <!-- /container -->  
			</div><!--end of jumbotron--->
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/offcanvas.js"></script>
	</body>
</html>
