<!-- Comment header
File name : logout page
Author's Name : Niket Bajaj
Web site name : NB Blogging
This page is having logout section and setting cookie in negative -->
<?php
	session_start();
	if (isset($_SESSION['user_id'])) 
	{
		$_SESSION = array();
		if (isset($_COOKIE[session_name()])) 
		{
			setcookie(session_name(), '', time() - 3600);  //setting cookie in negative value
		}
		session_destroy();
	}
	setcookie('user_id', '', time() - 3600);  //setting cookie in negative value
	$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
	header('Location: ' . $home_url);
?>