<!DOCTYPE html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
    	<!-- Comment header
        File name : Contact page
        Author's Name : Niket Bajaj
        Web site name : NB Blogging
        Any one can contact me from this page -->
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
        <script language="javascript" type="text/javascript">
        	function contact_validation(){
				var med = document.contact;
				if(med.name.value==''){
				alert("Please Enter Your Name");
				med.name.focus();
				return false;
        	}
        	if(med.email_id.value==''){
				alert("Please Enter Email");
				med.email_id.focus();
				return false;
        	}
        	return true;
        	} 
        </script>
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
                        <li class="active"><a href="contact.php">Contact</a></li>
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
        
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
        <!-- Example row of columns -->
            	<form action="contact_email.php" id="" method="post" name="contact" enctype="multipart/form-data" onSubmit="return contact_validation();">	
            	<div class="form">
                	<legend>Contact Us</legend>
                    <h4>Email on: <u><a href="mailto:niketbajaj08@gmail.com">niketbajaj08@gmail.com</a></u><br />
	                Contact on : <u><a href="tel:7055002787">(705) 500-2787 </a></u></h4>
                    <label for="name">Name *:</label>
                    <input name="name" type="text" id="name" placeholder="Name" class="form-control" />
                    
                    <label for="city">City :</label>
                    <input name="city" type="text" id="city" placeholder="City" class="form-control"/>
                    
                    <label for="email_id">Email Id *:</label>
                    <input name="email_id" type="text" id="email_id" placeholder="Email Address" class="form-control" />
                   
                    <label for="phone">Contact # :</label>
                    <input name="phone" type="text" id="phone" placeholder="Contact #" class="form-control" />
                    
                    <label for="comment">Comments :</label>
                    <textarea name="comment" type="text" id="comment" rows="4" cols="30" placeholder="Comments" class="form-control"/></textarea>
                    
                    <button type="submit" class="btn btn-success" name="submit" >Submit</button>
                </div>
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
