<?php
include '../core/internal_connect.php';
$unit = $_GET['q'];
//select unit id
$select_unit_id = "SELECT `unt_id` FROM `unit_tbl` WHERE `unt_name`='$unit'";
$unit_id_result = mysqli_query($conn,$select_unit_id);
$unit_id = mysqli_fetch_assoc($unit_id_result);
$unit_id = $unit_id['unt_id'];
?>
<div id="brand_panel">
	<div class="form-group">
		<input type="text" name="" value="<?php echo $unit_id?>" id="u_id" hidden>
		<label for="unit">Brand:</label>
		<select class="form-control input-sm" name="brand" id="brand">
			<?php
			$select_brand = "SELECT `brnd_name` FROM `brand_tbl` WHERE `unt_id`='$unit_id'";
			$brand_result = mysqli_query($conn,$select_brand);
				while($brand = mysqli_fetch_assoc($brand_result)){
					echo '<option>'.$brand['brnd_name'].'</option>';
				}
			?>
		</select>
		
		<script type="text/javascript">
			$(document).ready(function(){
				$value = document.getElementById('brand').value;
				$u_id = document.getElementById('u_id').value;
				  $.ajax({url:'./script/brand_select.php?q='+$value+'&u_id='+$u_id,success:function(result){
					$('#model_panel').html(result);
					}});

				
				$('#brand').on('change', function() {
				  $value = this.value;
				  $u_id = document.getElementById('u_id').value;
				  $.ajax({url:'./script/brand_select.php?q='+$value+'&u_id='+$u_id,success:function(result){
					$('#model_panel').html(result);
					}});
				})

				
			});
		</script>
	</div>
</div>

<div id="model_panel">
	<div class="form-group">
		<label for="unit">Model:</label>
		<select class="form-control input-sm" name="model">
			<option>Select Model..</option>
		</select>
	</div>
</div>