<?php
include("head.php");
include("dbconnect.php");
extract($_POST);
if(isset($submit))
{
	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
	$rs="select * from users where u_email='$email' and u_pass='$password'";
	$result = mysqli_query($conn, $rs);
	if(mysqli_num_rows($result)<1)
	{
		$found="N";
		if (isset($_SESSION['login']))
		{
			session_start();
			session_destroy();
		}
	}
	else
	{
		if (isset($_SESSION['login']))
		{
			
			session_destroy();
		}
		$_SESSION['login']=$email;
		$st="update users set log_status = true where u_email='$email'";
		$st_res = mysqli_query($conn, $st);
	}
}
if (isset($_SESSION['login']))
{
?>
<script type='text/javascript'>window.location.href="page_dec.php"</script>
<?php	
}	
?>
			<section class="page_breadcrumbs ds color parallax section_padding_top_20 section_padding_bottom_20">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h2 class="text-uppercase">Customer Login</h2>
						</div>
					</div>
				</div>
			</section>

   <form name="form1" method="post" action="">
     <div class="col-md-4 col-md-offset-4" id="outer" align="center">
		<table>
				<tr>
					<span class="input input--hoshi">
					<input class="input__field input__field--hoshi" type="email" name="email" id="email" required />
					<label class="input__label input__label--hoshi input__label--hoshi-color-1" for="email">
						<span class="input__label-content input__label-content--hoshi">E - mail</span>
					</label>
				</span>
				</tr>
				<tr>
				<span class="input input--hoshi">
					<input class="input__field input__field--hoshi" type="password" name="password" id="cu_pass" required />
					<label class="input__label input__label--hoshi input__label--hoshi-color-1" for="cu_pass">
						<span class="input__label-content input__label-content--hoshi">Password</span>
					</label>
				</span>
			</tr>
			<tr>
					<td colspan="2">
						<?php
							if(isset($found))
							{
								echo "<center>Invalid Credentials / Unregistered E - mail <h6><a href='register_c.php'>register here..</a></h6></center>";
							}
						?>
					</td>
				</tr>
				<tr>
					<td colspan=2 align=center class="errors">
						<div id="final">		
							<input name="submit" id="submit" type="submit" value="Login">
						</div>
					</td>
				</tr>
				<br>
	</div>
        
    </form></td>
  </tr>
</table>
</div>
</div>
<script src="js/classie.js"></script>
<script src="js/stable.js"></script>
</body>
</html>
