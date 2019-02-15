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
					  	<a href="./?l=model" class="breadcrumbtext">Model</a> »
					  	<a href="./?l=addmodel" class="breadcrumbtext">Add Model</a>
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
							<label for="unit">Model:</label>
							<input type="text" class="form-control input-sm" name="model_name" placeholder="ex: krs-85" value="<?php echo @$_POST['model_name'] ?>">
						</div>

						<div class="form-group">
							<label for="unit">Unit:</label>
							<select class="form-control input-sm" name="unit_name" id="unit">
								
								<?php
								//select all units
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
									  $.ajax({url:'./script/brand_on_model.php?u='+$value,success:function(result){
										$('#brand_panel').html(result);
										}});

									$('#unit').on('change', function() {
									  $value = this.value;
									  $.ajax({url:'./script/brand_on_model.php?u='+$value,success:function(result){
										$('#brand_panel').html(result);
										}});
									})
								});
							</script>
						</div>
						
						<div id="brand_panel">
							
						</div>

						<input type="submit" class="btn btn-xs" name="model_submit" style="background: #FF851B;padding: 4px;color: #FFF;border-radius:5px; " value="Add Model +">
					</form>
					<br />
					<?php
					if(isset($_POST['model_submit'])){
						$model = $_POST['model_name'];
						$model = mysqli_real_escape_string($conn,$model);
						$brand = $_POST['brand'];
						$brand = mysqli_real_escape_string($conn,$brand);
						$unit = $_POST['unit_name'];
						$unit = mysqli_real_escape_string($conn,$unit);
						if(empty($model)){
							echo 'Model field can\'t be empty.';
						}else{
							//get brand_id
							$select_brand_id = "SELECT `brnd_id` FROM `brand_tbl` WHERE `brnd_name`='$brand'";
							$brand_id = mysqli_query($conn,$select_brand_id);
							$brand_id = mysqli_fetch_assoc($brand_id);
							$brand_id = $brand_id['brnd_id'];

							//get unit id
							$select_unit_id = "SELECT `unt_id` FROM `unit_tbl` WHERE `unt_name`='$unit'";
							$unit_id = mysqli_query($conn,$select_unit_id);
							$unit_id = mysqli_fetch_assoc($unit_id);
							$unit_id =  $unit_id['unt_id'];

							$by = $_SESSION['id'];

							//check if model exists
							$select_model = "SELECT * FROM `model_tbl` WHERE `mdl_name`='$model' AND `unt_id`='$unit_id' AND `brnd_id`='$brand_id'";
							$model_result = mysqli_query($conn,$select_model);
							$model_count = mysqli_num_rows($model_result);
							if($model_count > 0){
								echo 'Model is already on the system.';
							}else{
								//insert model
								$insert_model = "INSERT INTO `model_tbl` (`mdl_name`,`unt_id`,`brnd_id`,`usr_id`)VALUES('$model','$unit_id','$brand_id','$by')";
								if(mysqli_query($conn,$insert_model)){
									echo 'Successfully added new model : <a href="./?l=model">'.$model.'</a>';
								}else{
									echo 'There is something wrong while executing the process!';
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