<?php 
session_start();
        
if(!isset($_SESSION['customer_login'])) 
    header('location:index.php');   
?>
<!DOCTYPE html>
<html>
    <head>
        <title>ATM request</title>
		<style>
			.cont  {
			  display: flex;
			  height: 100%;
			  width: 100%;
			}
			.cont .row {
			  margin: 0 auto;
			}
</style>
    </head>
	<?php include 'customerheader.php' ?>
	<div class="section"></div>
	<div class="cont">
		<div class="row valign-wrapper">
			<div class="col s12 valign" style="width:300px;">
				<div class="card">
					<div class="card-content black-text">
						<span class="card-title">Request</span>
						<form action="customer_issue_atm_process.php" method="POST">
							<div class="row">
								<div class="input-field col s12">
									<p><label>
										<input name="atm" type="radio" value="ATM" checked />
										<span class="black-text">ATM</span>
									</label></p>
									<p><label>
										<input name="atm" type="radio" value="CHEQUE" />
										<span class="black-text">Cheque Book</span>
									</label></p>
								</div>  
							</div>
							<div class="card-action center">
								<input type="submit" name="submitBtn" value="Request" class='btn blue darken-2'>
							</div>
						</form>
						<a class='pink-text' href='contact.php'><b>Contact us for any queries</b></a>
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php 
        include '_inc/dbconn.php';
        $sender_id=$_SESSION["login_id"];
        
        $sql="SELECT * FROM cheque_book WHERE account_no='$sender_id'";
        $result=mysqli_query($con,$sql) or die(mysql_error());
        $rws=mysqli_fetch_array($result ,MYSQLI_NUM);
        $c_status=$rws[3];
        $c_id=$rws[2];
        
        $sql="SELECT * FROM atm WHERE account_no='$sender_id'";
        $result=mysqli_query($con,$sql) or die(mysql_error());
        $rws=mysqli_fetch_array($result ,MYSQLI_NUM);
        $atm_status=$rws[3];
        $a_id=$rws[2];
        
        if(($a_id==$sender_id) || ($c_id==$sender_id)){
			echo "<div class='cont' >";
			echo "<div class='row' >";
			echo "<div class='col s12 m12'>";
			echo "<table align='center' style='width:400px;' class='striped centered'>";
			echo "<th>Requests</th><th>Status</th>";
			echo "<tr><td>ATM Card Status: </td><td><b>$atm_status</b></td></tr>";
			echo "<tr><td>Cheque Book Status: </td><td><b>$c_status</b></td></tr>";
            echo "</table>";
            echo "</div>";
            echo "</div>";
		}
		
	?>
	