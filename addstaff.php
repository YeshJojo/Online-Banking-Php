<?php 
	session_start();
	if(!isset($_SESSION['admin_login'])) 
		header('location:index.php');   
?>
<!DOCTYPE html>
<html>
	<?php include 'adminheader.php'; ?>
	<div class="section"></div>
	<div class="container">
		<div class="row">
			<div id="test4" class="col s12">
				<div class="row">
					<div class="col s12 m12 l12">
						<div class="card-panel">
							<h4 class="header2">Add Staff</h4>
							<div class="row">
								<form action="add_staff.php" method="POST" class="col s12">
									<div class="row">
										<div class="input-field col s6">
											<input id="first_name" name="staff_name" type="text" required>
											<label for="first_name">Staff Name</label>
										</div>
										<div class="input-field col s6">
											<input id="doj" type="date" name="staff_doj" required>
											<label for="doj">Date of Join</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s6">
											<input id="email5" name="staff_email" type="email" required>
											<label for="email">Email</label>
										</div>
										<div class="input-field col s6">
											<input id="phone5" name="staff_mobile" type="tel" required>
											<label for="phone5">Phone</label>
										</div>
									</div>
									
									<div class="row">
										<div class="input-field col s12">
											<input id="password6" name="staff_pwd" type="password" required>
											<label for="password">Password</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s6">
											<p>
												<label>
													<input name="staff_gender" type="radio" value="M" checked />
													<span>Male</span>
												</label>
											</p>
											<p>
												<label>
													<input name="staff_gender" type="radio" value="F"/>
													<span>Female</span>
												</label>
											</p>
										</div>
										<div class="input-field col s6">
											<input type="date" name="staff_dob" required>
											<label>Date of Birth</label>
										</div>  
									</div>
									<div class="row">
										<div class="input-field col s6">
											<p><label>
													<input name="staff_status" type="radio" value="Married" checked />
													<span>Married</span>
											</label></p>
											<p><label>
													<input name="staff_status" type="radio" value="Unmarried"/>
													<span>Unmarried</span>
											</label></p>
											<p><label>
													<input name="staff_status" type="radio" value="Divorsed"/>
													<span>Divorsed</span>
											</label></p>
										</div>
										<div class="input-field col s6">
											<p><label>
													<input name="staff_dept" type="radio" value="Bengalore" checked />
													<span>Bengalore</span>
											</label></p>
											<p><label>
													<input name="staff_dept" type="radio" value="Kolkata"/>
													<span>Kolkata</span>
											</label></p>
											<p><label>
													<input name="staff_dept" type="radio" value="Delhi"/>
													<span>Delhi</span>
											</label></p>
										</div>
									</div>
									<div class="row">
										<div class="file-field inline input-field col s12">
											<div class="btn">
												<i class="material-icons">file_upload</i>
												<input type="file">
											</div>
											<div class="file-path-wrapper">
												<input class="file-path" type="text">
											</div>
										</div>
										
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input id="message5" name="staff_address" class="materialize-textarea" length="120" required></textarea>
										</div>
										<div class="row">
											<div class="input-field col s12">
												<input type="submit" name="add_staff" value="Add Staff" class="btn blue darken-2 right"/>
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