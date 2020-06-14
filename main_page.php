<?php
include("head.php");
include("dbconnect.php");
if(!isset($_SESSION['login'])){

		echo '<script>window.location.href="forbidden.php"</script>';

}
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
$check1 = $_SESSION['login'];
if(isset($_POST['quick_apply'])){
	$email=$_POST['email'];
	$query2="SELECT u_email, p_admit FROM users where u_email = '$email'";
	$result2=$conn->query($query2);
	if(mysqli_num_rows($result2)>0)
	{
		$row_ad = $result->fetch_assoc();
		if($row_ad['p_admit'] == 0){
			$ad_u = "update users set p_admit = true where u_email = '$email'";
			$conn->query($ad_u);
			echo '<script type="text/javascript">alert("Invited succesfully!! ")</script>';
		}
		else{
			echo '<script type="text/javascript">alert("User already admitted to access the page! ")</script>';
		}
	}
	else{
		$sql_ins = "INSERT INTO unregistered (u_email, admit_by) VALUES ('$email', '$check1')";
		$result_ins=mysqli_query($conn,$sql_ins);
		if($result_ins){
			echo '<script type="text/javascript">alert("User does not exit! But can access once registered ")</script>';
		}
		else{
			echo '<script type="text/javascript">alert("Unable to invite user ")</script>';
		}
	}
}
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

	<section class="page_breadcrumbs ds color section_padding_top_20 section_padding_bottom_20">
				<div class="container">
					<div class="row">
						<div class="col-sm-4 text-left">
							
							<?php
							}
						}
						$ac_q = "SELECT * FROM users WHERE log_status = 1";
						$ac_rslt=$conn->query($ac_q);
						?>
						<style>
						ul#list li {
						display:inline;
						}
						ul#list2 li {
						display:inline;
						}
						</style>

						<ul id = "list"  class="business">
						<?php
						$ac_count = mysqli_num_rows($ac_rslt);
						$count = 1;
						while($ac_row = $ac_rslt->fetch_assoc()){

								$name = $ac_row['u_name'];
								$email = $ac_row['u_email'];
								if($count<=5){
									echo '<li class="tooltip"><a href="list.php?act=1"> '.$name[0].'</a><span class="tooltiptext">'.$name.'<br/>'.$email.'</span> </li>';
								}
								else{
									echo '<li class="tooltip"><a href="list.php?act=1"> +'.(($ac_count - $count)+1).'</a><span class="tooltiptext">Click the bubble <br/>to view the users log</span> </li>';
								}
								$count = $count+1;
								
						}
						?>

						</ul>
						<?php
							$pa_q = "SELECT * FROM users WHERE log_status = 0";
							$pa_rslt=$conn->query($pa_q);
							$pa_count = mysqli_num_rows($pa_rslt);
							$count = 1;
						?>
						<ul id = "list2" style='display:none;' class="business" style="margin-bottom:-10px;">
						<?php
							while($pa_row = $pa_rslt->fetch_assoc()){
								$name = $pa_row['u_name'];
								$email = $pa_row['u_email'];
								if($count<=5){
									echo '<li class="tooltip"><a href="list.php?act=0"> '.$name[0].'</a><span class="tooltiptext">'.$name.'<br/>'.$email.'</span> </li>';
								}
								else{
									echo '<li class="tooltip"><a href="list.php?act=0">+'.(($ac_count - $count)+1).'</a><span class="tooltiptext">Click the bubble <br/>to view the users log</span> </li>';
								}
								$count = $count+1;
							}
						?>
					</ul>
						
						</div>
						<div class="col-sm-2 text-center" style="color:white;">
							
							<select id='purpose' style="background-color:white; width:100%">
							<option value="1">Select</option>
							<option value="1">Present</option>
							<option value="2">Past</option>
							</select>
						</div>
						<div class="col-sm-2 text-center" style="color:white;">
								
						<button type="button" style="padding: 14px 30px 14px; font-size: 20px;" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
						<i class="fa fa-share-alt">	&nbsp; | Share</i>
						</button>
						<div class="modal fade" id="exampleModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
									<h4 style="color:black;" class="modal-title">Page Invitation</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form class="form-horizontal tpad" role="form" method="post" action="" enctype="multipart/form-data">
											<div class="form-group">
												<div class="col-md-2"></div>
												<div class="col-md-8">
													<h6 style="color:black;">Enter E- mail</h6>
													<input style="color:black; border-color: black;" type="email" name="email" class="form-control" id="email"  placeholder = "Email" required>
													<br>
													<button type = "submit"  style="padding: 14px 30px 14px; font-size: 20px; margin-top:15px;" name="quick_apply" class ="btn btn-success pull-right">Invite</button>
												</div>
												
											</div>
										</form>
									</div>
									<div class="modal-footer">
										<div class="col-md-offset-1 col-md-6">	</div>
									</div>
								</div>
							</div>
						</div>

					</div>
						<div class="col-sm-4 text-center" style="color:white;">
							
							<select id='purpose' style="background-color:white; align:right;">
							<option value="1"><h2 class="text-uppercase">Hi! <?php echo $row['u_name']; ?></h2></option>
						
							
							</select>
						</div>
					</div>
				</div>
	</section>

	<div align="center" style="margin-top:30px;" class="container">
			<h3>Sample page that shows the people that are currently viewing the doc</h3>
			<embed  src="database/vitassignmentfirst.pdf" width="600" height="500"/>
	</div>
	<script>
$(document).ready(function(){
    $('#purpose').on('change', function() {
      if ( this.value == '1')
      //.....................^.......
      {
           $("#list2").hide();
        $("#list").show();
      }
      else  if ( this.value == '2')
      {
          $("#list").hide();
        $("#list2").show();
      }
       else  
      {
        $("#list2").hide();
      }
    });
});
</script>	
	
<!-- HTML to write -->


