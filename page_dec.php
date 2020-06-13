	
<?php 
include("head.php");
include("dbconnect.php");
if(!isset($_SESSION['login'])){

        header('location:index.php');

}
$check1=$_SESSION['login'];
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if(isset($_POST["submit"])){
	$e_otp=$_POST["otp"];
	$otp=$_SESSION['otp'];
	if(strcmp($e_otp,$otp) == 0){
		$query="Update users SET u_verify=true WHERE u_email= '$check1'";    
		$result=$conn->query($query); 
		if($result)
		{
			unset($_SESSION['otp']);
			echo '<script type="text/javascript">var rslt1=confirm("Your Email has been verified....")
				if(rslt1){
					window.location.href="page_dec.php";
				}
			</script>';
		}
	}
	else{
		echo '<script type="text/javascript">var rslt2=confirm("Invalid OTP! Click OK to try again!!....")
				if(rslt2){
					window.location.href="page_dec.php";
				}
			</script>';
	}
}

$sql = "SELECT u_name,u_verify,p_admit FROM users WHERE u_email= '$check1'";
$result=$conn->query($sql);
if($row = $result->fetch_assoc())
{
	$verify=$row['u_verify'];
	$admitted = $row['p_admit'];
	if($verify && $admitted){
		echo '<script>window.location.href="main_page.php"</script>';
	}
	else if($verify && !$admitted){
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
	<center><h2>page has not been shared yet....</h2></center>
	<?php
	}
	else{
?>
<style>
#submit
	{
	 background-color: white; 
    color: red; 
    border: 0px solid #e7e7e7;
	 border-radius: 5px;
   
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 25px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
	}
	#submit:hover
	{
		background-color:#f5f5f0;
	}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<section class="page_breadcrumbs ds color parallax section_padding_top_20 section_padding_bottom_20">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h2 class="text-uppercase">Email Verification</h2>
						</div>
					</div>
				</div>
			</section>
<div id="primary" class="content-area">
    <!-- main -->
    <main id="main" class="site-main" style="padding: 0 0 0 0">				
		<div class="container" style="margin-top:30px;">
            <article id="post-6589" class="post-6589 page type-page status-publish hentry">
                <!-- BEGIN C-LAYOUT-SIDEBAR -->  
				<h3 align="center">Please! Verify your Email to see your Profile.</h3>
				<h2 align="center">Click <input type="submit" id="submit" name="verify" value="here" class="verify" style="margin-left:6px; padding:0px;"></input> To Verify Your Email...</h2>
				<div id="here"  style="display:none"><center>
					<h4>We have sent an OTP to your registered mail....Please check it!!</h4>
					<form action="page_dec.php" method="post">
						<div align="center" class="vc_row wpb_row vc_inner vc_row-fluid vc_column-gap-15" style="padding:20px; padding-bottom:2px;">		
							<div class="wpb_column vc_column_container vc_col-sm-4 vc_col-has-fill " >
							</div>
							<div class="wpb_column vc_column_container vc_col-sm-3 vc_col-has-fill " >
								
								<input  placeholder="Enter OTP" name="otp" type="text"  required />
											
							</div>
							<div class="wpb_column vc_column_container vc_col-sm-2 vc_col-has-fill " >
								
								<button type="submit" name="submit"  style="margin-top:15px;"><i class="fa fa-check" ></i>  | Verify Email</button>
											
							</div>
							<div class="wpb_column vc_column_container vc_col-sm-3 vc_col-has-fill " >
							</div>
						</div>
					</form>
				</div>
			</article>
		</div>
	</main>
</div>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<?php		
	}
}
?>
<script type="text/javascript">
	$(function() {
    $("[name=verify]").click(function(){
            $("#"+$(this).val()).show('slow');
    });
 });
 $(document).ready(function(){
    $('.verify').click(function(){
        var clickBtnValue = $(this).val();
        var ajaxurl = 'verify_action.php',
        data =  {'action': clickBtnValue};
        $.post(ajaxurl, data, function (response) {
            // Response div goes here.
            alert("Email has been sent to your mail successfully");
        });
    });

});
 </script>

   
   
   
   