<!DOCTYPE html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
    	<!-- Comment header
        File name : Your Profile page
        Author's Name : Niket Bajaj
        Web site name : NB Blogging
        On this page user can see there profile details -->
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
    	<div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">NB Blog</a>
                    <p class="pull-right visible-xs">
                    <a class="navbar-brand" href="blogs.php">Back</a>
                    </p>
                </div><!--end of navbar-header--->
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
                require_once('session.php'); //calling session function/page
                require_once('connect.php'); //calling connection function/page
                $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);  // query to connect to the database
                $query = "SELECT * FROM blog_login"; // Retrieve the data from the table blog_login.
                $data = mysqli_query($dbc, $query);
                $delete = $_GET['delete'];
                $edit = $_GET['edit'];
                if (!isset($_SESSION['user_id'])) //checking if user is login or not if not he/she can't access this page.
                {
                    echo 'Please <a href="index.php">log in</a> to access this page.';
                    exit();
                }
				if (isset($_SESSION['user_id']))
				{
					echo '<button type="submit" class="btn btn-success" name="submit" onclick="window.location.href=\'http://webdesign4.georgianc.on.ca/~200247801/NBblogging/c_blogs.php\'" >Create Blogs</button>';
					echo '&nbsp;&nbsp;&nbsp;';
					echo '<button type="submit" class="btn btn-success" name="submit" onclick="window.location.href=\'http://webdesign4.georgianc.on.ca/~200247801/NBblogging/yourprofile.php\'" >View Profile</button>';
					echo '&nbsp;&nbsp;&nbsp;';
					echo '<button type="submit" class="btn btn-success" name="submit" onclick="window.location.href=\'http://webdesign4.georgianc.on.ca/~200247801/NBblogging/editprofile.php\'">Edit Profile</button>';
					echo '&nbsp;&nbsp;&nbsp;';
					echo '<button type="submit" class="btn btn-success" name="submit" onclick="window.location.href=\'http://webdesign4.georgianc.on.ca/~200247801/NBblogging/logout.php\'">Logout</button>';
					echo '<hr>';
				}
                if (!isset($_GET['user_id'])) 
                {
                    $query = "SELECT user_id, user_name, email_id FROM blog_login WHERE user_id = '" . $_SESSION['user_id'] . "'";
                }
                else 
                {
                    $query = "SELECT user_id, user_name, email_id FROM blog_login WHERE user_id = '" . $_GET['user_id'] . "'";
                }
                $data = mysqli_query($dbc, $query);
                if (mysqli_num_rows($data) == 1)     // IF loop to take all data from database and display
                {
                    $row = mysqli_fetch_array($data);
                    echo '<table>';
                        echo '<tr><td class="data1">';
                        echo '<strong>User Name:</strong> ' . $row['user_name'] . '<br />';
                        echo '<strong>Email ID:</strong> ' . $row['email_id'] . '<br />';
						echo "<a href=\"http://webdesign4.georgianc.on.ca/~200247801/NBblogging/yourblogs.php?view=".$row['user_name']."\" >" . 'View My Blogs' . '</a>'. '<br />';
						echo "<a href= \"".$_SERVER['PHP_SELF']."?delete=".$row['user_id']."\">Delete My Profile</a>"." ". '<br />';
                    echo '</table>';
                }
                if(!empty($delete))
                {
                    echo '<script language="javascript">';
                    echo 'alert ("Are you sure to delete your account ?")';
                    echo '</script>';
                    $deletequery = "delete from blog_login where user_id = $delete"; // query to delete the data
                    mysqli_query($dbc,$deletequery);
                }
                mysqli_close($dbc);
            ?>
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
