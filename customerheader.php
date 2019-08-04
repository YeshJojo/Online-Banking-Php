<?php        
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
	$_SESSION['name']=$name;
?>
<head>
        <noscript><meta http-equiv="refresh" content="0;url=no-js.php"></noscript>    
        <meta charset="UTF-8">
        <title>Bangalore Co-operative Bank</title>
        <link rel="stylesheet" href="css/materialize.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    </head>
<div class="navbar-fixed">
	<nav class="blue lighten-2">
		<div class="container nav-wrapper ">
			<a href="customer_account_summary.php" class="brand-logo black-text text-darken-1">BCBank</a>
			<ul class="right">
				<li><a class="black-text text-darken-1" href="customer_account_summary.php">Home</a></li>
				<li><a class="black-text text-darken-1" href="features.php">Services</a></li>
				<li><a class="black-text text-darken-1" href="contact.php">Contact</a></li>
				<li><a class="dropdown-button black-text text-darken-1" data-activates="dropdown" 
					data-beloworigin="true"><?php echo $_SESSION['name']?> Profile<i class="material-icons right">arrow_drop_down</i></a>
				</li>
			</ul>
		</div>
	</nav>
</div>
<ul id="dropdown" class="dropdown-content collection">
	<a href="#"> <span class="title black-text text-darken-1">Change Password</span></a>
    <a href="customer_logout.php"><span class="title black-text text-darken-1">Logout</span></a>
</ul>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='js/materialize.min.js'></script>
<script type="text/javascript">
    (function($) {
		$(function() {
            $('.dropdown-button').dropdown({
                hover: true,
            });
		});
    })(jQuery);
</script>