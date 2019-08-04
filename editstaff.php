<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:index.php');   
?>
<?php
	include '_inc/dbconn.php';
	$id=  mysqli_real_escape_string($con,$_REQUEST['staff_id']);
	$sql="SELECT * FROM `staff` WHERE id=$id";
	$result=  mysqli_query($con,$sql) or die(mysqli_error());
	$rws=  mysqli_fetch_array($result,MYSQLI_NUM);
?>
<?php
	$delete_id=  mysqli_real_escape_string($con,$_REQUEST['staff_id']);
	if(isset($_REQUEST['submit2_id'])){
		$sql_delete="DELETE FROM `staff` WHERE `id` = '$delete_id'";
		mysqli_query($con,$sql_delete) or die(mysqli_error());
		header('location:delete_staff.php');
	}
?>
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
								<form action="alter_staff.php" method="POST" class="col s12">
									<div class="row">
										<div class="input-field col s6">
											<input id="first_name" name="edit_name" value="<?php echo $rws[1];?>" type="text" required>
											<label for="first_name"></label>
										</div>
										<div class="input-field col s6">
											<input type="date" name="edit_doj" value="<?php echo $rws[5];?>" required>
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
													<input name="edit_gender" type="radio" value="M" <?php if($rws[10]=="M") echo "checked";?> />
													<span>Male</span>
												</label>
											</p>
											<p>
												<label>
													<input name="edit_gender" type="radio" value="F" <?php if($rws[10]=="F") echo "checked";?>/>
													<span>Female</span>
												</label>
											</p>
										</div>                        
										<div class="input-field col s4">
											<input type="date" name="edit_dob" value="<?php echo $rws[2];?>" required>
										</div>
										<div class="input-field col s4">
											<input type="text" name="current_id" value="<?php echo $rws[0];?>" disabled="disabled" required>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s6">
											<p><label>
													<input name="edit_gender" type="radio" value="M" <?php if($rws[10]=="M") echo "checked";?> />
													
												<option >unmarried</option>
													<input name="edit_status" type="radio" value="Married" <?php if($rws[3]=="Married") echo "checked";?> />
													<span>Married</span>
											</label></p>
											<p><label>
													<input name="staff_status" type="radio" value="Unmarried" <?php if($rws[3]=="Unmarried") echo "checked";?>/>
													<span>Unmarried</span>
											</label></p>
											<p><label>
													<input name="staff_status" type="radio" value="Divorsed" <?php if($rws[3]=="Divorsed") echo "checked";?>/>
													<span>Divorsed</span>
											</label></p>
										</div>
										<div class="input-field col s6">
											<p><label>
													<input name="edit_dept" type="radio" value="Bengalore" <?php if($rws[4]=="Bengalore") echo "checked";?> />
													<span>Bengalore</span>
											</label></p>
											<p><label>
													<input name="edit_dept" type="radio" value="Kolkata" <?php if($rws[4]=="Kolkata") echo "checked";?>/>
													<span>Kolkata</span>
											</label></p>
											<p><label>
													<input name="edit_dept" type="radio" value="Delhi" <?php if($rws[4]=="Delhi") echo "checked";?>/>
													<span>Delhi</span>
											</label></p>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input id="message5" value="<?php echo $rws[6];?>" name="edit_address" class="materialize-textarea" length="120" required></textarea>
										</div>
										<div class="row">
											<div class="input-field col s12">
												<input type="submit" name="alter" value="Edit Staff" class="btn blue right"/>
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