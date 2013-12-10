<!DOCTYPE html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
    	<!-- Comment header
        File name : view Blog page
        Author's Name : Niket Bajaj
        Web site name : NB Blogging
        Any one can see the full blog on this page -->
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
                    <li class="active"><a href="blogs.php">Blogs</a></li>
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
                    $query1 = $_GET['view'];
                    $query = "SELECT * FROM blog_blogs WHERE blogs_id = $query1;"; // Retrieve the data from the table blog_blogs.
                    $data = mysqli_query($dbc, $query);
                    if (isset($_SESSION['user_id']))
                    {
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
                        echo '<div class="view_data">';
                        echo '<u>' . $row['title'] . '</u>'. '<br />';
                        echo '' . $row['blogs_time'] . '&nbsp;&nbsp;By&nbsp;&nbsp;' . $row['user_name'] .'<br />';
                        echo '<br />';
                        echo '' . $row['editor1'] . '<br />';
                        //if(isset($_SESSION['user_id']))
                        //{
                        //	$_SESSION['user_id'] = $_SESSION['user_id']+ 1;
                        //}
                        //else
                        //{
                        //	$_SESSION['user_id'] = 1;
                        //}
                        //echo "Comments :  ". $_SESSION['user_id'];
                        echo '<br />'.'<br />';
                        echo 'Comments :&nbsp;&nbsp;&nbsp;&nbsp;';
                        echo 'View :&nbsp;&nbsp;&nbsp;&nbsp;';
                        echo '<br />';
                        ?>
                        <hr>
                        <?php
                        echo '</div>';
                        echo '</table>';
                    }
                    mysqli_close($dbc);
                    $dbc1 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);  // query to connect to the database
                    $query2 = "SELECT * FROM blog_comments WHERE blogs_id = $query1 ORDER BY comment_time DESC;";
                    $data1 = mysqli_query($dbc1, $query2);
                    //$count = 0;
                    //echo 'Comments :&nbsp;&nbsp;&nbsp;&nbsp;' . $counter;
                    //echo 'View :&nbsp;&nbsp;&nbsp;&nbsp;';
                    while ($row1 = mysqli_fetch_array($data1)) // While loop to take all data from database and display that in blog page 
                    {
                        echo '<table>';
                        echo '<div class="data1">';
                        echo '' . $row1['comment'] . '<br />';
                        echo '' . $row1['comment_time'] . '&nbsp;&nbsp;By&nbsp;&nbsp;' . $row1['user_name'] .'<br />';
                        echo '<br />';
                        ?>
                        <hr>
                        <?php
                        echo '</div>';
                        echo '</table>';
                        //$counter = ++$count;
                    }
                        //$counter1 = $counter;
                    mysqli_close($dbc1);
                ?>
            </div><!--/col-xs-12 col-sm-9-->
            <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
                <div class="list-group">
                    <a href="f1_blogs.php" class="list-group-item">F1 Visa</a>
                    <a href="gre_blogs.php" class="list-group-item">GRE</a>
                    <a href="gmat_blogs.php" class="list-group-item">GMAT</a>
                    <a href="toefl_blogs.php" class="list-group-item">TOEFL</a>
                    <a href="ielts_blogs.php" class="list-group-item">IELTS</a>
                </div>
            </div><!--/col-xs-6 col-sm-3 sidebar-offcanvas-->
        </div><!--/row row-offcanvas row-offcanvas-right-->
    </div><!--/.container-->
    <div class="container">
        <form method="post" action="comments.php" enctype="multipart/form-data">
            <br/>
            <label for="user_name">Profile Name (provide proper profile name)</label>
            <input type="text" name="user_name" id="user_name" class="form-control">
            <br/>
            <label for="comment">Comment</label>
            <textarea name="comment" id="comment" rows="4" cols="30" class="form-control"></textarea>
            <br/>
            <input type="hidden" name="query1" value="<?php echo $_GET['view']; ?>" >
            <button type="submit" class="btn btn-success" name="submit" >Post</button>
        </form>
        
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
