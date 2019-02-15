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
					  	<a href="./?l=unit" class="breadcrumbtext">Unit</a>
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
			  	<a href="./?l=addunit" class="breadcrumbtext btn btn-xs" >Add Unit +</a>
			</span>
		</section>
		<section>
	      <div class="row">
	        <div class="col-sm-12"><div class="tbl-header">
	                  <table cellpadding="0" cellspacing="0" border="0">
	                    <thead>
	                      <tr>
	                            <th style="background: #2a374c">Unit</th>
	                            <th style="background: #2a374c">Unit Code</th>
	                            <th style="background: #2a374c">Created By</th>

	                      </tr>
	                    </thead>
	                  </table>
	                </div>
	              <div class="tbl-content">
	                  <table cellpadding="0" cellspacing="0" border="0">
	                    <tbody>
	                        <?php
	                        $sql = "SELECT * FROM `unit_tbl`";
							$result = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_assoc($result)){
								$id = $row['usr_id'];
								$select_user = "SELECT * FROM `users_tbl` WHERE `usr_id`='$id'";
				                          $res = mysqli_query($conn,$select_user);
				                          $ro = mysqli_fetch_assoc($res);
				                echo '
				                		<tr>
				                          <td>'.$row['unt_name'].'</td>
				                          <td>'.$row['unt_code'].'</td>
				                          <td>'.$ro['usr_full_name'].'</td>
				                        </tr>
				                	 ';
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
