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
					  	<a href="./?l=supplier" class="breadcrumbtext">Supplier</a>
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
			  	<a href="./?l=addsupplier" class="breadcrumbtext">Add Supplier +</a>
			</span>
		</section>
		<section>
	      <div class="row">
	        <div class="col-sm-12"><div class="tbl-header">
	                  <table cellpadding="0" cellspacing="0" border="0">
	                    <thead>
	                      <tr>
	                            
	                            <th style="background: #2a374c">Store</th>
	                            <th style="background: #2a374c">Contact #</th>
	                            <th style="background: #2a374c">Email</th>
	                            <th style="background: #2a374c">Address</th>

	                      </tr>
	                    </thead>
	                  </table>
	                </div>
	              <div class="tbl-content">
	                  <table cellpadding="0" cellspacing="0" border="0">
	                    <tbody>
	                        <?php
	                        $select_supplier = "SELECT * FROM `supplier_tbl`";
							$supplier_result = mysqli_query($conn,$select_supplier);
							while($supplier = mysqli_fetch_assoc($supplier_result)){
								echo '<tr>
										<td>'.$supplier['spplr_store'].'</td>
										<td>'.$supplier['spplr_contact_num'].'</td>
										<td>'.$supplier['spplr_email'].'</td>
										<td>'.$supplier['spplr_address'].'</td>
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
