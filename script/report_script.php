<?php
include '../core/internal_connect.php';
if(isset($_GET['site'])){
	if($_GET['site'] == 'All assets'){

		//get asset count per site
		$select_total = "SELECT `asst_id` FROM `asset_tbl`";
		$total_count_result = mysqli_query($conn,$select_total);
		$total_count = mysqli_num_rows($total_count_result);

		//get working asset count per site
		$select_working = "SELECT `asst_id` FROM `asset_tbl` WHERE `asst_sts_id`= 1";
		$working_result = mysqli_query($conn,$select_working);
		$total_working = mysqli_num_rows($working_result);

		//get partial asset count per site
		$select_partial = "SELECT `asst_id` FROM `asset_tbl` WHERE `asst_sts_id`= 2";
		$partial_result = mysqli_query($conn,$select_partial);
		$total_partial = mysqli_num_rows($partial_result);

		//get defective asset count per site
		$select_defective = "SELECT `asst_id` FROM `asset_tbl` WHERE `asst_sts_id`= 3";
		$defective_result = mysqli_query($conn,$select_defective);
		$total_defective = mysqli_num_rows($defective_result);

	}else{
		$site = $_GET['site'];
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
	}
		
}


?>

			
			<div class="row">
				<div class="col-sm-3">
					<div class="panel-group">
					    <div class="panel panel-default">
					      <div class="panel-heading" style="padding-top: 20px;padding-bottom: 20px;color: white;background: #6998B0;border-bottom: 1px solid #F7F7F7;padding:35px;font-size: 20px;text-align: center;"><strong><?php echo $total_count; ?> Total assets</strong></div>
					      <div class="panel-body" style="padding-top: 5px;padding-bottom: 5px;color: white;background: #6998B0"><a href="#" style="color: white;">View List »</a></div>
					    </div>
					</div>
				</div>

				<div class="col-sm-3">
					<div class="panel-group">
					    <div class="panel panel-default">
					      <div class="panel-heading" style="padding-top: 20px;padding-bottom: 20px;color: white;background: #6ED2A5;border-bottom: 1px solid #F7F7F7;padding:35px;font-size: 20px;text-align: center;"><strong><?php echo $total_working; ?> Working</strong></div>
					      <div class="panel-body" style="padding-top: 5px;padding-bottom: 5px;color: white;background: #6ED2A5"><a href="#" style="color: white;">View List »</a></div>
					    </div>
					</div>
				</div>

				<div class="col-sm-3">
					<div class="panel-group">
					    <div class="panel panel-default">
					      <div class="panel-heading" style="padding-top: 20px;padding-bottom: 20px;color: white;background: #E0CF71;border-bottom: 1px solid #F7F7F7;padding:35px;font-size: 20px;text-align: center;"><strong><?php echo $total_partial; ?> Partial Defect</strong></div>
					      <div class="panel-body" style="padding-top: 5px;padding-bottom: 5px;color: white;background: #E0CF71"><a href="#" style="color: white;">View List »</a></div>
					    </div>
					</div>
				</div>

				<div class="col-sm-3">
					<div class="panel-group">
					    <div class="panel panel-default">
					      <div class="panel-heading" style="padding-top: 20px;padding-bottom: 20px;color: white;background: #D87C7A;border-bottom: 1px solid #F7F7F7;padding:35px;font-size: 20px;text-align: center;"><strong><?php echo $total_defective; ?> Defective</strong></div>
					      <div class="panel-body" style="padding-top: 5px;padding-bottom: 5px;color: white;background: #D87C7A"><a href="#" style="color: white;">View List »</a></div>
					    </div>
					</div>
				</div>

			</div>
		

		<section>
			<?php
				/*
				if($_GET['site'] == 'All assets'){
					$site = 'All site';
					
				}else{
					$site = $_GET['site'];
					
				}
				*/
				
				//
				$get_all_site = "SELECT `site_name` FROM `site_tbl`";
				$all_site_result = mysqli_query($conn,$get_all_site);
				while($all_site = mysqli_fetch_assoc($all_site_result)){
					$site = $all_site['site_name'];
					
				}

				//

			?>



		</section>
