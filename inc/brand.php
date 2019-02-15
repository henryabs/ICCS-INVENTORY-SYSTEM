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
					  	<a href="./?l=brand" class="breadcrumbtext">Brand</a>
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
			  	<a href="./?l=addbrand" class="breadcrumbtext">Add Brand +</a>
			</span>
		</section>
		<section>
	      <div class="row">
	        <div class="col-sm-12"><div class="tbl-header">
	                  <table cellpadding="0" cellspacing="0" border="0">
	                    <thead>
	                      <tr>
	                            <th style="background: #2a374c">Brand name</th>
	                            <th style="background: #2a374c">Unit name</th>
	                            <th style="background: #2a374c">Created By</th>

	                      </tr>
	                    </thead>
	                  </table>
	                </div>
	              <div class="tbl-content">
	                  <table cellpadding="0" cellspacing="0" border="0">
	                    <tbody>
	                        <?php
	                        $select_brand = "SELECT * FROM `brand_tbl`";
							$brand_result = mysqli_query($conn,$select_brand);
							while($row = mysqli_fetch_assoc($brand_result)){
								echo '<tr>';
								echo '<td>'.$row['brnd_name'].'</td>';
								$unit_id = $row['unt_id'];
								$select_unit = "SELECT `unt_name` FROM `unit_tbl` WHERE `unt_id`='$unit_id'";
								$unit_result = mysqli_query($conn,$select_unit);
								$unit = mysqli_fetch_assoc($unit_result);
								echo '<td>'.$unit['unt_name'].'</td>';
								$user_id = $row['usr_id'];
								//select user created
								$select_user = "SELECT `usr_full_name` FROM `users_tbl` WHERE `usr_id`='$user_id'";
								$user_result = mysqli_query($conn,$select_user);
								$user = mysqli_fetch_assoc($user_result);
								echo '<td>'.$user['usr_full_name'].'</td>';
								echo '</tr>';
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
