<?php
include("head.php");
?>
<?php   
if(isset($_POST['submit'])){
	$name = $_POST['u_name'];
    $email=$_POST['u_email'];		    
	if(strcmp($_POST['e_pass'],$_POST['c_pass'])==0){
        
        include("dbconnect.php");
		$password = $_POST['e_pass'];
		$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$un_u = "SELECT u_email FROM unregistered WHERE u_email= '$email'";
		$un_rslt= mysqli_query($conn, $un_u);
		if(mysqli_num_rows($un_rslt)>0){
			$sql = "INSERT INTO users (u_name, u_email, u_pass, p_admit)
			VALUES ('$name', '$email',  '$password',1)";
			$result=mysqli_query($conn,$sql);
			$conn->query("delete from unregistered where u_email = '$email'");
			
		}
		else{
			$sql = "INSERT INTO users (u_name, u_email, u_pass)
			VALUES ('$name', '$email',  '$password')";
			$result=mysqli_query($conn,$sql);
		}
		if($result)
		{// Success Message
			
			echo "<center>Account was created successfully <h3><a href='index.php'>login NOW..</a></h3></center>";
			exit();
		}
		else{
			$det = mysqli_query($conn, "select * from users where u_email='$email' ");
			while($row=mysqli_fetch_array($det))
			{
				echo '<script type="text/javascript">alert("Sorry ' . $name . '! '.$row['u_name'].' has already registered with this E-mail..... ")</script>';
			}
		}
		
	}
	else{
		echo '<script type="text/javascript">alert("Passwords not matched")</script>';
	?>
	<section class="page_breadcrumbs ds color parallax section_padding_top_20 section_padding_bottom_20">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h2 class="text-uppercase">Register Customer</h2>
						</div>
					</div>
				</div>
			</section>
			<section class="ls section_padding_top_30 section_padding_bottom_30">
				<div class="container" >
					<div class="row">
						<div class="col-md-6 col-md-offset-3">
						<form class="shop-register" role="form" method ="post" action="register_c.php">
							
							<div class="col-sm-12">
								<div class="form-group address-field validate-required" id="billing_address_fields">  
									<span class="input input--hoshi">
									<input class="input__field input__field--hoshi" value="<?= $name?>" type="text" name="u_name" id="u_name"/>
									<label class="input__label input__label--hoshi input__label--hoshi-color-1" for="u_name">
									<span class="input__label-content input__label-content--hoshi">First Name</span>
									</label>
									</span>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group address-field validate-required" id="billing_address_fields">  
									<span class="input input--hoshi">
									<input class="input__field input__field--hoshi" value="<?= $email?>" type="email" name="u_email" id="u_email"/>
									<label class="input__label input__label--hoshi input__label--hoshi-color-1" for="u_email">
									<span class="input__label-content input__label-content--hoshi">E- mail</span>
									</label>
									</span>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group address-field validate-required" id="billing_address_fields">  
									<span class="input input--hoshi">
									<input class="input__field input__field--hoshi" type="password" name="e_pass" id="e_pass"/>
									<label class="input__label input__label--hoshi input__label--hoshi-color-1" for="e_pass">
									<span class="input__label-content input__label-content--hoshi">Create Password</span>
									</label>
									</span>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group address-field validate-required" id="billing_address_fields">  
									<span class="input input--hoshi">
									<input class="input__field input__field--hoshi" type="password" name="c_pass" id="c_pass"/>
									<label class="input__label input__label--hoshi input__label--hoshi-color-1" for="c_pass">
									<span class="input__label-content input__label-content--hoshi">Confirm Password</span>
									</label>
									</span>
								</div>
							</div>
							<div class="col-sm-12"> <button type="submit" name="submit" class="theme_button wide_button color1 topmargin_40">Register Now</button> <button type="reset" class="theme_button wide_button">Clear Form</button> </div>
						</form>
						</div>
					</div>
				</div>
			</section>
			<script src="js/classie.js"></script>
			<script src="js/stable.js"></script>
	<?php
	exit();
	}
}
?>
			<section class="page_breadcrumbs ds color parallax section_padding_top_20 section_padding_bottom_20">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h2 class="text-uppercase">Register Customer</h2>
						</div>
					</div>
				</div>
			</section>
			<section class="ls section_padding_top_30 section_padding_bottom_30">
				<div class="container" >
					<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<form class="shop-register" role="form" method ="post" action="register_c.php">
							
							<div class="col-sm-12">
								<div class="form-group address-field validate-required" id="billing_address_fields">  
									<span class="input input--hoshi">
									<input class="input__field input__field--hoshi" type="text" name="u_name" id="u_name"/>
									<label class="input__label input__label--hoshi input__label--hoshi-color-1" for="u_name">
									<span class="input__label-content input__label-content--hoshi">First Name</span>
									</label>
									</span>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group address-field validate-required" id="billing_address_fields">  
									<span class="input input--hoshi">
									<input class="input__field input__field--hoshi" type="email" name="u_email" id="u_email"/>
									<label class="input__label input__label--hoshi input__label--hoshi-color-1" for="u_email">
									<span class="input__label-content input__label-content--hoshi">E- mail</span>
									</label>
									</span>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group address-field validate-required" id="billing_address_fields">  
									<span class="input input--hoshi">
									<input class="input__field input__field--hoshi" type="password" name="e_pass" id="e_pass"/>
									<label class="input__label input__label--hoshi input__label--hoshi-color-1" for="e_pass">
									<span class="input__label-content input__label-content--hoshi">Create Password</span>
									</label>
									</span>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group address-field validate-required" id="billing_address_fields">  
									<span class="input input--hoshi">
									<input class="input__field input__field--hoshi" type="password" name="c_pass" id="c_pass"/>
									<label class="input__label input__label--hoshi input__label--hoshi-color-1" for="c_pass">
									<span class="input__label-content input__label-content--hoshi">Confirm Password</span>
									</label>
									</span>
								</div>
							</div>
							<div class="col-sm-12"> <button type="submit" name="submit" class="theme_button wide_button color1 topmargin_40">Register Now</button> <button type="reset" class="theme_button wide_button">Clear Form</button> </div>
						</form>
					</div>
</div>
				</div>
			</section>
<script src="js/classie.js"></script>
<script src="js/stable.js"></script>
	