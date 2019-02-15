<section>
	  <div class="row">
	  	<div class="col-sm-2">
	  		<span style="background: #2a374c;padding: 5px;color: #FFF;border-radius:5px; ">
			  	<a href="./" class="breadcrumbtext">Home</a> »
			  	<a href="#" class="breadcrumbtext">Thread</a>
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
		@$title = $_GET['title'];
		//$title = mysql_real_escape_string($conn,$title);
		@$time = $_GET['time'];
		//$time = mysql_real_escape_string($conn,$time);
		$select_thread = "SELECT * FROM `request_tbl` WHERE `req_title`='$title' AND `req_created_time`='$time'";
		$thread_result = mysqli_query($conn,$select_thread);
		$row = mysqli_fetch_assoc($thread_result);
		$post_id = $row['req_id'];
		$count_thread = mysqli_num_rows($thread_result);
		if($count_thread < 1){
			echo 'page you are looking for not found';
		}else{
			?>
			<section>
			<div class="row" style="">
				<div class="col-sm-12">

					<ul class="list-group">
					  <li class="list-group-item" style="background: #384155;?>;color:white;padding-top: 20px;padding-bottom: 20px;">Post : <?php echo $row['req_title'] ?></li>
					  <li class="list-group-item"><?php echo $row['req_description'] ?></li>
					</ul>

					<?php
						$select_reply = "SELECT * FROM `reply_tbl` WHERE `rep_post`='$post_id'";
						$reply_result = mysqli_query($conn,$select_reply);
						while($rep = mysqli_fetch_assoc($reply_result)){
							?>
								<ul class="list-group">
								  <li class="list-group-item" style="background: #2a374c;color:white;">Reply : <?php echo $rep['rep_author'].' on '.$rep['rep_created_at'].' '.$rep['rep_created_time']?></li>
								  <li class="list-group-item"><?php echo $rep['rep_body']?></li>
								</ul>
							<?php
						}
					?>

					

				</div>
			</div>
		</section>
		<section>
			<a href="./?l=reply&post=<?php echo $post_id; ?>" class="btn btn-xs" style="background: #FF851B;padding: 4px;color: #FFF;border-radius:5px; ">Post Reply</a>
		</section>
			<?php
		}
		?>