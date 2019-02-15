<section>
	  <div class="row">
	  	<div class="col-sm-4">
	  		<span style="background: #2a374c;padding: 5px;color: #FFF;border-radius:5px; ">
			  	<a href="./" class="breadcrumbtext">Home</a> »
			  	<a href="./?l=request" class="breadcrumbtext">Request</a>
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
			<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
				<label for="req_title" class="control-label">Unit</label>
				<select name="req_title" class="form-control" id="u">
					<?php
					$select_asset = "SELECT DISTINCT `asst_unit_code` FROM `asset_tbl`";
					$asset_result = mysqli_query($conn,$select_asset);
					while($row = mysqli_fetch_assoc($asset_result)){
						$unit_code = $row['asst_unit_code'];
						//echo '<option>'.$row['asst_unit_code'].'</option>';
						$select_unit = "SELECT `unt_name` FROM `unit_tbl` WHERE `unt_code`='$unit_code'";
						$unit_result = mysqli_query($conn,$select_unit);
						$r = mysqli_fetch_assoc($unit_result);
						echo '<option>'.$r['unt_name'].'</option>';
					}

					?>
					


				</select>

				<label for="req_title" class="control-label">Reason</label>
				<textarea name="req_description" class="form-control" style="height: 200px"></textarea>
				<br>
				<input type="submit" name="req_submit" value="Send Request" class="btn btn-xs" style="background: #FF851B;padding: 4px;color: #FFF;border-radius:5px; ">
			</form>
			<br/>
			<?php
	if(isset($_POST['req_submit'])){
		$title = $_POST['req_title'];
		$hdr = $_POST['req_title'];
		$for = "request";
		$description = $_POST['req_description'];
		$author = $_SESSION['id'];
		$date;
		$time;
		if(empty($description)){
			echo "Description field can't be empty!";
		}else{
			$select_user = "SELECT `usr_full_name` FROM `users_tbl` WHERE `usr_id`='$author'";
			$user_result = mysqli_query($conn,$select_user);
			$row = mysqli_fetch_assoc($user_result);
			 $author = $row['usr_full_name'];
			 $title = $author.' '.$for .' '.$title;
			 $check = "SELECT * FROM `request_tbl` WHERE `req_title`='$title' AND `req_created_time`='$time'";
			 $check_result = mysqli_query($conn,$check);
			 $count = mysqli_num_rows($check_result);
			 if($count > 0){
			 	echo 'error';
			 }else{
			 	$insert_request = "INSERT INTO `request_tbl` (`unit_code`,`req_title`,`req_description`,`req_created_at`,`req_created_time`,`req_author`)VALUES('$hdr','$title','$description','$date','$time','$author')";
			 	if(mysqli_query($conn,$insert_request)){
			 		echo 'Your request sent!<a href="./?l=thread&title='.$title.'&time='.$time.'"> Go to thread request.</a>';
			 	}else{
			 		echo 'error';
			 	}
			 }
			 /*
			 $insert_request = "INSERT INTO `request_tbl` (`req_id`,`req_title`,`req_description`,`req_created_by`,`req_created_at`,`req_created_time`,`req_seen`)VALUES('','$title','$description','$author','$date','$time','false')";
			 	if(mysqli_query($conn,$insert_request)){
			 		echo 'Your request sent!<a href="./?l=thread&title='.$title.'&time='.$time.'"> Go to thread request.</a>';
			 	}else{
			 		echo 'error';
			 	}
			 	
			 */	

		}

	}
?>
		</div>

		<div class="col-sm-4"></div>
	</div>

</section>