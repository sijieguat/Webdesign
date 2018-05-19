<?php require_once('Connection/localhost.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO reservation ( fname, lname, email, contact, room,dateStart, dateEnd, rsrv_guest, note) VALUES ( %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                        
                       GetSQLValueString($_POST['fname'], "text"),
                       GetSQLValueString($_POST['lname'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['contact'], "text"),
                       GetSQLValueString($_POST['room'], "text"),
               
                       GetSQLValueString($_POST['dateStart'], "date"),
                       GetSQLValueString($_POST['dateEnd'], "date"),
                       GetSQLValueString($_POST['rsrv_guest'], "int"),
                       GetSQLValueString($_POST['note'], "text"));

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($insertSQL, $localhost) or die(mysql_error());

  $insertGoTo = "tqreserve.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    	<title>Reservation</title>
		<head>
		<link href="stylesheet.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" media="all" href="jquery/jquery-ui-custom.css" />
		<script src="jquery/jquery-1.10.2.js"></script>
<script src="jquery/jquery-ui-custom.js"></script>
<script src="jquery/maskedinput.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>

<script>
  jQuery(document).ready(function($) {var dateToday = new Date();
var dates = $("#dateStart, #dateEnd").datepicker({
    defaultDate: "+1w",
	dateFormat: 'yy-mm-dd',
    changeMonth: true,
    numberOfMonths: 1,
    minDate: dateToday,
    onSelect: function(selectedDate) {
        var option = this.id == "dateStart" ? "minDate" : "maxDate",
            instance = $(this).data("datepicker"),
            date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker.settings.dateFormat, selectedDate, instance.settings);
        dates.not(this).datepicker("option", option, date);
   	 }
	});
});
  </script>
		


        
</head>
<body>

<div class="container">
<img src="xres/images/logo.jpg"alt=""style="width:800px;height:180px">
 
<nav>
<a href="index.php">Home</a> | <a href="about.php">About us</a> | <a href="catalogue.php">Accommodations</a> | <a href="reserve.php">Reservations</a> | <a href="contact.php">Contact</a>
</nav>

 <div id="main_container">
<form action="<?php echo $editFormAction; ?>" method="POST" name="form1 " class="smart-green ">
 <h1>Reservation Form </h1>
 
                <label>First Name</label><br />

                <input type="text" name="fname" id="fname" value="" size="30" required /><br>
    
                <label>Last Name</label><br />

                <input type="text" name="lname" id="lname" value="" size="30" required /><br>
				
				<label>Email</label><br />

                <input type="email" name="email" id="email" value="" size="30" required/><br>
   
                <label>Contact Number</label><br />
              
                <input type="text" name="contact" id="contact" value="" size="30" required  /><br>

                <label>Additional Guests</label><br>
                  <select name="rsrv_guest" size="1" id="rsrv_guest" >
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                 
                  </select>
                  <br><br>
                  <label>Rooms</label>
                      <fieldset><label>
                        <input name="room" type="radio" id="room" value="Standard" checked="checked" />
                        Standard Room (RM120.00)</label><br/>
                      <label>
                        <input type="radio" name="room" value="Family" id="room" />
                        Family Room (RM1170.00)</label><br/>
                      <label>
                        <input type="radio" name="room" value="Deluxe" id="room" />
                        Deluxe Room (RM250.00)</label><br/>
				</fieldset>
                     
<label>Reservation Dates:</label><br>
<fieldset>
				<label>Start:</label>
<span id="sprytextfield4">
				<input type="text" name="dateStart" value="" size="15" id="dateStart" placeholder="Pick a Date"required  />
	  <span class="textfieldRequiredMsg">Please select a date.</span></span><br>
                <label>End:</label>
                <span id="sprytextfield5">
                <input type="text" name="dateEnd" value="" size="15" id="dateEnd" placeholder="Pick a Date"required/>         
      <span class="textfieldRequiredMsg">Please select a date.</span></span><br>   
    
     </fieldset>
                <label>Additional Notes:</label><br >
<textarea name="note" id="note" cols="40" rows="5"></textarea>
<br>
                <input type="submit" value="Submit" ><input name="Reset" type="reset" value="Clear Form" />
				<input type="hidden" name="MM_insert" value="form1" />
  
              
</form>
   </div>
   </div>
         <footer>
         	Copyright © 2015 Divino Hotel
         </footer>

</body>
</html>

         