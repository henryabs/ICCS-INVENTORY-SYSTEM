<?php
	$user = @$_SESSION['user'];
	$user_level = @$_SESSION['user_level'];
	if(isset($user)){
		if(isset($_GET['user'])){
			if(empty($_GET['user'])){
				error();
			}else{
				?>

				<?php
				$user_get_id = @$_GET['user'];
				//check if exists
				$select_user = "SELECT * FROM `users_tbl` WHERE `usr_id`='$user_get_id'";
				$user_result = mysqli_query($conn,$select_user);
				$count_user = mysqli_num_rows($user_result);
				$user = mysqli_fetch_assoc($user_result);
				$user_lvl = $user['usrlvl_id'];
				if($count_user > 0){
					//get user_level
					$select_lvl = "SELECT `usrlvl_mark` FROM `user_level_tbl` WHERE `usrlvl_id`='$user_lvl'";
					$lvl_result = mysqli_query($conn,$select_lvl);
					$lvl = mysqli_fetch_assoc($lvl_result);
										?>
					<section>
						  <div class="row">
							  	<div class="col-sm-4">
							  		<span style="background: #2a374c;padding: 5px;color: #FFF;border-radius:5px; ">
									  	<a href="./" class="breadcrumbtext">Home</a> »
									  	<a href="#" class="breadcrumbtext">Account</a> »
									  	<a href="#" class="breadcrumbtext"><?php echo $user['usr_full_name']; ?></a>
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
							<div class="col-sm-2"></div>
							<div class="col-sm-8">
								<div class="row">
									<div class="col-sm-4">
										

										<ul class="list-group">
											<li class="list-group-item"><img  style="width:100%;" src="./design/default_pic.png"></li>
											<li class="list-group-item" style="background: #2a374c;color:white;text-align: center;"><?php echo $lvl['usrlvl_mark'];
	 ?></li>
										</ul>
									</div>
									<div class="col-sm-8">
										<ul class="list-group">
											
											<li class="list-group-item" style="background: #2a374c;color:white;text-align: center;">Account Details</li>
	 										<li class="list-group-item">
	 											<p>Full name : <a href="#"><?php echo $user['usr_full_name']; ?></a></p>
	 											<p>Email : <a href="#"><?php echo $user['usr_email']; ?></a></p>
	 											<p>Last seen : <a href="#"><?php echo $user['usr_last_seen'].' '.$user['usr_last_seen_time']; ?></a></p>
	 											<input type="submit" class="btn btn-xs" name="sign_in_submit" value="Edit details" style="background: #FF851B;color: #FFF;border-radius:5px; " data-toggle="modal" data-target="#edit">&nbsp;
	 											<input type="submit" class="btn btn-xs" name="sign_in_submit" value="Change password" style="background: #FF851B;color: #FFF;border-radius:5px; ">
	 										</li>
	 										
										</ul>
									</div>
								</div>

								<!--Edit Modal-->
								<div id="edit" class="modal fade" role="dialog">
								  <div class="modal-dialog">
								    <!-- Modal content-->
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								        <h4 class="modal-title">Enter Detalis</h4>
								      </div>
								      <div class="modal-body">

								        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" style="">
											<div class="form-group">
												<label for="email">Full name:</label>
												<input type="email" class="form-control input-sm" autocomplete="off" name="fname" placeholder="Full name" value="<?php echo @$_POST['sign_in_email'] ?>" >
											</div>

											<div class="form-group">
												<label for="password">Email:</label>
												<input type="text" class="form-control input-sm"  name="email" placeholder="Email">
											</div>
											
											<input type="submit" name="" class="btn btn-success btn-xs" name="edit_submit" data-dismiss="modal" value="Save changes">
										
								      </div>
								      
								    </div>
								  </div>
								</div>
								</form>
								<!--End Edit Modal-->
								<?php
								if(isset($_POST['edit_submit'])){
									echo '<script>alert("test");</script>';
								}
								?>

							</div>
							<div class="col-sm-2"></div>
						</div>


						
					</section>
					<?php
				}else{
					error();
				}
			}
		}else{
			error();
		}
	}else{
		error();
	}
?>


<?php
	function error(){
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