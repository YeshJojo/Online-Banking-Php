<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:index.php');   
?>
<?php
	include '_inc/dbconn.php';
	$id=  mysqli_real_escape_string($con,$_REQUEST['customer_id']);
	$sql="SELECT * FROM `customer` WHERE id=$id";
	$result=  mysqli_query($con,$sql) or die(mysql_error());
	$rws=  mysqli_fetch_array($result,MYSQLI_NUM);
?>
<?php
	$delete_id=  mysqli_real_escape_string($con,$_REQUEST['customer_id']);
	if(isset($_REQUEST['submit2_id'])){
		$sql_delete="DELETE FROM `customer` WHERE `id` = '$delete_id'";
		mysqli_query($con,$sql_delete) or die(mysqli_error($con));
		header('location:delete_customer.php');
	}
?>
<!DOCTYPE HTML>
<html>
    <?php include 'adminheader.php'; ?>
	<div class="section"></div>
	<div class="container">
		<div class="row">
			<div id="test4" class="col s12">
				<div class="row">
					<div class="col s12 m12 l12">
						<div class="card-panel">
							<h4 class="header2">Edit Customer</h4>
							<div class="row">
								<form action="alter_customer.php" method="POST" class="col s12">
									<div class="row">
										<div class="input-field col s6">
											<input id="first_name" name="edit_name" value="<?php echo $rws[1];?>" type="text" required>
											<label for="first_name"></label>
										</div>
										<div class="input-field col s6">
											<input id="last_name" name="edit_nominee" value="<?php echo $rws[4];?>" type="text" required>
											<label for="last_name">Customer Nominee</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s6">
											<input id="email5" value="<?php echo $rws[8];?>" name="edit_email" type="email" required>
											<label for="email">Email</label>
										</div>
										<div class="input-field col s6">
											<input id="phone5" value="<?php echo $rws[7];?>" name="edit_mobile" type="tel" required>
											<label for="phone5">Phone</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s4">
											<p>
												<label>
													<input name="edit_gender" type="radio" value="M" <?php if($rws[2]=="M") echo "checked";?> />
													<span>Male</span>
												</label>
											</p>
											<p>
												<label>
													<input name="edit_gender" type="radio" value="F" <?php if($rws[2]=="F") echo "checked";?>/>
													<span>Female</span>
												</label>
											</p>
										</div>                        
										<div class="input-field col s4">
											<input type="date" name="edit_dob" value="<?php echo $rws[3];?>" required>
										</div>
										<div class="input-field col s4">
											<input type="text" name="current_id" value="<?php echo $rws[0];?>" disabled="disabled" required>
										</div>
									</div>
									<div class="row">
										<div class="file-field inline input-field col s6">
											<div class="btn">
												<i class="material-icons">file_upload</i>
												<input type="file">
											</div>
											<div class="file-path-wrapper">
												<input class="file-path" type="text">
											</div>
										</div>
										<div class="input-field col s6">
											<input id="acc" value="<?php echo $rws[5];?>" name="edit_account" type="text" required>
											<label for="acc">Account Type</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input id="message5" value="<?php echo $rws[6];?>" name="edit_address" class="materialize-textarea" length="120" required></textarea>
										</div>
										<div class="row">
											<div class="input-field col s12">
												<input type="submit" name="alter_customer" value="Edit Customer" class="btn blue right"/>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include 'footer.php';?>    
    </body>
</html>
