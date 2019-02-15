<?php
	$user = @$_SESSION['user'];
	
	if(!isset($user)){
		header('location:./?l=signin');
	}
?>
<?php
	
	if(isset($_GET['code'])){
		$code = $_GET['code'];
		$code = mysqli_real_escape_string($conn,$code);
		?>
		<section>
			  <div class="row">
			  	<div class="col-sm-4">
			  		<span style="background: #2a374c;padding: 5px;color: #FFF;border-radius:5px; ">
					  	<a href="./" class="breadcrumbtext">Home</a> »
					  	<a href="#" class="breadcrumbtext">Item</a> » 
					  	<a href="#" class="breadcrumbtext"><?php echo strtoupper($_GET['code']) ?></a>
					</span>
			  	</div>
			  	<div class="col-sm-2"></div>
			  	<div class="col-sm-2"></div>
			  	<div class="col-sm-2"></div>
			  	<div class="col-sm-2"></div>
		</div>
		</section>
		<?php
			if(isset($_SESSION['user'])){
				?>
				<section>
					<span style="background: #FF851B;padding: 4px;color: #FFF;border-radius:5px; ">
					  	<a href="./?l=edit&code=<?php echo $code; ?>" class="breadcrumbtext btn btn-xs">Edit » <?php echo strtoupper($_GET['code']) ?></a>
					</span>
					&nbsp;
					<span style="background: #FF851B;padding: 4px;color: #FFF;border-radius:5px; ">
					  	<a href="" class="breadcrumbtext btn btn-xs" data-toggle="modal" data-target="#myModal">Delete</a>
					</span>
				</section>
				<?php
			}
		?>
		
		<?php
		//select asset
		$select_asset = "SELECT * FROM `asset_tbl` WHERE `asst_item_code`='$code'";
		$asset_result = mysqli_query($conn,$select_asset);
		$asset = mysqli_fetch_assoc($asset_result);
		//get status by id
		$status_id = $asset['asst_sts_id'];
		$select_status = "SELECT * FROM `status_tbl` WHERE `sts_id`='$status_id'";
		$status_result = mysqli_query($conn,$select_status);
		$status = mysqli_fetch_assoc($status_result);

		//get supplier
		$supplier_id = $asset['asst_spplr_id'];
		$select_supplier = "SELECT * FROM `supplier_tbl` WHERE `spplr_id`='$supplier_id'";
		$supplier_result = mysqli_query($conn,$select_supplier);
		$supplier = mysqli_fetch_assoc($supplier_result);

		//get tag
		$storage_id = $asset['asst_stord_id'];
		$select_tag = "SELECT * FROM `storage_tbl` WHERE `strg_id`='$storage_id'";
		$tag_result = mysqli_query($conn,$select_tag);
		$tag = mysqli_fetch_assoc($tag_result);
		?>

		<section>
			<section>
				<div class="row">
					<div class="col-sm-12" style="background: #FFFFFF">
						<div class="row">
							
								<div class="col-sm-4">
									<img src="./image/<?php echo $code.'.png'?>" style="width: 100%">
								</div>
								<div class="col-sm-8">
									<section>
										<div class="row">
											<div class="col-sm-6">
												
												<ul class="list-group">
												  <li class="list-group-item" style="background: #2a374c;color:white;">Basic Information</li>
												  <li class="list-group-item">Item Code : <a href="#"><?php echo $asset['asst_item_code']; ?></a></li>
												  <li class="list-group-item">Brand : <a href="#"><?php echo $asset['asst_brand_name']; ?></a></li>
												  <li class="list-group-item">Model : <a href="#"><?php echo $asset['asst_model_name']; ?></a></li>
												  <li class="list-group-item">Status : <span class="label label-<?php echo $status['sts_color']?>"><?php echo $status['sts_mark'] ?></span></li>
												  <li class="list-group-item">Created by : <a href="#"><?php echo $asset['asst_created_by']; ?></a></li>
												  <li class="list-group-item">Created at : <a href="#"><?php echo $asset['asst_created_at']; ?></a></li>
												  <li class="list-group-item">Tag : <span class="label" style="background: #5EABFD"><?php echo $tag['strg_mark'] ?></span></li>
												</ul>
											</div>
											<div class="col-sm-6">
												<ul class="list-group">
												  <li class="list-group-item" style="background: #2a374c;color:white;">Supplier's Information</li>
												  <li class="list-group-item">Supplier : <a href="#"><?php echo $supplier['spplr_store']; ?></a></li>
												  <li class="list-group-item">Contact # : <a href="#"><?php echo $supplier['spplr_contact_num']; ?></a></li>
												  <li class="list-group-item">Email : <a href="#"><?php echo $supplier['spplr_email']; ?></a></li>
												  <li class="list-group-item">Address : <a href="#"><?php echo $supplier['spplr_address']; ?></a></li>
												</ul>

												<ul class="list-group">
												  <li class="list-group-item" style="background: #2a374c;color:white;">Station</li>
												  <li class="list-group-item">Location : <a href="#"><?php echo $asset['asst_site_name']; ?></a></li>
												  <li class="list-group-item">Note : <a href="#"><?php echo $asset['asst_note']; ?></a></li>
												  <li class="list-group-item">station : <a href="#"><?php echo $asset['asst_location']; ?></a></li>
												  
												</ul>

											</div>
										</div>
									</section>
								</div>
							
							
						</div>	
					</div>
				</div>
			</section>
			
		</section>
		<div class="container">
		  <!-- Modal -->
		  <div class="modal fade" id="myModal" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Delete Item</h4>
		        </div>
		        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
		        <div class="modal-body">
		         	
		         		<div class="">
	                          <input type="password"  style="font-family: monospace;" class="form-control input-md"  name="pass" placeholder="Enter your Password...">
	                        </div>
		         	
		        </div>
		        
		        <div class="modal-footer">
		        	<input type="submit" name="del" value="Delete" class="btn btn-default btn-xs">
		          <!--<button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Delete</button>-->
		        </div>
		        </form>

		      </div>
		      
		    </div>
		  </div>
		  
		</div>



		
			<?php
			if(isset($_POST['del'])){
				if(!empty($_POST['pass'])){
					//echo '<script>window.location.href = "http://www.google.com";</script>';
					$usr_id = $_SESSION['id'];
					$pass = $_POST['pass'];
					$pass = mysqli_real_escape_string($conn,$pass);
					$string_to_encrypt = $pass;
					$salt="dkjXlt6s9s!aS";
					$pass = openssl_encrypt($string_to_encrypt,"AES-128-ECB",$salt);
					$select_user = "SELECT `usr_id` FROM `users_tbl` WHERE `usr_id`='$usr_id' AND `usr_password`='$pass'";
					$user_result = mysqli_query($conn,$select_user);
					$count = mysqli_num_rows($user_result);
					if($count > 0){
						//DELETE
						$delete = "DELETE FROM `asset_tbl` WHERE `asst_item_code`='$code'";
						if(mysqli_query($conn,$delete)){
							include('./chain/chaindelete.php');
							$date;
							$time;
							$by = $_SESSION['id'];
							//get_author
							$select_author = "SELECT `usr_full_name` FROM `users_tbl` WHERE `usr_id`='$by'";
							$author_result = mysqli_query($conn,$select_author);
							$author = mysqli_fetch_assoc($author_result);
							$authors = $author['usr_full_name'];
							$edit = new Delete($code,$date,$time,$authors);
							
						}
						echo '<script>window.location.href = "./?l=transaction";</script>';
					}
				}
			}

			?>
		




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