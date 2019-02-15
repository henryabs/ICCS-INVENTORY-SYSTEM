<?php
	$user = @$_SESSION['user'];
	$user_level = @$_SESSION['user_level'];
	if(isset($user) AND (($user_level == 2) OR ($user_level == 3) OR ($user_level == 4))){
		?>
		<section>
			  <div class="row">
			  	<div class="col-sm-4">
			  		<span style="background: #2a374c;padding: 5px;color: #FFF;border-radius:5px; ">
					  	<a href="./" class="breadcrumbtext">Home</a> »
					  	<a href="./?l=supplier" class="breadcrumbtext">Supplier</a> »
					  	<a href="./?l=addsupplier" class="breadcrumbtext">Add Supplier</a>
					</span>
			  	</div>
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
					<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class ="">
						
						<div class="form-group">
							<label for="unit">Store name:</label>
							<input type="text" class="form-control input-sm" name="store_name" placeholder="ex: Easy pc north edsa " autocomplete="off" value="<?php echo @$_POST['store_name'] ?>">
						</div>

						<div class="form-group">
							<label for="unit">Contact #:</label>
							<input type="text" class="form-control input-sm" name="contact_num" placeholder="ex: 09460000000" autocomplete="off" value="<?php echo @$_POST['contact_num'] ?>">
						</div>

						<div class="form-group">
							<label for="unit">Supplier's Email:</label>
							<input type="email" class="form-control input-sm" name="sup_email" placeholder="ex: easypc@testdomain.com" autocomplete="off" value="<?php echo @$_POST['sup_email'] ?>">
						</div>

						<div class="form-group">
							<label for="unit">Address / Location:</label>
							<textarea class="form-control input-sm" placeholder="35 North Ave, Project 6, Quezon City, 1105 Metro Manila" name="address"></textarea>
						</div>
						<input type="submit" class="btn btn-xs" name="spplr_submit" style="background: #FF851B;padding: 4px;color: #FFF;border-radius:5px; " value="Add Supplier +">
					</form>
					<br />
					<?php
					if(isset($_POST['spplr_submit'])){
						$store_name = $_POST['store_name'];
						$contact_num = $_POST['contact_num'];
						$sup_email = $_POST['sup_email'];
						$address = $_POST['address'];
						if(empty($store_name)){
							echo 'Store name field can\'t be empty.';
						}else{
							if(empty($contact_num)){
								echo 'Contact number field can\'t be empty.';
							}else{
								if(empty($sup_email)){
									echo 'Supplier\'s email can\'t be empty.';
								}else{
									if(empty($address)){
										echo 'Address can\'t be empty.';
									}else{
										//insert supplier
										$insert_supplier = "INSERT INTO `supplier_tbl` (`spplr_store`,`spplr_contact_num`,`spplr_email`,`spplr_address`)VALUES('$store_name','$contact_num','$sup_email','$address')";
										if(mysqli_query($conn,$insert_supplier)){
											echo 'Successfully added new supplier : <a href="./?l=supplier">'.$store_name.'</a>';
										}else{
											echo 'There is something wrong while executing the process!';
										}
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