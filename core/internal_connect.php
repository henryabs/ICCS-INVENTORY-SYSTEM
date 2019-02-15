<?php
$host = 'localhost';
$userdb = 'root';
$passdb = '';
$db = 'inventory';
$conn = mysqli_connect($host,$userdb,$passdb,$db);
global $conn;
	if(!$conn){
		die(error_connect());
	}else{
		//echo 'connected';
	}
?>

<?php
/*
	function error_connect(){
		?>
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
					<a href="#">Support</a>
				</div>
			</div>
			<div class="col-sm-4" style="color: #484848"></div>
		</div>
		<?php
	}
	*/
?>