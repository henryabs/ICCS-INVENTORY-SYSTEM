<section>
	<form action="../export/export.php" method="POST">
		<input type="submit" name="export_report" value="Export Summary" class="btn btn-xs btn-success">
	</form>
</section>

<section>
	<?php
	if(isset($_POST['export_report'])){
		
		$file_name = 'test.xls';
		$select_user = "SELECT * FROM `users_tbl`";
		$user_result = mysqli_query($conn,$select_user);
		$count = mysqli_num_rows($user_result);
		if($count > 0){
			

				@$output .= '<table border=1">
					<tr>
						<th style="background:red;">User id</th>
						<th>Full name</th>
						<th>Email</th>
					</tr>';

					while($row = mysqli_fetch_array($user_result)){

						$output .= '<tr>
							<td>'.$row["usr_id"].'</td>
							<td>'.$row["usr_full_name"].'</td>
							<td>'.$row["usr_email"].'</td>
						</tr>';
					}
				$output .= '</table>';
				header("Content-Type: application/xls");
				header('Content-Disposition: attachment; filename="'.$file_name.'"');
				echo $output;


		}
	}
	?>
</section>

<!--
../export/export.php"
-->

<?php
	$user = @$_SESSION['user'];
	$user_level = @$_SESSION['user_level'];
	if(isset($user)){
		//asset count
		$select_asset = "SELECT * FROM `asset_tbl`";
		$asset_result = mysqli_query($conn,$select_asset);
		$all_asset = mysqli_num_rows($asset_result);
		
		//working asset count
		$working = "SELECT * FROM `asset_tbl` WHERE `asst_sts_id`=1";
		$working = mysqli_query($conn,$working);
		$working = mysqli_num_rows($working);

		//partial defect asset count
		$partial = "SELECT * FROM `asset_tbl` WHERE `asst_sts_id`=2";
		$partial = mysqli_query($conn,$partial);
		$partial = mysqli_num_rows($partial);

		//defect asset count
		$defect = "SELECT * FROM `asset_tbl` WHERE `asst_sts_id`=3";
		$defect = mysqli_query($conn,$defect);
		$defect = mysqli_num_rows($defect);



		//get all unit from asset table
		$select_unit = "SELECT DISTINCT `asst_unit_code` FROM `asset_tbl`";
		$unit_result = mysqli_query($conn,$select_unit);
		while($unit = mysqli_fetch_assoc($unit_result)){
			$unit_code = $unit['asst_unit_code'];
			//get unit name
			$select_unit_name = "SELECT `unt_name` FROM `unit_tbl` WHERE `unt_code`='$unit_code'";
			$unit_name_result = mysqli_query($conn,$select_unit_name);
			$unit_name = mysqli_fetch_assoc($unit_name_result);
			//UNIT NAME
			$unit_name = $unit_name['unt_name'];

			//count per unit
			$select_unit_count = "SELECT `asst_id` FROM `asset_tbl` WHERE `asst_unit_code`='$unit_code'";
			$unit_count_result = mysqli_query($conn,$select_unit_count);
			//PER UNIT COUNT 
			$unit_count = mysqli_num_rows($unit_count_result);

			
			//get usable per unit
			$select_usable = "SELECT `asst_id` FROM `asset_tbl` WHERE `asst_unit_code`='$unit_code' AND (`asst_sts_id`=1 OR `asst_sts_id`=2)";
			$usable_result = mysqli_query($conn,$select_usable);
			//UNIT USABLE 
			$count_usable = mysqli_num_rows($usable_result);
			$percent = ($count_usable/$unit_count) * 100;
			//check if exist
			$select_report = "SELECT `label` FROM `report_tbl` WHERE `label`='$unit_name'";
			$report_result = mysqli_query($conn,$select_report);
			$count_report = mysqli_num_rows($report_result);
			if($count_report > 0){
				//update
				$update_report = "UPDATE `report_tbl` SET `y`='$percent' WHERE `label`='$unit_name'";
				mysqli_query($conn,$update_report);
			}else{
				//insert
				$insert_report = "INSERT INTO `report_tbl`(`label`,`y`)VALUES('$unit_name','$percent')";
				mysqli_query($conn,$insert_report);
			}

		}



		
		?>




		<section>
			  <div class="row">
			  	<div class="col-sm-2">
			  		<span style="background: #2a374c;padding: 5px;color: #FFF;border-radius:5px; ">
					  	<a href="./" class="breadcrumbtext">Home</a> »
					  	<a href="./?l=report" class="breadcrumbtext">Report</a>
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
				<div class="col-sm-2"></div>
				<div class="col-sm-2"></div>
				<div class="col-sm-2"></div>
				<div class="col-sm-2"></div>
				<div class="col-sm-4">
					<div class="form-group">
						<select class="form-control input-sm" name="site">
							<option>All assets</option>

						</select>
					</div>
				</div>
			</div>
		<section>
			<div class="row">
				<div class="col-sm-3">
					<div class="panel-group">
					    <div class="panel panel-default">
					      <div class="panel-heading" style="padding-top: 20px;padding-bottom: 20px;color: white;background: #6998B0;border-bottom: 1px solid #F7F7F7;padding:35px;font-size: 20px;text-align: center;"><strong><?php echo $all_asset; ?> Total assets</strong></div>
					      <div class="panel-body" style="padding-top: 5px;padding-bottom: 5px;color: white;background: #6998B0"><a href="#" style="color: white;">View List »</a></div>
					    </div>
					</div>
				</div>

				<div class="col-sm-3">
					<div class="panel-group">
					    <div class="panel panel-default">
					      <div class="panel-heading" style="padding-top: 20px;padding-bottom: 20px;color: white;background: #6ED2A5;border-bottom: 1px solid #F7F7F7;padding:35px;font-size: 20px;text-align: center;"><strong><?php echo $working; ?> Working</strong></div>
					      <div class="panel-body" style="padding-top: 5px;padding-bottom: 5px;color: white;background: #6ED2A5"><a href="#" style="color: white;">View List »</a></div>
					    </div>
					</div>
				</div>

				<div class="col-sm-3">
					<div class="panel-group">
					    <div class="panel panel-default">
					      <div class="panel-heading" style="padding-top: 20px;padding-bottom: 20px;color: white;background: #E0CF71;border-bottom: 1px solid #F7F7F7;padding:35px;font-size: 20px;text-align: center;"><strong><?php echo $partial; ?> Partial Defect</strong></div>
					      <div class="panel-body" style="padding-top: 5px;padding-bottom: 5px;color: white;background: #E0CF71"><a href="#" style="color: white;">View List »</a></div>
					    </div>
					</div>
				</div>

				<div class="col-sm-3">
					<div class="panel-group">
					    <div class="panel panel-default">
					      <div class="panel-heading" style="padding-top: 20px;padding-bottom: 20px;color: white;background: #D87C7A;border-bottom: 1px solid #F7F7F7;padding:35px;font-size: 20px;text-align: center;"><strong><?php echo $defect; ?> Defective</strong></div>
					      <div class="panel-body" style="padding-top: 5px;padding-bottom: 5px;color: white;background: #D87C7A"><a href="#" style="color: white;">View List »</a></div>
					    </div>
					</div>
				</div>

			</div>
		</section>
		
		<section>
			
		</section>
		
		<section>
			<a href="#">Export summary</a>
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