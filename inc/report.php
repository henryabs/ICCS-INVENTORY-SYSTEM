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

		<?php
		
		//get site
		$select_site = "SELECT `site_name` FROM `site_tbl`";
		$site_result = mysqli_query($conn,$select_site);
		while($site = mysqli_fetch_assoc($site_result)){
		$site = $site['site_name'];
			//get asset count per site
			$select_total = "SELECT `asst_id` FROM `asset_tbl` WHERE `asst_site_name`='$site'";
			$total_count_result = mysqli_query($conn,$select_total);
			$total_count = mysqli_num_rows($total_count_result);

			//get working asset count per site
			$select_working = "SELECT `asst_id` FROM `asset_tbl` WHERE `asst_sts_id`= 1 AND `asst_site_name`='$site'";
			$working_result = mysqli_query($conn,$select_working);

			$total_working = mysqli_num_rows($working_result);

			//get partial asset count per site
			$select_partial = "SELECT `asst_id` FROM `asset_tbl` WHERE `asst_sts_id`= 2 AND `asst_site_name`='$site'";
			$partial_result = mysqli_query($conn,$select_partial);
			$total_partial = mysqli_num_rows($partial_result);

			//get defective asset count per site
			$select_defective = "SELECT `asst_id` FROM `asset_tbl` WHERE `asst_sts_id`= 3 AND `asst_site_name`='$site'";
			$defective_result = mysqli_query($conn,$select_defective);
			$total_defective = mysqli_num_rows($defective_result);
			
			//select if site exists
			$count_site = "SELECT `rpt_site` FROM `asset_report_tbl` WHERE `rpt_site`='$site'";
			$count_site_result = mysqli_query($conn,$count_site);
			$count_site = mysqli_num_rows($count_site_result);
			if($count_site > 0){
				$update_report = "UPDATE `asset_report_tbl` SET `rpt_total`='$total_count',`rpt_working`='$total_working',`rpt_partial`='$total_partial',`rpt_defective`='$total_defective',`rpt_date`='$date',`rpt_update_time`='$time' WHERE `rpt_site`='$site'";
				mysqli_query($conn,$update_report);
			}else{
				$insert_report = "INSERT INTO `asset_report_tbl` (`rpt_site`,`rpt_total`,`rpt_working`,`rpt_partial`,`rpt_defective`,`rpt_date`,`rpt_update_time`)VALUES('$site','$total_count','$total_working','$total_partial','$total_defective','$date','$time')";
				mysqli_query($conn,$insert_report);
			}
		}
	
		?>
		<section>
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-2"></div>
				<div class="col-sm-2"></div>
				<div class="col-sm-2"></div>
				<div class="col-sm-4">
					<div class="form-group">
						<select class="form-control input-sm" name="site" id="site">
							<option>All assets</option>
							<?php
							//select all site
							$select_site = "SELECT * FROM `site_tbl`";
							$site_result = mysqli_query($conn,$select_site);
								while($site = mysqli_fetch_assoc($site_result)){
									echo '<option>'.$site['site_name'].'</option>';
								}

							?>
						</select>

						<script type="text/javascript">
							


							$(document).ready(function(){
								//AUTOMATIC
								$value = document.getElementById('site').value;
								$.ajax({url:'./script/report_script.php?site='+$value,success:function(result){
							        $('#test').html(result);
							        document.cookie="get_site="+$value;
									//$("#bar").load(location.href + " #bar");
							    }});

							    //END AUTOMATIC

								//CLICK
								$('#site').on('change', function() {
								  $value = this.value;	  
								  $.ajax({url:'./script/report_script.php?site='+$value,success:function(result){
									$('#test').html(result);
									document.cookie="get_site="+$value;
									//$("#bar").load(location.href + " #bar");
									
									}});
								})
								//END CLICK

							})

						</script>
					
						
						
					</div>
				</div>
			</div>



		<div id="test">
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
		</div>

		<section>
			<?php   
					/*
					//select all site
					$select_all_site = "SELECT `site_name` FROM `site_tbl`";
					$all_site_result = mysqli_query($conn,$select_all_site);
					while($all_site = mysqli_fetch_assoc($all_site_result)){

						$site = $all_site['site_name'];
						
						//get all unit from asset table where site = site variable
						$select_unit = "SELECT DISTINCT `asst_unit_code` FROM `asset_tbl` WHERE `asst_site_name`='$site'";
						$unit_result = mysqli_query($conn,$select_unit);
						
						while($unit = mysqli_fetch_assoc($unit_result)){
							
							$unit_code = $unit['asst_unit_code'];
							
							//get unit name
							$select_unit_name = "SELECT  `unt_name` FROM `unit_tbl` WHERE `unt_code`='$unit_code'";
							$unit_name_result = mysqli_query($conn,$select_unit_name);
							$unit_name = mysqli_fetch_assoc($unit_name_result);
							//UNIT NAME
							$unit_name = $unit_name['unt_name'];
							
							//count per unit
							$select_unit_count = "SELECT `asst_id` FROM `asset_tbl` WHERE `asst_unit_code`='$unit_code' AND `asst_site_name`='$site'";
							$unit_count_result = mysqli_query($conn,$select_unit_count);
							//PER UNIT COUNT 
							$unit_count = mysqli_num_rows($unit_count_result);
							
							////check if exist
							$select_report = "SELECT `label` FROM `report_tbl` WHERE `label`='$unit_name' AND `site`='$site'";
							$report_result = mysqli_query($conn,$select_report);
							$count_report = mysqli_num_rows($report_result);
							if($count_report > 0){
								//Update
								$update_query = "UPDATE `report_tbl` SET `y`='$unit_count' WHERE `label`='$unit_name' AND `site`='$site'";
								mysqli_query($conn,$update_query);
							}else{
								//insert
								$insert_query = "INSERT INTO `report_tbl`(`id`,`label`,`y`,`site`)VALUES('','$unit_name','$unit_count','$site')";
								mysqli_query($conn,$insert_query);
							}

							
						}
					}

					
					*/
					$site = 'All site';
					//get all unit from asset table where site = site variable
					$select_unit = "SELECT DISTINCT `asst_unit_code` FROM `asset_tbl`";
					$unit_result = mysqli_query($conn,$select_unit);
					
					while($unit = mysqli_fetch_assoc($unit_result)){
						
						$unit_code = $unit['asst_unit_code'];
						
						//get unit name
						$select_unit_name = "SELECT DISTINCT `unt_name` FROM `unit_tbl` WHERE `unt_code`='$unit_code'";
						$unit_name_result = mysqli_query($conn,$select_unit_name);
						$unit_name = mysqli_fetch_assoc($unit_name_result);
						//UNIT NAME
						$unit_name = $unit_name['unt_name'];
						
						//count per unit
						$select_unit_count = "SELECT `asst_id` FROM `asset_tbl` WHERE `asst_unit_code`='$unit_code'";
						$unit_count_result = mysqli_query($conn,$select_unit_count);
						//PER UNIT COUNT 
						$unit_count = mysqli_num_rows($unit_count_result);
						
						////check if exist
						$select_report = "SELECT `label` FROM `report_tbl` WHERE `label`='$unit_name'";
						$report_result = mysqli_query($conn,$select_report);
						$count_report = mysqli_num_rows($report_result);
						if($count_report > 0){
							//Update
							$update_query = "UPDATE `report_tbl` SET `y`='$unit_count' WHERE `label`='$unit_name'";
							mysqli_query($conn,$update_query);
						}else{
							//insert
							$insert_query = "INSERT INTO `report_tbl`(`label`,`y`,`site`)VALUES('$unit_name','$unit_count','$site')";
							mysqli_query($conn,$insert_query);
						}

						
					}
					

					
					
			?>
		</section>

		<div id="bar">

			<?php 
			    /*
			    $get_site = $_COOKIE['get_site'];
			    if($get_site == 'All assets'){
			    	
			    }else{
			    	$site_value = $get_site;
			    }
			    */
			    $site_value = 'All site';
			    $site_value;

			    //setting array for bar chart
				$rpt = "SELECT * FROM `report_tbl` WHERE `site`='$site_value'";
				$rpt_result = mysqli_query($conn,$rpt);
				if(mysqli_num_rows($rpt_result) > 0){
					while($row = mysqli_fetch_assoc($rpt_result)){
						$dataPoints[] = $row;
					}
				}

			?>
			<script>
			window.onload = function () {
			 
			var chart = new CanvasJS.Chart("chartContainer", {
				animationEnabled: true,
				theme: "light2",
				title: {
					text: "Total assets from all ICCS Site"
				},
				axisY: {
					suffix: "",
					scaleBreaks: {
						autoCalculate: true
					}
				},
				data: [{
					type: "column",
					yValueFormatString: "#,##0\" pcs.\"",
					indexLabel: "{y}",
					indexLabelPlacement: "inside",
					indexLabelFontColor: "white",
					dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
				}]
			});
			chart.render();
			 
			}
			</script>
			<div id="chartContainer" style="height: 500px; width: 100%;"></div>
			<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
		</div>
		


		<!--EXPORT REPORT-->
		
			<form action="../export/export.php" method="POST">
				<input type="submit" name="export_report" value="Export Summary" class="btn btn-xs btn-success">
			</form>
		

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
		<!--END EXPORT REPORT-->
		<section>

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
	$conn->close();
?>