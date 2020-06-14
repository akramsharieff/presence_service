	
<?php 
include("head.php");
include("dbconnect.php");
if(!isset($_SESSION['login'])){

	echo '<script>window.location.href="forbidden.php"</script>';

}
$check1=$_SESSION['login'];
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

$sql = "SELECT u_name,p_admit FROM users WHERE u_email= '$check1'";
$result=$conn->query($sql);
if($row = $result->fetch_assoc())
{
	$admitted = $row['p_admit'];
	if($admitted){
		echo '<script>window.location.href="main_page.php"</script>';
	}
	else{
	?>
	<section class="page_breadcrumbs ds color parallax section_padding_top_20 section_padding_bottom_20">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h2 class="text-uppercase">Hi! <?php echo $row['u_name']; ?></h2>
						</div>
					</div>
				</div>
	</section>
	<div class="container" style="margin-top:50px;">
	<center><h2>Page has not been shared yet.... </h2>
		<h2>Please wait till you are invited by a authenticated user..</h2>
	</center>
	<?php
	}
}
?>   
   
   
   