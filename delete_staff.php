<?php 
session_start();    
if(!isset($_SESSION['admin_login'])) 
    header('location:index.php');   
?>
<?php
	include '_inc/dbconn.php';
	$sql="SELECT * FROM `staff`";
	$result=  mysqli_query($con,$sql) or die(mysqli_error());
	$sql_min="SELECT MIN(id) from staff";
	$result_min=  mysqli_query($con,$sql_min);
	$rws_min=  mysqli_fetch_array($result_min ,MYSQLI_NUM);
?>
<html>
    <?php include 'adminheader.php'?>
	<div class="section"></div>
	<div class="row" style="margin-left:200px;">
		<div class="col s12 m10">
			<form action="editstaff.php" method="POST">
				<table align="center" class="striped centered">
					<th>Id</th>
					<th>Name</th>
					<th>Gender</th>
					<th>DOB</th>
					<th>Relationship</th>
					<th>Branch</th>
					<th>DOJ</th>
					<th>Address</th>
					<th>Mobile</th>
					<th>Email</th>
					<?php
						while($rws=  mysqli_fetch_array($result ,MYSQLI_NUM)){
							echo "<tr><td><p><label><input type='radio' name='staff_id' value=".$rws[0];
							if($rws[0]==$rws_min[0]) echo' checked';
							echo " /><span>".$rws[0]."</span></label></p></td>";
							echo "<td>".$rws[1]."</td>";
                            echo "<td>".$rws[10]."</td>";
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
							<input type="submit" name="submit2_id" value="Delet Staff" class='btn btn-large blue'/>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</html>
<html>