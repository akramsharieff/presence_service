<?php
  include("dbconnect.php");
  session_start();
  $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
  $email = $_SESSION['login'];
  $st="update users set log_status = false where u_email='$email'";
  $st_res = mysqli_query($conn, $st);
  if($st_res){
	session_destroy();
	session_unset();
	header("Location:index.php");  
  }
  else{
	  echo "Something went wrong...";
  }
  
?>