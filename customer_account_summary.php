<?php 
session_start();
        
if(!isset($_SESSION['customer_login'])) 
    header('location:index.php');   
?>
<?php
	$cust_id=$_SESSION['cust_id'];
	include '_inc/dbconn.php';
	$sql="SELECT * FROM customer WHERE email='$cust_id'";
	$result=  mysqli_query($con, $sql) or die(mysql_error());
	$rws=  mysqli_fetch_array($result ,MYSQLI_NUM);

	$name= $rws[1];
	$account_no= $rws[0];
	$branch=$rws[10];
	$branch_code= $rws[11];
	$last_login= $rws[12];
	$acc_status=$rws[13];
	$address=$rws[6];
	$acc_type=$rws[5];
	$gender=$rws[2];
	$mobile=$rws[7];
	$email=$rws[8];
		
	$_SESSION['login_id']=$account_no;
	$_SESSION['name']=$name;
?>

<html>
	<body>
		<?php include 'customerheader.php' ?>
		<div class="section"></div>
		<center><h5>Welcome <?php echo $_SESSION['name']?></h5></center>
		<div class="container">
			<div class="section center">
				<div class="col-md-8" style="width: 550px; display: inline-block;">
					<div id="profile-page-sidebar" class="col s6 m2 ">
						<ul id="profile-page-about-details" class="collection">
							<li class="collection-item black-text">
								<div class="row">
									<div class="col s5 left-align"><i class="material-icons">person</i> Name:</div>
									<div class="col s7 right-align strong"><?php echo $_SESSION['name']?></div>
								</div>
								<div class="row">
									<div class="col s5 left-align"><i class="material-icons">credit_card</i> Account Number:</div>
									<div class="col s7 right-align strong"><?php echo $account_no?></div>
								</div>
								<div class="row">
									<div class="col s5 left-align"><i class="material-icons">access_time</i> Last Login:</div>
									<div class="col s7 right-align strong"><?php echo $last_login;?></div>
								</div>
								<div class="row">
									<div class="col s5 left-align"><i class="material-icons">home</i> Address:</div>
									<div class="col s7 right-align strong"><?php echo $address;?></div>
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
									<div class="col s5 left-align"><i class="material-icons">account_balance</i> Branch:</div>
									<div class="col s7 right-align strong"><?php echo $branch;?></div>
								</div>
								<div class="row">
									<div class="col s5 left-align"><i class="material-icons">info</i> Account Type:</div>
									<div class="col s7 right-align strong"><?php echo $acc_type;?></div>
								</div>
								<div class="row">
									<div class="col s5 left-align"><i class="material-icons">account_balance_wallet</i> Account Status</div>
									<div class="col s7 right-align strong"><?php echo $acc_status;?></div>
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
							<img src="images/acc_state.png">
						</div>
						<div class="card-content large-text">
							<a href="customer_acc_statement.php"><h5>Account statement</h5></a>
						</div>
					</div>
				</div>
				<div class="col s12 m6 l4">
					<div class="card">
						<div class="card-image">
							<img src="images/fund.png">
						</div>
						<div class="card-content">
							<a href="#"><h5>Fund Transfer</h5></a>
						</div>
					</div>
				</div>
				<div class="col s12 m6 l4">
					<div class="card">
						<div class="card-image">
							<img src="images/atm.png" style="width:256px;" >
						</div>
						<div class="card-content">
							<a href="customer_issue_atm.php"><h5>Issue ATM / Cheque book</h5></a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php include 'footer.php' ?>
	</body>
</html>