<?php
	$user = @$_SESSION['user'];
	$user_level = @$_SESSION['user_level'];
	if(isset($user) AND (($user_level == 2) OR ($user_level == 3) OR ($user_level == 4))){
		?>
		
		<section>
			  <div class="row">
			  	<div class="col-sm-2">
			  		<span style="background: #2a374c;padding: 5px;color: #FFF;border-radius:5px; ">
					  	<a href="./" class="breadcrumbtext">Home</a> »
					  	<a href="./?l=site" class="breadcrumbtext">Site</a> »
					  	<a href="./?l=addsite" class="breadcrumbtext">Add Site</a>
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
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" style="padding:10px;">
						<div class="form-group">
							<label for="text">Site name:</label>
							<input type="text" class="form-control input-sm" autocomplete="off" name="site_name" placeholder="ex: Prestige 1110" value="<?php echo @$_POST['site_name'] ?>" >
						</div>

						<div class="form-group">
							<label for="text">Unit:</label>
							<input type="text" class="form-control input-sm"  name="unit" placeholder="ex: 1110">
						</div>
						
						<input type="submit" class="btn btn-xs" name="addsite_submit" value="Add Site" style="background: #FF851B;padding: 4px;color: #FFF;border-radius:5px; ">
					</form>
					<br />
					<?php
					if(isset($_POST['addsite_submit'])){
						$site_name = $_POST['site_name'];
						$site_unit = $_POST['unit'];
						//check if empty
						if(empty($site_name)){
							echo 'Site name field can\'t be empty.';
						}else{
							if(empty($site_unit)){
								echo 'Site unit field can\'t be empty.';
							}else{
								//check if site exists
								$select_site = "SELECT `site_id` FROM `site_tbl` WHERE `site_name`='$site_name'";
								$site_result = mysqli_query($conn,$select_site);
								$count_site = mysqli_num_rows($site_result);
								if($count_site > 0){
									echo 'Site name found on system.';
								}else{
									//insert site
									$insert_site = "INSERT INTO `site_tbl` (`site_name`,`location`,`total_station`)VALUES('$site_name','$site_unit',0)";
									if(mysqli_query($conn,$insert_site)){
										echo 'Added new site : <a href="./?l=site">'.$site_name.'</a>';
									}else{
										echo 'There is somethig wrong in executing process.';
									}
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