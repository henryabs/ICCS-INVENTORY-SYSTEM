<?php
	$user = @$_SESSION['user'];
	$user_level = @$_SESSION['user_level'];
	//
	if(!isset($user)){
		echo '<script>window.location.href = "./?l=signin"</script>';
	}
	if(isset($code)){
		echo 'nice';
	}else{
		$code = @$_GET['code'];
		$code = mysqli_real_escape_string($conn,$code);
		if(empty($code)){
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
		}else{
			//check if exists
			$select_item = "SELECT * FROM `asset_tbl` WHERE `asst_item_code`='$code'";
			$item_result = mysqli_query($conn,$select_item);
			$item_count = mysqli_num_rows($item_result);
			$item = mysqli_fetch_assoc($item_result);
			if($item_count > 0){
				?>
				<section>
					  <div class="row">
					  	<div class="col-sm-4">
					  		<span style="background: #2a374c;padding: 5px;color: #FFF;border-radius:5px; ">
							  	<a href="./" class="breadcrumbtext">Home</a> »
							  	<a href="#" class="breadcrumbtext">Edit</a> » 
							  	<a href="#" class="breadcrumbtext"><?php echo strtoupper($_GET['code']) ?></a>
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

							<ul class="list-group">
							  <li class="list-group-item" style="background: #2a374c;color:white;">Edit Asset Information | <?php echo strtoupper($code); ?></li>
							  <li class="list-group-item">
							  	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class ="">
								
								<div class="form-group">
									<label for="unit">Status: </label>
									<select class="form-control input-sm" name="status">
										<?php
										//select_status
										$item_status_id = $item['asst_sts_id'];
										$sele_status = "SELECT * FROM `status_tbl`";
										$status_result = mysqli_query($conn,$sele_status);
										while($status = mysqli_fetch_assoc($status_result)){		
											if($status['sts_id'] == $item_status_id){
												echo '<option selected="selected">'.$status['sts_mark'].'</option>';
											}else{
												echo '<option>'.$status['sts_mark'].'</option>';
											}
										}
										?>
									</select>
								</div>

								<div class="form-group">
									<label for="unit">Company Site: </label>
									<select class="form-control input-sm" name="site">
										<?php
										
										//select site
										$item_site = $item['asst_site_name'];
										$select_site = "SELECT * FROM `site_tbl`";
										$site_result = mysqli_query($conn,$select_site);
										while($site = mysqli_fetch_assoc($site_result)){
											
												
												if($site['site_name'] == $item_site){
													echo '<option selected="selected">'.$site['site_name'].'</option>';
												}else{
													echo '<option>'.$site['site_name'].'</option>';
												}
											
										}
										?>
									</select>
								</div>

								<div class="form-group">
									<label for="unit">Location:</label>
									<input type="text" class="form-control input-sm" name="location" placeholder="ex: station 52" autocomplete="off" value="<?php echo $item['asst_location'] ?>">
								</div>

								<div class="form-group">
									<label for="unit">Note:</label>
									<textarea name="note" class="form-control input-sm" placeholder=""><?php echo $item['asst_note'] ?></textarea>
								</div>

								

								<input type="submit" class="btn btn-xs" name="edit_submit" style="background: #FF851B;padding: 4px;color: #FFF;border-radius:5px; " value="Save Changes">
							</form>
							  </li>
							  
							</ul>
							
							<br />
							<?php
							
							//include('./chain/chainlog.class.php');
							//$edit_block = new chainLog($item['asst_item_code'],2,3,4,5);
							//$edit_block->addEditBlock();
							
							?>
							
							<?php
							if(isset($_POST['edit_submit'])){
								//check if not on stock
								$select_strd = "SELECT `asst_stord_id` FROM `asset_tbl` WHERE `asst_item_code`='$code'";
								$strd_result = mysqli_query($conn,$select_strd);
								$strd = mysqli_fetch_assoc($strd_result);
								if($strd['asst_stord_id'] == 2)
								{
									echo 'You are not allowed to edit "'.$code.'" because the item is currently on storage!';
								}else
								{
									$status = $_POST['status'];
									//get status id
									$select_status_id = "SELECT `sts_id` FROM `status_tbl` WHERE `sts_mark`='$status'";
									$status_id = mysqli_query($conn,$select_status_id);
									$status_id = mysqli_fetch_assoc($status_id);
									$status_id = $status_id['sts_id'];
									$site = $_POST['site'];
									$location = $_POST['location'];
									$note = $_POST['note'];
									$date;
									$time;
									$by = $_SESSION['id'];
									//get_author
									$select_author = "SELECT `usr_full_name` FROM `users_tbl` WHERE `usr_id`='$by'";
									$author_result = mysqli_query($conn,$select_author);
									$author = mysqli_fetch_assoc($author_result);
									$authors = $author['usr_full_name'];
									//update asset
									$update_asset = "UPDATE `asset_tbl` SET `asst_sts_id`='$status_id',`asst_site_name`='$site',`asst_location`='$location',`asst_last_update`='$date',`asst_last_update_time`='$time',`asst_update_by`='$by',`asst_note`='$note' WHERE `asst_item_code`='$code'";
									if(mysqli_query($conn,$update_asset)){
										echo 'Successfully updated asset : <a href="./?l=item&code='.$code.'">'.$code.'</a>';
										include('./chain/chainedit.php');
										$edit = new ChainEdit($code,$status_id,$site,$location,$note,$date,$time,$authors);
									}else{
										echo 'There is something wrong while executing the process!';
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
		}
	}
	
?>