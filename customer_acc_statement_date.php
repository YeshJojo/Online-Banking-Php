<?php 
session_start();
        
if(!isset($_SESSION['customer_login'])) 
    header('location:index.php');   
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Account Statement</title>
        <link rel="stylesheet" href="style.css">
    </head>
	<?php include 'customerheader.php' ?>
	<h4 class="black-text strong" style="text-align:center;">Account summary by Date</h4>
	<div class="section"></div>
	<div class="row" style="margin-left:200px;">
		<div class="col s12 m10">
			<table align="center" class="striped centered">
				<th style="text-align:center;">Id</th>
				<th style="text-align:center;">Transaction Date</th>
				<th style="text-align:center;">Narration</th>
				<th style="text-align:center;">Credit</th>
				<th style="text-align:center;">Debit</th>
				<th style="text-align:center;">Balance Amount</th>
				<?php if(isset($_REQUEST['summary_date'])) {
					$date1=$_REQUEST['date1'];
					$date2=$_REQUEST['date2'];
                         
					include '_inc/dbconn.php';
					$sender_id=$_SESSION["login_id"];
					$sql="SELECT * FROM passbook".$sender_id." WHERE transactiondate BETWEEN '$date1' AND '$date2'";
					$result=  mysqli_query($con,$sql) or die(mysqli_error());
					while($rws=  mysqli_fetch_array($result ,MYSQLI_NUM)){
						echo "<tr>";
						echo "<td>".$rws[0]."</td>";
						echo "<td>".$rws[1]."</td>";
						echo "<td>".$rws[8]."</td>";
						echo "<td>".$rws[5]."</td>";
						echo "<td>".$rws[6]."</td>";
						echo "<td>".$rws[7]."</td>";
						echo "</tr>";
					}
				}?>
			</table>
			<label style='float: right;'>
				<a href="customer_account_summary.php" class='btn blue lighten-2 right black-text'><b>Go to Homepage</b></a>
			</label>
		</div>
	</div>
</html>