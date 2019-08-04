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
	<?php include '_inc/dbconn.php';
		$sender_id=$_SESSION["login_id"];
		$sql="SELECT * FROM passbook".$sender_id." LIMIT 10";
		$result=  mysqli_query($con,$sql) or die(mysql_error()); 
	?>
	<h4 class="black-text strong" style="text-align:center;">Last 10 Transactions</h4>
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
				<?php
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
				?>
			</table>
			<div class="section"></div>
			<form>
				<label style='float: right;'>
					<input type="button" onclick="func()" value="Check Account summary by Date?" class='btn blue lighten-2 right'>
				</label>
			</form>
		</div>
	</div>
	<div class="row" id="disdiv" style="margin-left:200px;">
		<div class="col s12 m10">
			<form action="customer_acc_statement_date.php" method="POST">
				<table align="center">
					<tr>
						<td>Start Date [mm/dd/yyyy] </td>
						<td><input type="date" name="date1" required></td>
					</tr>
					<tr>
						<td>End Date [mm/dd/yyyy] </td>
						<td><input type="date" name="date2" required></td>
					</tr>
				</table> 	
				<table align="center">
					<tr>
						<td colspan="2" align='center' ><input type="submit" name="summary_date" value="Go" class="btn blue lighten-2 right"/></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	<script>
		var d = document.getElementById("disdiv");
		disdiv.style.visibility = 'hidden';
		function func(){
			disdiv.style.visibility = 'visible';
		}
	</script>
</html>