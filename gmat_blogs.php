
<!DOCTYPE html>
<html lang="en">
  <head>
  <!-- Comment header
        File name : GMAT page
        Author's Name : Niket Bajaj
        Web site name : NB Blogging
        One of the category of blogs  -->
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
            </div><!--end of navbar-header--->
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="signup.php">Sign up</a></li>
                    <li class="active"><a href="blogs.php">Blogs</a></li>
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
    <br /><br /><br />
    <div class="container">
        <div class="row row-offcanvas row-offcanvas-right">
        	<div class="col-xs-12 col-sm-9">
                <p class="pull-right visible-xs">
                	<button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
                </p>
                <?php
					require_once('session.php'); //calling session function/page
					require_once('connect.php'); //calling connection function/page
					$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);  // query to connect to the database
					$query = "SELECT * FROM blog_blogs WHERE category = 'gmat' ORDER BY blogs_time DESC;"; // Retrieve the data from the table blog_blogs.
					$data = mysqli_query($dbc, $query);
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
					while ($row = mysqli_fetch_array($data)) // While loop to take all data from database and display that in blog page 
					{
						echo '<table>';
						echo '<div class="data1">';
						echo "<a href=\"http://webdesign4.georgianc.on.ca/~200247801/NBblogging/view_blogs.php?view=".$row['blogs_id']."\">" . $row['title'] . '</a>'. '<br />';
						echo '' . $row['blogs_time'] . '&nbsp;&nbsp;By&nbsp;&nbsp;' . $row['user_name'] .'<br />';
						echo '<br />';
						$editor1 = $row['editor1'];
						if (strlen($editor1) > 200) 
						{
							// cut the blog
							$blogCut= substr($editor1, 0, 200);
							//ends with a whole word
							$editor1= substr($blogCut, 0, strrpos($blogCut, ' ')).'...'; 
						}
						echo $editor1. '</br>'; 
						echo '<br />'.'<br />';
						echo 'View:&nbsp;&nbsp;&nbsp;&nbsp;';
						echo 'Comments:&nbsp;&nbsp;&nbsp;&nbsp;';
						?>
						<hr>
						<?php
						echo '</div>';
						echo '</table>';
					}
					mysqli_close($dbc);
                ?>
        	</div><!--/col-xs-12 col-sm-9-->
            <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
                <div class="list-group">
                    <a href="f1_blogs.php" class="list-group-item">F1 Visa</a>
                    <a href="gre_blogs.php" class="list-group-item">GRE</a>
                    <a href="gmat_blogs.php" class="list-group-item active">GMAT</a>
                    <a href="toefl_blogs.php" class="list-group-item">TOEFL</a>
                    <a href="ielts_blogs.php" class="list-group-item">IELTS</a>
                </div>
            </div><!--/col-xs-6 col-sm-3 sidebar-offcanvas-->
		</div><!--/row row-offcanvas row-offcanvas-right-->
	</div><!--/.container-->
    <div class="container">
        <hr>
        <footer>
          <p>&copy; Niket Bajaj Blogging Website 2013</p>
        </footer>
    </div><!-- /container --> 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/offcanvas.js"></script>
	</body>
</html>
