<?php

session_start();

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="ticket"; // Database name 
$tbl_name="admin" ; // Table name 




$errflag = false;

if($_POST['admin_name'] == '')
{
	$errmsg_arr[] = 'Login ID missing';
	$errflag = true;
}

if($_POST['admin_pw'] == '') 
{
	$errmsg_arr[] = 'Password missing';
	$errflag = true;
}

//If there are input validations, redirect back to the login form
if($errflag)
{
	$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
	session_write_close();
	header("location: admin_panel.php");
	exit();
}
// Connect to server and select databse.
$conn = mysqli_connect("$host", "$username"/*, "$password"*/)or die("cannot connect"); 
mysqli_select_db("ticket", $conn)or die("cannot select DB");

// username and password sent from form 
$myusername=$_POST['admin_name']; 
$mypassword=$_POST['admin_pw']; 


// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $tbl_name WHERE admin_name='$myusername' and admin_pw='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
//if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
//session_register("username");
//session_register("password"); 
//header("location:login_success.php");

if(isset($result)){
  if(mysql_num_rows($result) == 1){
    session_regenerate_id();
    $member = mysql_fetch_assoc($result);
    $_SESSION['SESS_MEMBER_ID'] = $member['id'];
    $_SESSION['SESS_FIRST_NAME'] = $member['firstname'];
    $_SESSION['SESS_LAST_NAME'] = $member['lastname'];
    $_SESSION['STATUS'] = true;
    session_write_close();
    header("location: home_admin.php");
    exit();
  
  }
  else
  { header("location: loginerroradmin.php");
	 
	  exit();
	  }
  }
else {
 header("location: loginerroradmin.php");
}
?>