<!DOCTYPE html>
<html>
    <head>
    <!-- Comment header
        File name : Create Blogs page
        Author's Name : Niket Bajaj
        Web site name : NB Blogging
        After user login he/she can create blogs here  -->
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
        <script src="ckeditor/ckeditor.js"></script>
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
                            <li class="active"><a href="c_blogs.php">Create Blogs</a></li>
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
					$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);  // query to connect to the database
					$query = "SELECT * FROM blog_blogs"; // Retrieve the data from the table blog_blogs.
					$data = mysqli_query($dbc, $query);
					if (!isset($_SESSION['user_id'])) //checking if user is login or not if not he/she can't access this page.
					{
						echo 'Please <a href="index.php">log in</a> to access this page.';
						exit();
					}
					if (isset($_SESSION['user_id']))
					{
						echo '<button type="submit" class="btn btn-success" name="submit" onclick="window.location.href=\'http://webdesign4.georgianc.on.ca/~200247801/NBblogging/yourprofile.php\'" >View Profile</button>';
						echo '&nbsp;&nbsp;&nbsp;';
						echo '<button type="submit" class="btn btn-success" name="submit" onclick="window.location.href=\'http://webdesign4.georgianc.on.ca/~200247801/NBblogging/editprofile.php\'">Edit Profile</button>';
						echo '&nbsp;&nbsp;&nbsp;';
						echo '<button type="submit" class="btn btn-success" name="submit" onclick="window.location.href=\'http://webdesign4.georgianc.on.ca/~200247801/NBblogging/logout.php\'">Logout</button>';
					}
					if (isset($_POST['submit'])) 
					{
						$user_name = mysqli_real_escape_string($dbc, trim($_POST['user_name']));
						$title = mysqli_real_escape_string($dbc, trim($_POST['title']));
						$editor1 = mysqli_real_escape_string($dbc, trim($_POST['editor1']));
						$category = mysqli_real_escape_string($dbc, trim($_POST['category']));
						if (!empty($title) && !empty($editor1) && !empty($category)) 
						{
							$query = "INSERT INTO blog_blogs (user_name, title, editor1, category) VALUES ('$user_name', '$title', '$editor1', '$category')";
							mysqli_query($dbc, $query);
							$blogs_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/blogs.php';
							header('Location: ' . $blogs_url);
							mysqli_query($dbc, $query1);
							mysqli_close($dbc);
							exit();
						}
						else
						{
							echo '<script language="javascript">';
							echo 'alert ("Sorry, Please enter all information")';
							echo '</script>';
						}
					}
                ?>
                </div> <!-- /container -->  
			</div><!--end of jumbotron--->
            <div class="container">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <br/>
                    <label for="user_name">Profile Name (provide proper profile name)</label>
                    <input type="text" class="form-control" name="user_name" id="user_name" value="<?php if (!empty($user_name)) echo $user_name; ?>"/>
                    <br/>
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="<?php if (!empty($title)) echo $title; ?>"/>
                    <br/>
                    <label for="editor1">Body</label>
                    <textarea name="editor1" type="text" id="editor1" rows="4" cols="30" class="form-control" value="<?php if (!empty($editor1)) echo $editor1; ?>"/></textarea>
                    <br/>
                    <label for="category">Select your Category (Select topics to help people find your post!)</label><br/>
                    <input type="radio" id="category" name="category" value="f1visa" />&nbsp;&nbsp;F1 Visa<br/>
                    <input type="radio" id="category" name="category" value="gre"/>&nbsp;&nbsp;GRE<br/>
                    <input type="radio" id="category" name="category" value="gmat"/>&nbsp;&nbsp;GMAT<br/>
                    <input type="radio" id="category" name="category" value="toefl"/>&nbsp;&nbsp;TOEFL<br/>
                    <input type="radio" id="category" name="category" value="ielts"/>&nbsp;&nbsp;IELTS<br/>
                    <br/><br/>
                    <button type="submit" class="btn btn-success" name="submit" >Create Post</button>
                </form>
				<script>
                    CKEDITOR.replace( 'editor1' );
                </script>
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