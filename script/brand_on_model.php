<?php
	include '../core/internal_connect.php';
	$unit = $_GET['u'];
	//select unit id
	$select_unit_id = "SELECT `unt_id` FROM `unit_tbl` WHERE `unt_name`='$unit'";
	$unit_id_result = mysqli_query($conn,$select_unit_id);
	$unit_id = mysqli_fetch_assoc($unit_id_result);
	$unit_id = $unit_id['unt_id'];
	//$unit_id = $u_id;
?>
<div id="brand_panel">
	<div class="form-group">
		<label for="unit">Brand:</label>
		<select class="form-control input-sm" name="brand">
			<?php
			$select_brand = "SELECT `brnd_name` FROM `brand_tbl` WHERE `unt_id`='$unit_id'";
			$brand_result = mysqli_query($conn,$select_brand);
			while($brand = mysqli_fetch_assoc($brand_result)){
				echo '<option>'.$brand['brnd_name'].'</option>';
			}
			?>
		</select>
	</div>
</div>