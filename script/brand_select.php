<?php
	include '../core/internal_connect.php';
	$brand = $_GET['q'];
	$u_id = $_GET['u_id'];
	//select brand id
	$select_brand_id = "SELECT `brnd_id` FROM `brand_tbl` WHERE `brnd_name`='$brand'";
	$brand_id_result = mysqli_query($conn,$select_brand_id);
	$brand_id = mysqli_fetch_assoc($brand_id_result);
	$brand_id = $brand_id['brnd_id'];
	$unit_id = $u_id;
?>
<div id="model_panel">
	<div class="form-group">
		<label for="unit">Model:</label>
		<select class="form-control input-sm" name="model">
			<?php
			$select_model = "SELECT * FROM `model_tbl` WHERE `brnd_id`='$brand_id' AND `unt_id`='$unit_id'";
			$model_result = mysqli_query($conn,$select_model);
			while($model = mysqli_fetch_assoc($model_result)){
				echo '<option>'.$model['mdl_name'].'</option>';
			}
			?>
		</select>
	</div>
</div>