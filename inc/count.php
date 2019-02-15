<?php
	
	//Select all site

	$select_site = "SELECT `site_name` FROM `site_tbl`";
	$site_result = mysqli_query($conn,$select_site);
	while($site = mysqli_fetch_assoc($site_result)){
		echo $site_var = $site['site_name'];
		echo '<br />';
		//select all unit from unit table
		$select_unit = "SELECT `unt_name`,`unt_code` FROM `unit_tbl`";
		$unit_result = mysqli_query($conn,$select_unit);
		while($unit = mysqli_fetch_assoc($unit_result)){
			echo $unit_var = $unit['unt_name'];
			//echo '<br />';
			$unit_code = $unit['unt_code'];
			
			//check total unit per site
			$select_asset = "SELECT `asst_id` FROM `asset_tbl` WHERE `asst_unit_code`='$unit_code' AND `asst_site_name`='$site_var'";
			$asset_result = mysqli_query($conn,$select_asset);
			echo $count_asset = mysqli_num_rows($asset_result);
			echo '<br />';

			//check defaul total per site
			$select_default = "SELECT `total` FROM `total_per_site_tbl` WHERE `site`='$site_var' AND `unit`='$unit_var'";
			$default_result = mysqli_query($conn,$select_default);
			$default_total = mysqli_fetch_assoc($default_result);

			$shortage = $default_total['total'] - $count_asset;

			
			//check if site and unit exist
			$check_data = "SELECT `id` FROM `report_export_tbl` WHERE `unit`='$unit_var' AND `site`='$site_var'";
			$data_result = mysqli_query($conn,$check_data);
			$count_data = mysqli_num_rows($data_result);
			if($count_data < 1){
				//insert
				$insert_report = "INSERT INTO `report_export_tbl` (`site`,`unit`,`total`,`shortage`)VALUES('$site_var','$unit_var','$count_asset','$shortage')";
				mysqli_query($conn,$insert_report);
				echo 'inserted '.$site_var;
			}else{
				//update
				$update_report = "UPDATE `report_export_tbl` SET `total`='$count_asset',`shortage`='$shortage' WHERE `unit`='$unit_var' AND `site`='$site_var'";
				mysqli_query($conn,$update_report);
				echo 'updated '.$site_var;
			}
			echo '<br />';

		}

		echo '<br />';
		echo '---------------';
		echo '<br />';
	}

?>