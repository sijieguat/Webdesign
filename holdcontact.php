<?php
include("dbase.php");// database connection details stored here


$name=$_POST['name'];
$contact=$_POST['phone'];
$email=$_POST['email'];
$feedback=$_POST['feedback'];

$query=mysql_query("insert into feedback(name,contact,email,feedback)
 values('$name','$contact','$email','$feedback')");


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    	<title>Thank You</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
<script >
function myFunction()
{
alert("Thank you. Your feedback have been recorded!");
};
</script >
</head>
<body>
<div class="container">
<img src="xres/images/logo.jpg"alt=""style="width:800px;height:180px">
 
<nav>
<a href="index.php">Home</a> | <a href="about.php">About us</a> | <a href="catalogue.php">Accommodations</a> | <a href="reserve.php">Reservations</a> | <a href="contact.php">Contact</a>
</nav>
   <div id="content_container">

<form class="smart-green">

<h1>Thank You For Your Feedback
     
    </h1>
<label><b>Name:</b></label>
<br>
<label><?php echo  $_POST["name"];?></label>
<br>

<label><b>Phone Number:</b></label>
<br>
<label><?php echo  $_POST["phone"];?></label>
<br>


<label><b>E-mail:</b></label>
<br>
<label><?php echo  $_POST["email"];?></label>

<br>


</form>
</div>
 </div>
    

         <footer>
         	Copyright © 2015 Divino Hotel
         </footer>
	</div>

</body>
</html>