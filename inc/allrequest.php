<?php
	$user = @$_SESSION['user'];
	$user_level = @$_SESSION['user_level'];
	if(isset($user) AND ($user_level == 3) OR ($user_level == 4)){
		?>
		<section>
			  <div class="row">
			  	<div class="col-sm-2">
			  		<span style="background: #2a374c;padding: 5px;color: #FFF;border-radius:5px; ">
					  	<a href="./" class="breadcrumbtext">Home</a> »
					  	<a href="./?l=allrequest" class="breadcrumbtext">All Request</a>
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
	  <div class="tbl-header">
	    <table cellpadding="0" cellspacing="0" border="0">
	      <thead>
	        <tr>
	             	 <tr>
						<th style="background: #2a374c;">Title</th>
						<th style="background: #2a374c;">Description</th>
						<th style="background: #2a374c;">Posted at</th>
						<th style="background: #2a374c;">Replies</th>
						<th style="background: #2a374c;">Posted by</th>
					</tr>
	        </tr>
	      </thead>
	    </table>
	  </div>
		  <div class="tbl-content">
		    <table cellpadding="0" cellspacing="0" border="0">
		      <tbody>
		      	<?php
			      	if($_SESSION['user_level'] == 3 OR $_SESSION['user_level'] == 4){
			      		$user_in = $_SESSION['user'];
				  		$select_notification = "SELECT * FROM `request_tbl`";
				  		$notification_result = mysqli_query($conn,$select_notification);
				  		while($row = mysqli_fetch_assoc($notification_result)){
				  			$rep_id = $row['req_id'];
				  			$select_replies = "SELECT `rep_id` FROM `reply_tbl` WHERE `rep_post`='$rep_id'";
				  			$replies_result = mysqli_query($conn,$select_replies);
				  			$count_replies = mysqli_num_rows($replies_result);
				  			?>
				  			<tr>
					  				<td><a href="./?l=thread&title=<?php echo $row['req_title'].'&time='.$row['req_created_time']?>"><?php echo $row['req_title']; ?></a></td>
					  				<td><?php echo $row['req_description']; ?></td>
					  				<td><?php echo $row['req_created_at'].' '.$row['req_created_time']; ?></td>
					  				<td><?php echo $count_replies ?></td>
					  				<td><?php echo $row['req_author']; ?></td>
					  			</tr>
				  			<?php
				  		}

			      	}else{
			      		$user_in = $_SESSION['user'];
				  		$select_notification = "SELECT * FROM `request_tbl` WHERE `req_author`='$user_in'";
				  		$notification_result = mysqli_query($conn,$select_notification);
				  		while($row = mysqli_fetch_assoc($notification_result)){
				  			$rep_id = $row['req_id'];
				  			$select_replies = "SELECT `rep_id` FROM `reply_tbl` WHERE `rep_post`='$rep_id'";
				  			$replies_result = mysqli_query($conn,$select_replies);
				  			$count_replies = mysqli_num_rows($replies_result);
				  			?>
				  			<tr>
					  				<td><a href="./?l=thread&title=<?php echo $row['req_title'].'&time='.$row['req_created_time']?>"><?php echo $row['req_title']; ?></a></td>
					  				<td><?php echo $row['req_description']; ?></td>
					  				<td><?php echo $row['req_created_at'].' '.$row['req_created_time']; ?></td>
					  				<td><?php echo $count_replies ?></td>
					  				<td><?php echo $row['req_author']; ?></td>
					  			</tr>
				  			<?php
				  		}
			      	}
		      	?>
			  </tbody>
			</table>
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