<?php
	$user = @$_SESSION['user'];
	$user_level = @$_SESSION['user_level'];
	if(isset($user) AND (($user_level == 2) OR ($user_level == 3) OR ($user_level == 4))){
		?>
		<section>
			  <div class="row">
			  	<div class="col-sm-2">
			  		<span style="background: #2a374c;padding: 5px;color: #FFF;border-radius:5px; ">
					  	<a href="./" class="breadcrumbtext">Home</a> »
					  	<a href="./?l=unit" class="breadcrumbtext">Unit</a> »
					  	<a href="./?l=addunit" class="breadcrumbtext">Add Unit</a>
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
					<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class ="">
						
						<div class="form-group">
							<label for="unit">Unit:</label>
							<input type="text" class="form-control input-sm" name="unit_name" placeholder="ex: keyboard" value="<?php echo @$_POST['unit_name'] ?>">
						</div>

						<div class="form-group">
							<label for="unit">Unit Code:</label>
							<input type="text" class="form-control input-sm" name="unit_code" placeholder="ex: iccs-kb-" value="<?php echo @$_POST['unit_code'] ?>">
						</div>
						<input type="submit" class="btn btn-xs" name="unit_submit" style="background: #FF851B;padding: 4px;color: #FFF;border-radius:5px; " value="Add Unit +">
					</form>
					<br />
					<?php
					if(isset($_POST['unit_submit'])){
						$unit = strtolower($_POST['unit_name']);
						//echo $unit = mysqli_real_escape_string($conn,$unit);
						$code = $_POST['unit_code'];
						//echo $code = mysqli_real_escape_string($conn,$code);
						$by = $_SESSION['id'];
						if(empty($unit)){
							echo 'Unit field can\'t be empty.';
						}else{
							if(empty($code)){
								echo 'Unit Code field can\'t be empty.';
							}else{
								//check if exists
								$select_unit = "SELECT * FROM `unit_tbl` WHERE `unt_name`='$unit' AND `unt_code`='$code'";
								$unit_result = mysqli_query($conn,$select_unit);
								$unit_count = mysqli_num_rows($unit_result);
								if($unit_count > 0){
									echo 'Unit is already on the system.';
								}else{
									//insert unit
									$insert_unit = "INSERT INTO `unit_tbl` (`unt_name`,`unt_code`,`usr_id`)VALUES('$unit','$code','$by')";
									if(mysqli_query($conn,$insert_unit)){
										echo 'Successfully added new unit : <a href="./?l=unit">'.$unit.'</a>';
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
