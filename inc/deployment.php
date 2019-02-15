<?php
	$user = @$_SESSION['user'];
	$user_level = @$_SESSION['user_level'];
	if(isset($user)){
		?>
		<section>
			  <div class="row">
			  	<div class="col-sm-2">
			  		<span style="background: #2a374c;padding: 5px;color: #FFF;border-radius:5px; ">
					  	<a href="./" class="breadcrumbtext">Home</a> »
					  	<a href="./?l=allrequest" class="breadcrumbtext">All Request</a>
					</span>
			  	</div>
			  	<div class="col-sm-2"></div>
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
			<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
				<label for="req_title" class="control-label">Item Code</label>
				<input type="text" name="item" class="form-control" placeholder="Enter item code here..." value="<?php echo @$_GET['item'];?>">
				<br>
				<label for="req_title" class="control-label">Securiry Code</label>
				<input type="text" name="code" class="form-control" placeholder="Enter Security code here..." value="<?php echo @$_GET['code'];?>">
				
				<br>
				<input type="submit" name="pull" value="Pull from stock" class="btn btn-xs" style="background: #FF851B;padding: 4px;color: #FFF;border-radius:5px; ">
			</form>
			<br>
			<?php
				if(isset($_POST['pull'])){
					$item = $_POST['item'];
					$code = $_POST['code'];
					if(empty($item)){
						echo 'Item code should not be empty!';
					}else{
						if(empty($code)){
							echo 'Security code should not be empty!';
						}else{
							//CHECK
							
							$check = "SELECT `asst_id` FROM `asset_tbl` WHERE `asst_item_code`='$item' AND `asst_code`='$code' AND `asst_stord_id`=2";
							$check_result = mysqli_query($conn,$check);
							$count = mysqli_num_rows($check_result);
								if($count > 0){
									//UPDATE
									//asst_code
									$x = 4;
									$min = pow(10,$x);
									$max = (pow(10,$x+1)-1);
									$asst_code = rand($min, $max);
									$update = "UPDATE `asset_tbl` SET `asst_stord_id`=1,`asst_code`='$asst_code' WHERE `asst_item_code`='$item' AND `asst_code`='$code'";
									if(mysqli_query($conn,$update)){
										include('./chain/chaindeploy.php');
										$date;
										$time;
										$by = $_SESSION['id'];
										//get_author
										$select_author = "SELECT `usr_full_name` FROM `users_tbl` WHERE `usr_id`='$by'";
										$author_result = mysqli_query($conn,$select_author);
										$author = mysqli_fetch_assoc($author_result);
										$authors = $author['usr_full_name'];
										$edit = new Deploy($item,1,$date,$time,$authors);
										echo 'Successfully pulled out from stock! <a href="/?l=item&code='.$item.'">'.$item.'</a>';
									}else{
										echo 'error';
									}
								}else{
									echo 'You supplied a wrong data for asset deployment!';
								}
						}
					}
				}
			?>
		</div>
		<div class="col-sm-4"></div>
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