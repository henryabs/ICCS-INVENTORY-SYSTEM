<?php       
include '../core/internal_connect.php';
include '../core/date.php';

//Select all site

	$select_site = "SELECT `site_name` FROM `site_tbl`";
	$site_result = mysqli_query($conn,$select_site);
	while($site = mysqli_fetch_assoc($site_result)){
		$site_var = $site['site_name'];
		//echo '<br />';
		//select all unit from unit table
		$select_unit = "SELECT `unt_name`,`unt_code` FROM `unit_tbl`";
		$unit_result = mysqli_query($conn,$select_unit);
		while($unit = mysqli_fetch_assoc($unit_result)){
			$unit_var = $unit['unt_name'];
			//echo '<br />';
			$unit_code = $unit['unt_code'];
			
			//check total unit per site
			$select_asset = "SELECT `asst_id` FROM `asset_tbl` WHERE `asst_unit_code`='$unit_code' AND `asst_site_name`='$site_var'";
			$asset_result = mysqli_query($conn,$select_asset);
			$count_asset = mysqli_num_rows($asset_result);
			//echo '<br />';

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
				//echo 'inserted '.$site_var;
			}else{
				//update
				$update_report = "UPDATE `report_export_tbl` SET `total`='$count_asset',`shortage`='$shortage' WHERE `unit`='$unit_var' AND `site`='$site_var'";
				mysqli_query($conn,$update_report);
				//echo 'updated '.$site_var;
			}
			//echo '<br />';

		}
		/*
		echo '<br />';
		echo '---------------';
		echo '<br />';
		*/
	}
?>
			<?php
			if(isset($_POST['export_report'])){
				
				$file_name = 'Report-'.$date.'-'.$time.'.xls';
				//select site
				$select_site = "SELECT `site_name` FROM `site_tbl`";
				$site_result = mysqli_query($conn,$select_site);
				@$output .= '<table border=1>';		
				@$output .= '<thead>';
						
				while($site = mysqli_fetch_assoc($site_result)){
					@$output .= '<tr>';		
						@$output .= '<th colspan="" style="color:white;background:#FF6C37;border-left:20px solid red;">'.strtoupper($site['site_name']).'</th>';
						@$output .= '</tr>';

						@$output .= '<tr>';
								@$output .= '<th colspan="3">Unit</th>';
								@$output .= '<th colspan="3">Total</th>';
								@$output .= '<th colspan="3" style="border-right:20px solid red;">Shortage</th>';
						@$output .= '</tr>';

						//select per site
						$si = $site['site_name'];
						
						$select_asset_per_site = "SELECT * FROM `report_export_tbl` WHERE `site`='$si'";
						$asset_per_site_result = mysqli_query($conn,$select_asset_per_site);
						while($row = mysqli_fetch_assoc($asset_per_site_result)){
							@$output .= '<tr>';
								@$output .= '<th colspan="3">'.$row['unit'].'</th>';
								@$output .= '<th colspan="3">'.$row['total'].'</th>';
								@$output .= '<th colspan="3">'.$row['shortage'].'</th>';
								@$output .= '</tr>';
						}
						
				}
				
				@$output .= '</thead>';
				@$output .= '</table>';

				

				$output .= '</table>';
						header("Content-Type: application/xls");
						header('Content-Disposition: attachment; filename="'.$file_name.'"');
						echo $output;
			}
			?>


			