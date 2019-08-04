<?php 
session_start();
        
if(!isset($_SESSION['staff_login'])) 
    header('location:index.php');   
?>
<?php
	$staff_id=$_SESSION['staff_id'];
	include '_inc/dbconn.php';
	$sql="SELECT * FROM staff WHERE email='$staff_id'";
	$result=  mysqli_query($con,$sql) or die(mysqli_error());
	$rws=  mysqli_fetch_array($result ,MYSQLI_NUM);
		
	$id=$rws[0];
	$name=$rws[1];
	$dob=$rws[2];
	$department=$rws[4];
	$doj=$rws[5];
	$mobile=$rws[7];
	$email=$rws[8];
	$gender=$rws[10];
	$last_login=$rws[11];
			
	$_SESSION['login_id']=$email;
	$_SESSION['name1']=$name;
	$_SESSION['id']=$id;
?>
            
<!DOCTYPE html>
<html>
	<body>
		<?php include 'staffheader.php' ?>
		<div class="section"></div>
		<center><h5>Welcome <?php echo $_SESSION['name1']?></h5></center>
		<div class="container">
			<div class="section center">
				<div class="col-md-8" style="width: 550px; display: inline-block;">
					<div id="profile-page-sidebar" class="col s6 m2 ">
						<ul id="profile-page-about-details" class="collection">
							<li class="collection-item black-text">
								<div class="row">
									<div class="col s5 left-align"><i class="material-icons">person</i> Name:</div>
									<div class="col s7 right-align strong"><?php echo $_SESSION['name1']?></div>
								</div>
								<div class="row">
									<div class="col s5 left-align"><i class="material-icons">credit_card</i> Branch:</div>
									<div class="col s7 right-align strong"><?php echo $department?></div>
								</div>
								<div class="row">
									<div class="col s5 left-align"><i class="material-icons">access_time</i> Date of Join:</div>
									<div class="col s7 right-align strong"><?php echo $doj;?></div>
								</div>
								<div class="row">
									<div class="col s5 left-align"><i class="material-icons">contact_phone</i> Contact Number</div>
									<div class="col s7 right-align strong">+91-<?php echo $mobile;?></div>
								</div>
								<div class="row">
									<div class="col s5 left-align"><i class="material-icons">contact_mail</i> Email:</div>
									<div class="col s7 right-align strong"><?php echo $email;?></div>
								</div>
								<div class="row">
									<div class="col s5 left-align"><i class="material-icons">access_time</i> Last Login:</div>
									<div class="col s7 right-align strong"><?php echo $last_login;?></div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<center><h5>Account </h5></center>
		<section id="popular" class="container section scrollspy">
			<div class="row">
				<div class="col s12 m6 l4">
					<div class="card">
						<div class="card-image">
							<img src="images/cheque.png">
						</div>
						<div class="card-content large-text">
							<a href="staff_cheque_approve.php"><h5>Approve Cheque Book Requests</h5></a>
						</div>
					</div>
				</div>
				<div class="col s12 m6 l4">
					<div class="card">
						<div class="card-image">
							<img src="images/atm.png" style="width:256px;" >
						</div>
						<div class="card-content">
							<a href="staff_atm_approve.php"><h5>Approve ATM Requests</h5></a>
						</div>
					</div>
				</div>
				<div class="col s12 m6 l4">
					<div class="card">
						<div class="card-image">
							<img src="images/ben.png" style="height:256px;" >
						</div>
						<div class="card-content">
							<a href="staff_cheque_approve.php"><h5>Approve Beneficiary Requests</h5></a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php include 'footer.php' ?>
		<?php
			$date1=date('Y-m-d H:i:s');
			$_SESSION['staff_date']=$date1;
		?>
	</body>
</html>         