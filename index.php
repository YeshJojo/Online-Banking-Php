<?php 
if(isset($_REQUEST['submitBtn'])){
    include '_inc/dbconn.php';
    $username=$_REQUEST['uname'];
    $password=($_REQUEST['pwd']);
  
    $sql="SELECT email,password FROM customer WHERE email='$username' AND password='$password'";
    $result=mysqli_query($con,$sql) or die(mysql_error());
    $rws=  mysqli_fetch_array($result ,MYSQLI_NUM);
    
    $user=$rws[0];
    $pwd=$rws[1];    
	
	$sql2="SELECT login_id,pwd FROM admin WHERE login_id='$username' AND pwd='$password'";
    $result2=mysqli_query($con,$sql2) or die(mysql_error());
    $rws2=  mysqli_fetch_array($result2 ,MYSQLI_NUM);
    
    $adminUser=$rws2[0];
    $adminPwd=$rws2[1];  

    $sql3="SELECT email,pwd FROM staff WHERE email='$username' AND pwd='$password'";
    $result3=mysqli_query($con,$sql3) or die(mysql_error());
    $rws3=  mysqli_fetch_array($result3 ,MYSQLI_NUM);
    
    $staffUser=$rws3[0];
    $staffPwd=$rws3[1];  	
    
     if($user==$username && $pwd==$password){
        session_start();
        $_SESSION['customer_login']=1;
        $_SESSION['cust_id']=$username;
    header('location:customer_account_summary.php'); 
    }
   else if($adminUser==$username && $adminPwd==$password){
        session_start();
        $_SESSION['admin_login']=1;
        $_SESSION['admin_id']=$username;
    header('location: adminpage.php'); 
    }
	else if($staffUser==$username && $staffPwd==$password){
        session_start();
        $_SESSION['staff_login']=1;
        $_SESSION['staff_id']=$username;
    header('location: staff_homepage.php'); 
    }
else{
    header('location:index.php');  
}}
?>
<?php 
session_start();
        
if(isset($_SESSION['customer_login'])) 
    header('location:customer_account_summary.php');   
?>

<!DOCTYPE html>
<html>
    <head>
        <noscript><meta http-equiv="refresh" content="0;url=no-js.php"></noscript>    
        <meta charset="UTF-8">
        <title>Online Banking System</title>
        <link rel="stylesheet" href="css/materialize.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    </head>
    <body onload="generatePassword()" >
		<?php include 'header.php' ?>
		<div class="section">
			<div class="container"><br/><br/>
				<h1 class="header center">Bangalore Co-operative Bank</h1>
				<div class="row center">
					<h5 class="header col s12">A Unit Of Indian Trust For Social Action</h5>
				</div>
				<div class="row center"><a class="btn-large black-text blue lighten-2" href="#">Register/ Update your mail id
					<i class="material-icons right">chevron_right</i></a></div><br/><br/>
			</div>
		</div>
        <div class="container">
		<div class="section">
			<div class="row">
				<div class="col s12 m4">
					<div class="icon-block">
						<h2 class="center light-blue-text"><i class="material-icons icol large">group</i></h2>
						<h5 class="center">About us</h5>
						<p>Bangalore Co-operative Bank established in 1974, is an Indian multinational, public sector 
						banking and financial services company. It is a government-owned corporation headquartered in Mumbai, 
						Maharashtra. The company is ranked 216th on the Fortune Global 500 list of the world's biggest 
						corporations as of 2017.</p>
					</div>
				</div>
				<div class="col s12 m4">
					<div class="icon-block">
						<h2 class="center light-blue-text"><i class="material-icons icol large">flash_on</i></h2>
						<h5 class="center">Service</h5>
						<p>BCB is one of the largest employers in the country with 209,567 employees 
						as on 31 March 2017, out of which there were 23% female employees and 3,179 (1.5%) employees with 
						disabilities. On the same date, BCB had 37,875 Scheduled Castes (18%), 17,069 Scheduled Tribes (8.1%) 
						and 39,709 Other Backward Classes (18.9%) employees.</p>
					</div>
				</div>
				<div class="col s12 m4">
					<div class="icon-block">
						<h2 class="center light-blue-text"><i class="material-icons icol large">mood</i></h2>
						<h5 class="center">Give a smile</h5>
						<p>BCB life insurance is Public Limited Listed company. BCB Life Insurance Listed 
						on BSE And NSE (Stock Exchange of India). BCB Life started as a joint venture with BNP Paribas in 2001.
						While in its initial stage its business was mainly from bancassurance channel, now it is developing its 
						own agency team for selling its life insurance products.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class = "row">
        <div class = "col m6 s8">
			<div class="container">
				<div class="row" style="padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
					<form class="col s12" action='' method='POST'>
						<div class='row'>
							<div class='input-field col s12'>
								<input class='validate' type="text" name="uname" placeholder="Username" required>
							</div>
						</div>
						<div class='row'>
							<div class='input-field col s12'>
								<input class='validate' type="password" name="pwd" placeholder="Password" required>
							</div>
							<label style='float: right;'>
								<a class='pink-text' href='#!'><b>Forgot Password?</b></a>
							</label>
						</div>
						<div class="generator-wrapper">
							<div class="generator">
								<div class="input-wrapper input-field">
									<input id="copyField" type="text" readonly="readonly" disabled="disabled" class='black-text col s6'/>
									<i class="blue lighten-2 btn" id="generateButton"><i class="material-icons">refresh</i></i>
								</div>
							</div>
						</div>
						<div class='row'>
							<div class='input-field col s12'>
								<input class='validate' type='text' id='captcha' placeholder="Enter captcha"/>
							</div>
						</div>
						<center>
							<div class='row' data-callback="enableBtn">
								<input type="submit" name="submitBtn" value="Log In" id="butt" class='col s12 btn btn-large blue lighten-2 black-text'>
							</div>
						</center>
					</form>
				</div>
			</div>
		</div>
		<div class = "col s4 m4">  
			<div class="row">
				<div class="card blue lighten-2"><br>
					<div class="card-content black-text">
						<span class="card-title black-text"><h4>Features</h4></span>
						<ul class="black-text">
							<li>Registration for online banking</li>
							<li>Adding Beneficiary account</li>
							<li>Funds Transfer</li>
							<li>Apply for a loan</li>
							<li>Social security schemes</li>
							<li>Branch and IFSC</a></li>
							<li>mCash</li>
							<li>Last Login record</li>
							<li>Mini Statement</li>
							<li>ATM and Cheque Book</li>
							<li>Staff approval Feature</li>
							<li>Account Statement by date</li>
							<li>Open a new account</li>
							<li>Make a new deposit</li>
						</ul>
					</div>	
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="row">
			<div class="col s12 m10" style="margin-left:100px;">
				<div class="card horizontal blue lighten-2"><br>
					<div class="card-content white-text">
						<span class="card-title black-text"><h4>Personal Banking</h4></span>
						<ul class="black-text">
							<li>Personal Banking application provides features to administer and manage non personal accounts online.</li>
							<li>Phishing is a fraudulent attempt, usually made through email, phone calls, SMS etc seeking your personal and confidential information.</li>
							<li>Online Bank or any of its representative never sends you email/SMS or calls you over phone to get your personal information, password or one time SMS (high security) password.</li>
							<li>Any such e-mail/SMS or phone call is an attempt to fraudulently withdraw money from your account through Internet Banking. Never respond to such email/SMS or phone call. Please report immediately on reportif you receive any such email/SMS or Phone call. Please lock your user access immediately.</li>			
						</ul>
					</div>	
				</div>
			</div>
		</div>		
	</div>
	<?php include 'footer.php' ?>
	<script src="js/materialize.min.js"></script>
	<script src="js/index.js"></script>
	</body>
</html>