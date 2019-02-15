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
					  	<a href="./?l=addasset" class="breadcrumbtext">Add Asset</a>
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
					<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" style="padding:10px;">
						<div id="unit_panel">
							<div class="form-group">
								<label for="unit">Unit:</label>
								<select class="form-control input-sm" name="unit" id="unit">
									
									<?php
									$select_unit = "SELECT `unt_name` FROM `unit_tbl`";
									$unit_result = mysqli_query($conn,$select_unit);
										while($unit = mysqli_fetch_assoc($unit_result)){
											echo '<option>'.$unit['unt_name'].'</option>';
										}
									?>
								</select>

								<script type="text/javascript">
									$(document).ready(function(){
										$value = document.getElementById('unit').value;
										  
										  $.ajax({url:'./script/unit_select.php?q='+$value,success:function(result){
											$('#brand_panel').html(result);
											}});

										$('#unit').on('change', function() {
										  $value = this.value;
										  $.ajax({url:'./script/unit_select.php?q='+$value,success:function(result){
											$('#brand_panel').html(result);
											}});
										})
									});
								</script>
							</div>
						</div>

						<div id="brand_panel">
							<div class="form-group">
								<label for="brand">Brand:</label>
								<select class="form-control input-sm" name="brand">
									<option>Select Brand..</option>
								</select>
							</div>
						</div>

						<div id="supplier_panel">
							<div class="form-group">
								<label for="supplier">Supplier:</label>
								<select class="form-control input-sm" name="supplier">
									
									<?php
									//select supplier
									$select_supplier = "SELECT `spplr_store` FROM `supplier_tbl`";
									$supplier_result = mysqli_query($conn,$select_supplier);
									while($supplier = mysqli_fetch_assoc($supplier_result)){
										echo '<option>'.$supplier['spplr_store'].'</option>';
									}
									?>
								</select>
							</div>
						</div>

						<div id="site_panel">
							<div class="form-group">
								<label for="supplier">Company Site:</label>
								<select class="form-control input-sm" name="site_name">
									<option>Select Site..</option>
									<?php
									//select site
									$select_site = "SELECT `site_name` FROM `site_tbl`";
									$site_result = mysqli_query($conn,$select_site);
									while($site = mysqli_fetch_assoc($site_result)){
										echo '<option>'.$site['site_name'].'</option>';
									}
									?>
								</select>
							</div>
						</div>

						<div id="btn_panel">
							<input type="submit" name="asset_submit" value="Add Asset" class="btn btn-xs" style="background: #FF851B;padding: 4px;color: #FFF;border-radius:5px; ">
						</div>
					</form>
					<br />
					<?php
					if(isset($_POST['asset_submit'])){
						$unit = $_POST['unit'];
						$brand = $_POST['brand'];
						$model = $_POST['model'];
						$supplier = $_POST['supplier'];
						$select_unit_code = "SELECT `unt_code` FROM `unit_tbl` WHERE `unt_name`='$unit'";
						$unit_code = mysqli_query($conn,$select_unit_code);
						$asst_unit_code = mysqli_fetch_assoc($unit_code);
						//asst_unit_code
						$asst_unit_code = $asst_unit_code['unt_code'];

						//asst_unit_number
						$select_unit_number = "SELECT `asst_unit_number` FROM `asset_tbl` WHERE `asst_unit_code`='$asst_unit_code' ORDER BY `asst_unit_number` DESC";
						$unit_number = mysqli_query($conn,$select_unit_number);
						$count_unit_number = mysqli_num_rows($unit_number);
						if($count_unit_number < 1){
							$asst_unit_number = 1;
						}else{
							$select_unit_number = "SELECT `asst_unit_number` FROM `asset_tbl` WHERE `asst_unit_code`='$asst_unit_code' ORDER BY `asst_unit_number` DESC LIMIT 1";
							$unit_number = mysqli_query($conn,$select_unit_number);
							$unit_number = mysqli_fetch_assoc($unit_number);
							$asst_unit_number = $unit_number['asst_unit_number'] + 1;
						}
						//asst_item_code
						$asst_item_code =  $asst_unit_code.$asst_unit_number;
						//asst_brand_name
						$asst_brand_name = $brand;

						//asst_model_name
						$asst_model_name = $model;

						//asst_sts_id
						$asst_sts_id = 1;
						
						//asst_stord_id
						$asst_stord_id = 2;

						//asst_spplr_id
						if($supplier == 'Select Supplier..'){
							echo 'Plese choose Supplier';
						}else{
							$select_supplier_id = "SELECT `spplr_id` FROM `supplier_tbl` WHERE `spplr_store`='$supplier'";
							$supplier_id_result = mysqli_query($conn,$select_supplier_id);
							$supplier_id = mysqli_fetch_assoc($supplier_id_result);
							$asst_spplr_id = $supplier_id['spplr_id'];
						}
						//asst_location
						$asst_location = '';

						//asst_created_at
						$asst_created_at = $date;
						
						//asst_created_at_time
						$asst_created_at_time = $time;

						//asst_created_by
						$asst_created_by = $_SESSION['user'];

						//asst_last_update
						$asst_last_update = '';
						
						//asst_last_update_time
						$asst_last_update_time = '';
						
						//asst_update_by
						$asst_update_by = '';
						
						//asst_note
						$asst_note = '';

						//asst_code
						$x = 4;
						$min = pow(10,$x);
						$max = (pow(10,$x+1)-1);
						$asst_code = rand($min, $max);
						$site_name = $_POST['site_name'];

						if($site_name == 'Select Site..'){
							echo 'Please select designated site for this item!';
						}else{
							$insert_asset = "INSERT INTO `asset_tbl` (`asst_item_code`,`asst_unit_code`,`asst_unit_number`,`asst_brand_name`,`asst_model_name`,`asst_sts_id`,`asst_stord_id`,`asst_spplr_id`,`asst_location`,`asst_created_at`,`asst_created_at_time`,`asst_created_by`,`asst_last_update`,`asst_last_update_time`,`asst_update_by`,`asst_note`,`asst_code`,`asst_site_name`)VALUES('$asst_item_code','$asst_unit_code','$asst_unit_number','$asst_brand_name','$asst_model_name','$asst_sts_id','$asst_stord_id','$asst_spplr_id','$asst_location','$asst_created_at','$asst_created_at_time','$asst_created_by','$asst_last_update','$asst_last_update_time','$asst_update_by','$asst_note','$asst_code','$site_name')";
							if(mysqli_query($conn,$insert_asset)){
								$user_name = $_SESSION['user'];
								$log_event = 'add';
								$log_desc = $asst_item_code;
								$log_date = $date;
								$log_time = $time;
								$insert_log = "INSERT INTO `logs_tbl` (`usr_name`,`log_event`,`log_description`,`log_date`,`log_time`)VALUES('$user_name','$log_event','$log_desc','$log_date','$log_time')";
								mysqli_query($conn,$insert_log);
								echo 'Added new asset : <a href="./?l=item&code='.$asst_item_code.'">'.$asst_item_code.'</a>';
								include "phpqrcode/qrlib.php";
								$back_color = 0xFFFF00;
								$fore_color = 0xFF00FF;
								//QRcode::png($item_code,'./phpqrcode/image/'.$item_code.'.png', 'H', 20, 2, false, $back_color, $fore_color);
								QRcode::png($asst_item_code,'./image/'.$asst_item_code.'.png','H',10,2);
								/*ADD GENESIS CHAIN
								$select_item = "SELECT `id` FROM `chain_transaction` WHERE `item_code`='$asst_item_code'";
								$item_result = mysqli_query($conn,$select_item);
								$count_item = mysqli_num_rows($item_result);
								if($count_item < 1){
									//Insert block
									$timestamp = $date.' '.$time;
									$description = "No description yet";
									$action = 'CREATE';
									$hash = hash('sha256',$asst_item_code.$action.$timestamp.$description);
									$previous_block = hash('sha256', $asst_item_code);
									$insert_block = "INSERT INTO `chain_transaction` (`id`,`item_code`,`action`,`timestamp`,`description`,`block_author`,`hash`,`previous_block`)VALUES('','$asst_item_code','$action','$timestamp','$description','$asst_created_by','$hash','$previous_block')";
									mysqli_query($conn,$insert_block);
								}
								*/
								//ADD GENESIS CHAIN
								include('./chain/chainlog.class.php');
								$block = new chainLog($asst_item_code,'CREATE',$asst_brand_name,$asst_model_name,$asst_sts_id,$asst_stord_id,$asst_location,$asst_note,$asst_created_at,$asst_created_at_time,$asst_created_by,$site_name,hash('sha256',$asst_item_code.$asst_created_at_time.$asst_created_by),'Genesis Block');
								$block->addGenesisBlock();

							}else{
								echo 'There is somethig wrong in executing process.';
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
