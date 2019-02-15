<div  style="background: #ECEDF2;">
<head  style="background: #ECEDF2;">
	<link href="./design/now-ui-dashboard.css" rel="stylesheet" />
</head>
<?php
	$user = @$_SESSION['user'];
	if(!isset($user)){
		?>
		<div>
		<section>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6" style="background: white;">
					<br />
					<div class="" style="background: linear-gradient(-200deg, #213151,white,#424B66,#424B66,#424B66,#424B66,#424B66,#213151);">
	      				<nav>
				        <div class="" style="padding-left: 20px">
				          <a class="" href="../"><img src="//www.iconceptcontactsolutions.com/wp-content/uploads/2017/05/logo.fw_.png"></a>
				        </div>
				      </nav>
	      			</div>
	      			<section>
	      				<strong><h5>SIGN IN</h5></strong>
						<span style="font-family: monospace;">ICCS Inventory With <a href="#" >Blockchain Integration</a></span>
	      			</section>
	      			<section>
	      				<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
	                        <div class="">
	                          <input type="email"  style="font-family: monospace;" class="form-control input-md" autocomplete="off" name="sign_in_email" placeholder="Email..." value="<?php echo @$_POST['sign_in_email'] ?>" >
	                        </div>
	                        <br />
	                        <div class="">
	                          <input type="password"  style="font-family: monospace;" class="form-control input-md"  name="sign_in_password" placeholder="Password...">
	                        </div>
	                        <br />
	                        <div class="">

	                          <!--
	                          <input type="submit" name="inv_login" value="Sign In" class="btn" style="background: #EE6547">
	                        -->
	                          
	                          <input type="submit" class="btn btn-primary btn-sm" name="sign_in_submit" value="Sign In" style="background: #EE6547">
	                        </div>
	                      </form>
	      			</section>
	      			<section>
						<?php
						if(isset($_POST['sign_in_submit'])){
							$email = $_POST['sign_in_email'];
							$email = mysqli_real_escape_string($conn,$email);
							$pass = $_POST['sign_in_password'];
							$pass = mysqli_real_escape_string($conn,$pass);
							$string_to_encrypt= $pass;
							$salt="dkjXlt6s9s!aS";
							$pass = openssl_encrypt($string_to_encrypt,"AES-128-ECB",$salt);
							if(empty($email)){
								echo 'Email field can\'t be empty.';
							}else{
								if(empty($pass)){
									echo 'Password field can\'t be empty.';
								}else{
									//check user if exists
									$select_user = "SELECT * FROM `users_tbl` WHERE `usr_email`='$email' AND `usr_password`='$pass'";
									$user_result = mysqli_query($conn,$select_user);
									$user = mysqli_fetch_assoc($user_result);

									$count = mysqli_num_rows($user_result);
									if($count > 0){
										$user_id = $user['usr_id'];
										$update_in = "UPDATE `users_tbl` SET `usr_last_seen`='$date',`usr_last_seen_time`='$time' WHERE `usr_id`='$user_id'";
										if(mysqli_query($conn,$update_in)){
											$_SESSION['id'] = $user_id;
											$_SESSION['user'] = $user['usr_full_name'];
											$_SESSION['user_level'] = $user['usrlvl_id'];
											header('location:./');
										}
									}else{
										echo 'Authentication: Email or password invalid!';
									}
								}
							}
						}
						?>
					</section>
	      			<section>
	      				<footer class="footer" style="font-family: monospace;">
	                        <div class="container-fluid">
	                          
	                          <div class="copyright" style="font: Montserrat;">
	                            &copy;
	                            <script>
	                              document.write(new Date().getFullYear())
	                            </script>, Template by
	                            <a href="https://www.invisionapp.com" target="_blank" style="font: Montserrat;">Invision</a>. Coded by
	                            <a href="https://www.creative-tim.com" target="_blank">Henry Abayan</a>.
	                          </div>
	                        </div>
	                      </footer>
	      			</section>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</section>
	</div>
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


