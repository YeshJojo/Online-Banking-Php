<?php 
session_start();        
if(!isset($_SESSION['staff_login'])) 
    header('location:index.php');   
?>
<!DOCTYPE html>
<html>
	<?php include 'staffheader.php' ?>
	<div class="section"></div>
	<div class="row" style="margin-left:200px;">
		<div class="col s12 m10">
			<?php
				include '_inc/dbconn.php';
				$sql="SELECT * FROM cheque_book WHERE cheque_book_status='PENDING'";
				$result=  mysqli_query($con,$sql) or die(mysqli_error());
			?>
			<form action="staff_cheque_approve_process.php" method="POST">
				<table align="center" class="striped centered">
					<th style="text-align:center;">Id</th>
					<th style="text-align:center;">Name</th>
					<th style="text-align:center;">Account No.</th>
					<th style="text-align:center;">Cheque Book Status</th>
					<?php
                        while($rws=  mysqli_fetch_array($result ,MYSQLI_NUM)){
							echo "<tr><td><p><label><input type='radio' name='customer_id' value=".$rws[0];
							echo' checked';
							echo " /><span>".$rws[0]."</span></label></p></td>";
                            echo "<td>".$rws[1]."</td>";
                            echo "<td>".$rws[2]."</td>";
                            echo "<td>".$rws[3]."</td>";
                            echo "</tr>";
                        } 
					?>
				</table>
				<table>
					<tr>
						<td>
							<input type="submit" name="submit_id" value="Approve Request" class='btn btn-large blue'/>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</html>