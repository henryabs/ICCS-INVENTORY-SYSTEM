<?php
	$user = @$_SESSION['user'];
	$user_level = @$_SESSION['user_level'];
	if(isset($user) AND ($user_level == 3) OR ($user_level == 4)){
		?>
			<section>
				  	<div class="row">
						  	<div class="col-sm-4">
						  		<span style="background: #2a374c;padding: 5px;color: #FFF;border-radius:5px; ">
								  	<a href="./" class="breadcrumbtext">Home</a> » 
								  	<a href="./?l=manageuser" class="breadcrumbtext">Manage User</a> »
								  	<a href="./?l=register" class="breadcrumbtext">Register</a>
								</span>
						  	</div>
						  	
						  	<div class="col-sm-2"></div>
						  	<div class="col-sm-2"></div>
						  	<div class="col-sm-2"></div>
						  	<div class="col-sm-2"></div>
					</div>
			</section>
			<section>
				<div class="row">
					<div class="col-sm-4"></div>
					<div class="col-sm-4">
						<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
							<div class="form-group">
								<label for="email">Fullname:</label>
								<input type="text" class="form-control input-sm" name="reg_full_name" placeholder="Full name" value="<?php echo @$_POST['reg_full_name'] ?>">
							</div>

							<div class="form-group">
								<label for="email">Email address:</label>
								<input type="email	" class="form-control input-sm"  name="reg_email" placeholder="Email" value="<?php echo @$_POST['reg_email'] ?>">
							</div>

							<div class="form-group">
								<label for="email">User Level:</label>
								<select name="reg_usrlvl" class="form-control input-sm">
									<option>Select Level..</option>
									
									<?php
									$select_user_level = "SELECT * FROM `user_level_tbl`";
									$user_level = mysqli_query($conn,$select_user_level);
									while($row = mysqli_fetch_assoc($user_level)){
										echo '<option>'.$row['usrlvl_mark'].'</option>';
									}
									?>
								
								</select>
								
							</div>
							
							<div class="form-group">
								<label for="email">Password:</label>
								<input type="password" class="form-control input-sm"  name="reg_pass" placeholder="Password">
							</div>
							
							
							<input type="submit" name="reg_submit" class="btn btn-xs" style="background: #FF851B;padding: 4px;color: #FFF;border-radius:5px; " value="Register User">
						</form>
						<br />
						<?php
						if(isset($_POST['reg_submit'])){
							$fname = $_POST['reg_full_name'];
							$email = $_POST['reg_email'];
							$usr_level = $_POST['reg_usrlvl'];
							//select user level id
							$select_id = "SELECT * FROM `user_level_tbl` WHERE `usrlvl_mark`='$usr_level'";
							$id_result = mysqli_query($conn,$select_id);
							$id = mysqli_fetch_assoc($id_result);
							$usr_level = $id['usrlvl_id'];
							$pass = $_POST['reg_pass'];
							$string_to_encrypt= $pass;
							$salt="dkjXlt6s9s!aS";
							$pass = openssl_encrypt($string_to_encrypt,"AES-128-ECB",$salt);
							if(empty($fname)){
								echo 'Fullname field can\'t be empty.';
							}else{
								if(empty($email)){
									echo 'Email field can\'t be empty.';
								}else{
									if($usr_level == 'Select Level..'){
										echo 'Please select user level.';
									}else{
										if(empty($pass)){
											echo 'Password field can\'t be empty.';
										}else{
											//check account if exists
											$select_user = "SELECT `usr_email` FROM `users_tbl` WHERE `usr_email`='$email'";
											$user_result = mysqli_query($conn,$select_user);
											$count_user = mysqli_num_rows($user_result);
											if($count_user > 0){
												echo 'Users email already registered on system.';
											}else{
												//insert user to database
												$insert_user = "INSERT INTO `users_tbl` (`usr_full_name`,`usr_email`,`usr_password`,`usrlvl_id`)VALUES('$fname','$email','$pass','$usr_level')";
													if(mysqli_query($conn,$insert_user)){
														//select_user_id 
														$select_usr_id = "SELECT `usr_id` FROM `users_tbl` WHERE `usr_email`='$email'";
														$usr_id_result = mysqli_query($conn,$select_usr_id);
														$user_id = mysqli_fetch_assoc($usr_id_result);
														echo 'Registered new user : <a href="./?l=account&user='.$user_id['usr_id'].'">'.$fname.'</a>';
													}else{
														echo 'There is somethig wrong in executing process.';
													}
											}
										}
									}
								}
							}
						}
						
						?>
					</div>
					<div class="col-sm-4"></div>
				</div>
			</section>	
		<?php
	}else{
		?>
		<section>
			<div class="row">
				<div class="col-sm-4" style="color: #484848"></div>
				<div class="col-sm-4" style="color: #484848">
					<div style="text-align: center;">
						<h1 style="font-weight: bold;font-size: 500%;">Oops!</h1>
						<p>We can't seem to find the page you're looking for.</p>
						<h2>Error code: 404</h2>
					</div>
					<br />
					<br />
					<div style="text-align: left;">
						<p>Here are some helpful links instead:</p>
						<a href="./">Home</a>
					</div>
				</div>
				<div class="col-sm-4" style="color: #484848"></div>
			</div>
		</section>
		<?php
	}
?>
