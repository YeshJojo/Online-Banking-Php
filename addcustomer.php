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
							<h4 class="header2">Add Customer</h4>
							<div class="row">
								<form action="add_customer.php" method="POST" class="col s12">
									<div class="row">
										<div class="input-field col s6">
											<input id="first_name" name="customer_name" type="text" required>
											<label for="first_name">Customer Name</label>
										</div>
										<div class="input-field col s6">
											<input id="last_name" name="customer_nominee" type="text" required>
											<label for="last_name">Customer Nominee</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s6">
											<input id="email5" name="customer_email" type="email" required>
											<label for="email">Email</label>
										</div>
										<div class="input-field col s6">
											<input id="phone5" name="customer_mobile" type="tel" required>
											<label for="phone5">Phone</label>
										</div>
									</div>
									
									<div class="row">
										<div class="input-field col s12">
											<input id="password6" name="customer_pwd" type="password" required>
											<label for="password">Password</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s6">
											<p>
												<label>
													<input name="customer_gender" type="radio" value="M" checked />
													<span>Male</span>
												</label>
											</p>
											<p>
												<label>
													<input name="customer_gender" type="radio" value="F"/>
													<span>Female</span>
												</label>
											</p>
										</div>                        
										<div class="input-field col s6">
											<input type="date" name="customer_dob" required>
										</div>  
									</div>
									<div class="row">
										<div class="input-field col s6">
											<input id="type" name="customer_account" type="text" required>
											<label for="type">Account Type</label>
										</div>
										<div class="input-field col s6">
											<input id="bal" name="initial" type="tel" value="0.0" required>
											<label for="bal">Initial Balance</label>
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
											<input id="branch" name="branch" type="tel" value="Bengaluru" required>
											<label for="branch">Branch</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input id="message5" name="customer_address" class="materialize-textarea" length="120" required></textarea>
										</div>
										<div class="row">
											<div class="input-field col s12">
												<input type="submit" name="add_customer" value="Add Customer" class="btn blue darken-2 right"/>
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