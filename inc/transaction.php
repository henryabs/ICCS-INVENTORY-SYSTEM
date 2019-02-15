<section>
			  <div class="row">
			  	<div class="col-sm-2">
			  		<span style="background: #2a374c;padding: 5px;color: #FFF;border-radius:5px;">
					  	<a href="./" class="breadcrumbtext">Home</a> »
					  	<a href="./?l=transaction" class="breadcrumbtext">Transaction</a>
					</span>
			  	</div>
			  	<div class="col-sm-2"></div>
			  	<div class="col-sm-2"></div>
			  	<div class="col-sm-2"></div>
			  	<div class="col-sm-2"></div>
			  	<div class="col-sm-2">
			  	    <!--
					<input type="text" placeholder="HASH,ITEM CODE,ETC..." class="form-control input-sm" name="searchbox" id="searchbox" style="height: 20px;" value="<?php echo @$_SESSION['asset_q'] ?>">
					-->
			  	</div>
		</div>
		</section>
<section>
	<?php
	    //select latest hash
	    if(isset($_GET['hash'])){
	        if(empty($_GET['hash'])){
	        $select_hash = "SELECT * FROM `transaction` ORDER BY `id` DESC LIMIT 1";    
	        }else{

	           $hash = $_GET['hash'];
	           if($hash == 'Genesis Block'){
	           		echo '<script>window.location.href = "./?l=transaction";</script>';
	           }
	           $select_hash = "SELECT * FROM `transaction` WHERE `hash`='$hash' ORDER BY `id` LIMIT 1"; 
	        }
	    }else{
	        $select_hash = "SELECT * FROM `transaction` ORDER BY `id` DESC LIMIT 1";
	    }
	    
	    
	    $hash_result = mysqli_query($conn,$select_hash);
	    $hash = mysqli_fetch_assoc($hash_result);
	    $previous_hash = $hash['previous_block'];
	    $current_hash = $hash['hash'];
	    $item_code = $hash['item_code'];
	    $status_id = $hash['sts_id'];
	    //Get status mark
	    $select_status = "SELECT `sts_mark`,`sts_color` FROM `status_tbl` WHERE `sts_id`='$status_id'";
	    $status_result = mysqli_query($conn,$select_status);
	    $status = mysqli_fetch_assoc($status_result);


	    //get color of action
	    $act = $hash['action'];
	    $select_col = "SELECT `color` FROM `chain_action` WHERE `action`='$act'";
	    $col_result = mysqli_query($conn,$select_col);
	    $col = mysqli_fetch_assoc($col_result);




	  ?>
	<div class="row">
		<div class="col-sm-6">
			<ul class="list-group">
			  <li class="list-group-item" style="background: #2a374c;color:white;">Summary</li>
			  <li class="list-group-item">Item Code : <a href="/?l=item&code=<?php echo $item_code;?>"><?php echo $item_code; ?></a></li>
			  <li class="list-group-item">Action : <a href="#"><span class="label " style="background: <?php echo $col['color'];?>;color:white;"><?php echo $hash['action']; ?></span></a></li>
			  <li class="list-group-item">Brand : <a href="#"><?php echo $hash['brand_name']; ?></a></li>
			  <li class="list-group-item">Model : <a href="#"><?php echo $hash['model_name']; ?></a></li>
			  <li class="list-group-item">Date Modify : <a href="#"><?php echo $hash['date_modify']; ?></a></li>
			  <li class="list-group-item">Time Modify : <a href="#"><?php echo $hash['time_modify']; ?></a></li>
			  <li class="list-group-item">Block Author : <a href="#"><?php echo $hash['modify_by']; ?></a></li>
			  <li class="list-group-item">Status : <a href="#"><span class="label label-<?php echo $status['sts_color']; ?>"><?php echo $status['sts_mark']; ?></span></a></li>
			  
			</ul>
		</div>
		<div class="col-sm-6">
			
			<ul class="list-group">
			  <?php
			  //Get Supplier
			  $select_supplier = "SELECT * FROM `asset_tbl` WHERE `asst_item_code`='$item_code'";
			  $supplier_result = mysqli_query($conn,$select_supplier);
			  $supplier_id = mysqli_fetch_assoc($supplier_result);
			  $supplier_id = $supplier_id['asst_spplr_id'];
			  
			  //Get supplier
			  $supplier = "SELECT `spplr_store` FROM `supplier_tbl` WHERE `spplr_id`='$supplier_id'";
			  $supplier_store = mysqli_query($conn,$supplier);
			  $supplier_store = mysqli_fetch_assoc($supplier_store);
			  $supplier_store = $supplier_store['spplr_store'];


			  //Get location
			  $select_location = "SELECT * FROM `transaction` WHERE `hash`='$current_hash'";
			  $location_result = mysqli_query($conn,$select_location);
			  $tag = mysqli_fetch_assoc($location_result);
			  $site = $tag['site_name'];
			  $station = $tag['location'];
			  $note = $tag['note'];
			  ?>



			  <li class="list-group-item" style="background: #2a374c;color:white;">Supplier and Workstation Information</li>
			  <li class="list-group-item" style="text-align:left;white-space: nowrap;width:100%;overflow: hidden;text-overflow: ellipsis;">Supplier : <a  href=""><?php echo $supplier_store; ?></a></li>
			  <li class="list-group-item" style="text-align:left;white-space: nowrap;width:100%;overflow: hidden;text-overflow: ellipsis;">Site : <a href=""><?php echo $site ;?></a></li>
			  <li class="list-group-item" style="text-align:left;white-space: nowrap;width:100%;overflow: hidden;text-overflow: ellipsis;">Station : <a href=""><?php echo $station; ?></a></li>
			  <li class="list-group-item" style="text-align:left;white-space: nowrap;width:100%;overflow: hidden;text-overflow: ellipsis;">Note : <a href=""><?php echo $note; ?></a></li>
			  
			</ul>

			<ul class="list-group">
			  
			  <li class="list-group-item" style="background: #2a374c;color:white;">Hashes</li>
			  <li class="list-group-item" style="text-align:left;white-space: nowrap;width:100%;overflow: hidden;text-overflow: ellipsis;">Hash : <a  href="./?l=transaction&hash=<?php echo $current_hash;?>"><?php echo $current_hash; ?></a></li>
			  <li class="list-group-item" style="text-align:left;white-space: nowrap;width:100%;overflow: hidden;text-overflow: ellipsis;">Previous Block : <a href="./?l=transaction&hash=<?php echo $previous_hash;?>"><?php echo $previous_hash; ?></a></li>
			  
			</ul>
		</div>
	</div>
	
	
	<div class="row">
		<div class="col-sm-12">
			<ul class="list-group">
			  <li class="list-group-item" style="background: #2a374c;color:white;">Transaction(s)</li>
			  <section>
			  <?php
			  $select_transaction = "SELECT `action`,`date_modify`,`time_modify`,`hash`,`previous_block` FROM `transaction` ORDER BY `id` DESC LIMIT 10";
			  $transaction_result = mysqli_query($conn,$select_transaction);
			  while($transaction = mysqli_fetch_assoc($transaction_result)){
				$action = $transaction['action'];
				//select color
				$select_color = "SELECT `color` FROM `chain_action` WHERE `action`='$action'";
				$color_result = mysqli_query($conn,$select_color);
				$color = mysqli_fetch_assoc($color_result);
				$hash = $transaction['hash'];
				//select transaction changes
				$select_changes = "SELECT `output` FROM `transaction_changes` WHERE `hash`='$hash'";
				$changes_result = mysqli_query($conn,$select_changes);
				while($row = mysqli_fetch_assoc($changes_result)){
					echo '';
				}

					echo '<br />';
			  	  echo '<div class="row" style="background:#fff">
            			      

            			      


            			      <div class="col-sm-4"><a style="background:">
            			      		<li class="" style="text-align:center;white-space: nowrap;width:100%;overflow: hidden;text-overflow: ellipsis;"><a href="./?l=transaction&hash='.$transaction['hash'].'">'.$transaction['hash'].'</a></div>

							  <div class="col-sm-1" style="text-align:center;color:'.$color['color'].';"></a> <span>'.$transaction['action'].'</span></div>

							  <div class="col-sm-4"></div>

							  <div class="col-sm-3"><a href="">'.$transaction['date_modify'].'  '.$transaction['time_modify'].'</a></div>
            			  </div>

            			  <br />



            			  <div class="row">
            			      

            			      


            			      <div class="col-sm-4"><a style="background:">
            			      		<li class="" style="text-align:center;white-space: nowrap;width:100%;overflow: hidden;text-overflow: ellipsis;"><a href="./?l=transaction&hash='.$transaction['hash'].'">';

            			      		?>

            			      			<?php
            			      			//select transaction changes
											$select_changes = "SELECT `input` FROM `transaction_changes` WHERE `hash`='$hash'";
											$changes_result = mysqli_query($conn,$select_changes);
											while($row = mysqli_fetch_assoc($changes_result)){
												echo ucfirst($row['input']).'<br />';
											}

            			      			?>

            			      		<?php
            			      		echo '



            			      		</a></div>

							  <div class="col-sm-1" style="text-align:center;color:'.$color['color'].';"></a> <span> » </span></div>

							  <div class="col-sm-4"><a style="background:">
            			      		<li class="" style="text-align:center;white-space: nowrap;width:100%;overflow: hidden;text-overflow: ellipsis;"><a href="#'.$transaction['previous_block'].'">';

            			      		?>

            			      			<?php
            			      			//select transaction changes
											$select_changes = "SELECT `output` FROM `transaction_changes` WHERE `hash`='$hash'";
											$changes_result = mysqli_query($conn,$select_changes);
											while($row = mysqli_fetch_assoc($changes_result)){
												echo ucfirst($row['output']).'<br />';
											}

            			      			?>

            			      		<?php
            			      		echo '

            			      		</a></div>
            			      		
							  <div class="col-sm-3"></div>
            			  </div>
            			  <hr>';
			  }

			  ?>
			  
			  
			</ul>
		</div>
	</div>
</section>
</section>