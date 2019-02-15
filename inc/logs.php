<?php
	$user = @$_SESSION['user'];
	$user_level = @$_SESSION['user_level'];
	if(isset($user)){
		?>
		<section>
			  <div class="row">
			  	<div class="col-sm-2">
			  		<span style="background: #2a374c;padding: 5px;color: #FFF;border-radius:5px; ">
					  	<a href="./" class="breadcrumbtext">Home</a> »
					  	<a href="#" class="breadcrumbtext">System Logs</a>
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
			<ul class="list-group">
			<?php
			$select_logs = "SELECT * FROM `logs_tbl` ORDER BY `log_time` DESC LIMIT 20";
			$logs_result = mysqli_query($conn,$select_logs);
			while($log = mysqli_fetch_assoc($logs_result)){
				echo '<li class="list-group-item" style="background: #2a374c;color:white;margin: 10px;padding:5px">'.$log['usr_name'].' '.$log['log_event'].' '.$log['log_description'].' on '.$log['log_date'].' '.$log['log_time'].'</li>';
			}
			?>
			  
			  
			</ul>
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