<?php
include("head.php");
include("dbconnect.php");
if(!isset($_SESSION['login'])){

        header('location:index.php');

}
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
$check1 = $_SESSION['login'];
$sql = "SELECT u_name,p_admit FROM users WHERE u_email= '$check1'";
$result=$conn->query($sql);
if($row = $result->fetch_assoc())
{
	$admitted = $row['p_admit'];
	if(!$admitted){
		echo '<script>window.location.href="page_dec.php"</script>';
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
	
	<?php
	}
}
$ac_q = "SELECT * FROM users WHERE log_status = 1";
$ac_rslt=$conn->query($ac_q);
while($ac_row = $ac_rslt->fetch_assoc()){

		$name = $ac_row['u_name'];
		echo $name[0];

}
?>