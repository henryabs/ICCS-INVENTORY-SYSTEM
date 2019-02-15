<?php
	$user = @$_SESSION['user'];
	$user_level = @$_SESSION['user_level'];
	if(isset($user) AND (($user_level == 2) OR ($user_level == 3) OR ($user_level == 4))){
		?>
		<?php
			//Select all site

			$select_site = "SELECT `site_name` FROM `site_tbl`";
			$site_result = mysqli_query($conn,$select_site);
			while($site = mysqli_fetch_assoc($site_result)){
				$site_var = $site['site_name'];
				
				//select all unit from unit table
				$select_unit = "SELECT `unt_name`,`unt_code` FROM `unit_tbl`";
				$unit_result = mysqli_query($conn,$select_unit);
				while($unit = mysqli_fetch_assoc($unit_result)){
					$unit_var = $unit['unt_name'];
					//check if site and unit exist
					$check_data = "SELECT `id` FROM `total_per_site_tbl` WHERE `unit`='$unit_var' AND `site`='$site_var'";
					$data_result = mysqli_query($conn,$check_data);
					$count_data = mysqli_num_rows($data_result);
					if($count_data < 1){
						//insert
						$insert_report = "INSERT INTO `total_per_site_tbl` (`site`,`unit`,`total`)VALUES('','$site_var','$unit_var',0)";
						mysqli_query($conn,$insert_report);
						//echo 'inserted '.$site_var;
					}
					//echo '<br />';
					
					

				}

				
			}
		?>
		<section>
			  <div class="row">
			  	<div class="col-sm-2">
			  		<span style="background: #2a374c;padding: 5px;color: #FFF;border-radius:5px; ">
					  	<a href="./" class="breadcrumbtext">Home</a> »
					  	<a href="./?l=site" class="breadcrumbtext">Site</a>
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
			<span style="background: #FF851B;padding: 4px;color: #FFF;border-radius:5px; ">
			  	<a href="./?l=addsite" class="breadcrumbtext">Add Site +</a>
			</span>
		</section>
		<section>
	      <div class="row">
	        <div class="col-sm-12"><div class="tbl-header">
	                  <table cellpadding="0" cellspacing="0" border="0">
	                    <thead>
	                      <tr>
	                            
	                            <th style="background: #2a374c">Site</th>
	                            <th style="background: #2a374c">Unit</th>
	                            <th style="background: #2a374c">Total per site</th>
	                            

	                      </tr>
	                    </thead>
	                  </table>
	                </div>
	              <div class="tbl-content">
	                  <table cellpadding="0" cellspacing="0" border="0">
	                    <tbody>
	                        <?php
	                        $select_per_site = "SELECT * FROM `total_per_site_tbl`";
							$per_site_result = mysqli_query($conn,$select_per_site);
							while($per_site = mysqli_fetch_assoc($per_site_result)){
								echo '<tr>
										<td>'.$per_site['site'].'</td>
										<td>'.$per_site['unit'].'</td>
										<td>'.$per_site['total'].'</td>
										
									  </tr>';
							}
	                        ?>
	                    </tbody>
	                  </table>
	            </div></div>
	            
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
	$conn->close();
?>