<!-- Comment header
File name : Session
Author's Name : Niket Bajaj
Web site name : NB Blogging
Putting seesion so user can access login page after some time also -->
<?php
	session_start();
  		// If the session aren't set, try to set them with a cookie
  		if (!isset($_SESSION['user_id'])) 
		{
    		if (isset($_COOKIE['user_id'])) 
			{
      			$_SESSION['user_id'] = $_COOKIE['user_id'];
			}
  		}
?>