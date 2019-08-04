<?php 
session_start();    
if(!isset($_SESSION['admin_login'])) 
    header('location:index.php');   
?>
<!DOCTYPE html>
<?php
	include '_inc/dbconn.php';
	$sql="SELECT * FROM `customer`";
	$result=  mysqli_query($con,$sql) or die(mysqli_error());
	$sql_min="SELECT MIN(id) from customer";
	$result_min=  mysqli_query($con,$sql_min);
	$rws_min=  mysqli_fetch_array($result_min ,MYSQLI_NUM);
?>
<html>
    <?php include 'adminheader.php'?>
	<div class="section"></div>
	<div class="row" style="margin-left:200px;">
		<div class="col s12 m10">
			<form action="editcustomer.php" method="POST">
				<table align="center" class="striped centered">
					<th>Id</th>
					<th>Name</th>
					<th>Gender</th>
					<th>DOB</th>
					<th>Nominee</th>
					<th>Account type</th>
					<th>Address</th>
					<th>Mobile</th>
					<th>Email</th>
					<?php
						while($rws=  mysqli_fetch_array($result ,MYSQLI_NUM)){
							echo "<tr><td><p><label><input type='radio' name='customer_id' value=".$rws[0];;
							if($rws[0]==$rws_min[0]) echo' checked';
							echo " /><span>".$rws[0]."</span></label></p></td>";
							echo "<td>".$rws[1]."</td>";
							echo "<td>".$rws[2]."</td>";
							echo "<td>".$rws[3]."</td>";
							echo "<td>".$rws[4]."</td>";
							echo "<td>".$rws[5]."</td>";
							echo "<td>".$rws[6]."</td>";
							echo "<td>".$rws[7]."</td>";
							echo "<td>".$rws[8]."</td>";
							echo "</tr>";
						}
					?>
				</table>
				<table>
					<tr>
						<td>
							<input type="submit" name="submit2_id" value="Delet Details" class='btn btn-large blue'/>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</html>