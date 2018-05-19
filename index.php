<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>
<body>



<div class="container">
<header>
<img src="xres/images/logo.jpg"alt=""style="width:800px;height:180px">
</header>


<section>
	<h1>WELCOME TO LCT Bus Terminal System</h1>
<nav>
<a href="index.php">Home</a> |
<a href="about.php">About us</a> |
 <a href="catalogue.php">Accommodations</a>  |
 <a href="reserve.php">Reservations</a> |
 <a href="contact.php">Contact</a> |
 <a href="admin">Admin</a>
 
</nav>
<html lang="en">
<head>
<title>LCT Bus Terminal System</title>

<style>
body {font-family:Arial, Helvetica, sans-serif; font-size:12px;}

.fadein { 
position:relative; height:332px; width:500px; margin:0 auto;
background: url("slideshow-bg.png") repeat-x scroll left top transparent;
padding: 10px;
 }
.fadein img { position:absolute; left:10px; top:10px; }
</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>
$(function(){
	$('.fadein img:gt(0)').hide();
	setInterval(function(){$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');}, 3000);
});
</script>

</head>
<body>
<div class="fadein">
                     <img src="xres/images/newport beach/2.jpg" width="600" height="300"  alt="" />
					 <img src="xres/images/g.jpg" width="600" height="300"  alt="" />
					 <img src="xres/images/h.jpg" width="600" height="300"  alt="" />
                    <img src="xres/images/1.jpg" width="600" height="300"  alt="" />
                    <img src="xres/images/2.jpg" width="600" height="300"  alt="" />
					<img src="xres/images/3.jpg" width="600" height="300"  alt="" />
                    <img src="xres/images/4.jpg" width="600" height="300"  alt="" />
                    <img src="xres/images/5.jpg" width="600" height="300"  alt="" />
                    <img src="xres/images/6.jpg" width="600" height="300"  alt="" />
                    <img src="xres/images/7.jpg" width="600" height="300"  alt="" />
                    <img src="xres/images/8.jpg" width="600" height="300"  alt="" />
                    <img src="xres/images/9.jpg" width="600" height="300"  alt="" />
                    <img src="xres/images/10.jpg" width="600" height="300"  alt="" />
                    <img src="xres/images/11.jpg" width="600" height="300"  alt="" />
                    <img src="xres/images/12.jpg" width="600" height="300"  alt="" />
                    <img src="xres/images/13.jpg" width="600" height="300"  alt="" />
					
</div>
</body>
</html>





 <div id="content">
    	<div id="rotator">
 
			 


<p>We provide buses with comfortable seats to our customers.</p>
<p>We invite you to enjoy your trip safely by select our bus service. Hope you all enjoy the trips ~!</p>	
  

<div><img src="images/news.gif" alt="" title="" width="100" height="50"/></div>
</section>
	
         <?php
			   include('config.php');
								
								

								
								$result3 = mysql_query("SELECT * FROM news");
								
								
								while($row3 = mysql_fetch_array($result3))
								  {
								 echo '<tr>';
								
									echo '<td>'.$row3['contents'].'</td>';
										
								 echo '</tr>';
							
								  }
			  
			  ?>
         
       	   </div>
                     
<footer>
     Copyright © 2015 Divino Hotel
</footer>

</body>
</html>
