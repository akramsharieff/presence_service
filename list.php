<?php
include("head.php");
include("dbconnect.php");
if(!isset($_SESSION['login'])){

        header('location:index.php');

}
$action = $_GET['act'];
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
$check1 = $_SESSION['login'];
$sql = "SELECT * FROM users WHERE log_status= '$action'";
$result=$conn->query($sql);
$i=1;
if(mysqli_num_rows($result)>0)
{
?>
<section class="page_breadcrumbs ds color parallax section_padding_top_20 section_padding_bottom_20">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h2 class="text-uppercase">
                            <?php
                                if($action == 1){ ?>
                                    Active User List
                                
                                <?php
                                }
                                else{ ?>
                                    Inactive User List
                                <?php
                                }
                                ?>    
                            </h2>
						</div>
					</div>
				</div>
			</section>
<div style="margin-top:20px;" class = "container">    
    <table align="center" class="table-bordered">
		<tr>
			<th><h4><b>S.No</b></h4></th>
			<th><h4><b>Name</b></h4></th>	
			<th><h4><b>E - mail</b></h4></th>
			<th><h4><b>
            <?php
            if($action == 1){ ?>
                Logged on
            
            <?php
            }
            else{ ?>
                Last Active
            <?php
            }
            ?>    
            </b></h4></th>
		</tr>
	    <?php 
        while($li_row = $result->fetch_assoc()){
            echo "
				<tr>
				    <td>".$i."</td>
					<td>".$li_row['u_name']."</td>
					<td>".$li_row['u_email']."</td>
                    <td>".$li_row['log_time']."</td>
                </tr>";
            $i=$i+1;
        }
        ?>
    </table>
    </div>
<?php 
}
else{
    echo "No Results Found";
} 
?>    