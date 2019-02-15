<?php
	$user = @$_SESSION['user'];
	$user_level = @$_SESSION['user_level'];
	if(isset($user) AND (($user_level == 2) OR ($user_level == 3) OR ($user_level == 4))){
		?>
		<section>
			  <div class="row">
			  	<div class="col-sm-4">
			  		<span style="background: #2a374c;padding: 5px;color: #FFF;border-radius:5px; ">
					  	<a href="./" class="breadcrumbtext">Home</a> »
					  	<a href="./?l=brand" class="breadcrumbtext">Brand</a> »
					  	<a href="./?l=addbrand" class="breadcrumbtext">Add Brand</a>
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
					<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class ="">
						
						<div class="form-group">
							<label for="unit">Brand:</label>
							<input type="text" class="form-control input-sm" name="brand_name" placeholder="ex: Asus" value="<?php echo @$_POST['brand_name'] ?>">
						</div>

						<div class="form-group">
							<label for="unit">Unit:</label>
							<select class="form-control input-sm" name="unit_name">
								<option>Select Unit..</option>
								<?php
								//select all units
								$select_unit = "SELECT `unt_name` FROM `unit_tbl`";
								$unit_result = mysqli_query($conn,$select_unit);
								while($unit = mysqli_fetch_assoc($unit_result)){
									echo '<option>'.$unit['unt_name'].'</option>';
								}
								?>

							</select>
							
						</div>
						<input type="submit" class="btn btn-xs" name="brand_submit" style="background: #FF851B;padding: 4px;color: #FFF;border-radius:5px; " value="Add Brand +">
					</form>
					<br />
					<?php
					if(isset($_POST['brand_submit'])){
						$brand = $_POST['brand_name'];
						$brand = mysqli_real_escape_string($conn,$brand);
						$unit = $_POST['unit_name'];
						$unit = mysqli_real_escape_string($conn,$unit);
						//Get unit id
						$unit_id = "SELECT `unt_id` FROM `unit_tbl` WHERE `unt_name`='$unit'";
						$id_result = mysqli_query($conn,$unit_id);
						$id = mysqli_fetch_assoc($id_result);
						$id = $id['unt_id'];
						$by = $_SESSION['id'];
						if(empty($brand)){
							echo 'Brand field can\'t be empty.';
						}else{
							if($unit == 'Select Unit..'){
								echo 'Please choose one unit!';
							}else{
								//check if exist
								$select_brand = "SELECT * FROM `brand_tbl` WHERE `brnd_name`='$brand' AND `unt_id`='$id'";
								$brand_result = mysqli_query($conn,$select_brand);
								$count = mysqli_num_rows($brand_result);
								if($count > 0){
									echo 'Brand is already on the system.';
								}else{
									//insert brand
									$inser_brand = "INSERT INTO `brand_tbl` (`brnd_name`,`unt_id`,`usr_id`)VALUES('$brand','$id','$by')";
									if(mysqli_query($conn,$inser_brand)){
										echo 'Successfully added new brand : <a href="./?l=brand">'.$brand.'</a>';
									}else{
										echo 'There is something wrong while executing the process!';
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