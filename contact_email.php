<!-- Comment header
File name : contact email page
Author's Name : Niket Bajaj
Web site name : NB Blogging
After filling the form on contact page i got the email of the form-->
<?php 

	$name= $_REQUEST["name"];
    $city= $_REQUEST["city"];
	$email_id= $_REQUEST["email_id"];
	$phone= $_REQUEST["phone"];
	$comment= $_REQUEST["comment"];
	
   
$str = "<p><strong>Hello,";
$str .= "</strong>
	<br />Receive from Blogging Website.</p>
	<br />
	
		 	Name: ".$name."<br />
			City: ".$city."<br />
			Email Id: ".$email_id."<br />
			Daytime Phone: ".$phone."<br />
			Comments: ".$comment."<br />
			
		<br><br><br>
	<p>With Regards,<br>NB Blogging website</p>";

$message = $str;
$to  ='200247801@student.georgianc.on.ca';

$subject = 'Receive from Blogging Website';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From:NB Blogging Website<'.$email_id.'>' . "\r\n";
mail($to, $subject, $message, $headers);
header("location:thank_you.php");
?>