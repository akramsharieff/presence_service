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
						</style>

						<ul id = "list"  class="business">
						<?php
						while($ac_row = $ac_rslt->fetch_assoc()){

								$name = $ac_row['u_name'];
								$email = $ac_row['u_email'];
								echo '<li class="tooltip"> '.$name[0].'<span class="tooltiptext">'.$name.'<br/>'.$email.'</span> </li>';
								
						}
						?>
						</ul>
						<ul id = "list2" style='display:none;' class="business business1" style="margin-bottom:-10px;">
						<li class="tooltip"> B <span class="tooltiptext">Tooltip text <br/> ljfj</span> </li>
						<li class="tooltip"> B <span class="tooltiptext">Tooltip text <br/> ljfj</span> </li>
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
							
							<button class="btn btn-success" Style="width:100%; font-size:18px; padding:16px;"> <i class="fa fa-share-alt" aria-hidden="true"></i> Share </button>
						</div>
						<div class="col-sm-4 text-center" style="color:white;">
							
							<select id='purpose' style="background-color:white; align:right;">
							<option value="1"><h2 class="text-uppercase">Hi! <?php echo $row['u_name']; ?></h2></option>
							<?php
								if(isset($_SESSION['login'])){
						
									echo "<option value='1'><a href=logout.php><span class='mi'></span><span class='txt'>Logout</span></a></option>";
						
								}	?>
							
							
							</select>
						</div>
					</div>
				</div>
	</section>
	
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


