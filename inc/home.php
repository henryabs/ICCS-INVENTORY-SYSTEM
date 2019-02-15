<?php
	$user = @$_SESSION['user'];
	
	if(!isset($user)){
		header('location:./?l=signin');
	}
?>
<section>
			  <div class="row">
			  	<div class="col-sm-2">
			  		<span style="background: #2a374c;padding: 5px;color: #FFF;border-radius:5px;">
					  	<a href="./" class="breadcrumbtext">Home</a>
					</span>
			  	</div>
			  	<div class="col-sm-2"></div>
			  	<div class="col-sm-2"></div>
			  	<div class="col-sm-2"></div>
			  	<div class="col-sm-2"></div>
			  	<div class="col-sm-2">
					<input type="text" placeholder="Search ex: ICCS-KB-1" class="form-control input-sm" name="searchbox" id="searchbox" style="height: 20px;" value="<?php echo @$_SESSION['asset_q'] ?>">
					<script type="text/javascript">
						$(document).ready(function(){
								//auto
								$value = document.getElementById('searchbox').value;
								$.ajax({url:'./script/s.php?q='+$value,success:function(result){
								$('#asset_panel').html(result);
								}});


							$('#searchbox').keyup(function(){
								$value = document.getElementById('searchbox').value;
								$.ajax({url:'./script/s.php?q='+$value,success:function(result){
								$('#asset_panel').html(result);
								
								}});
							});
						});
					</script>
			  	</div>
		</div>
		</section>
		<?php
		$user = @$_SESSION['user'];

		if(isset($user)){
			?>
			<section>
				<span style="background: #FF851B;padding: 4px;color: #FFF;border-radius:5px; ">
				  	<a href="./?l=addasset" class="breadcrumbtext btn btn-xs">Add Asset +</a>
				  	
				</span>
				&nbsp;
				<span style="background: #FF851B;padding: 4px;color: #FFF;border-radius:5px; ">
				  	<a href="./?l=request" class="breadcrumbtext btn btn-xs">Request Asset</a>
				</span>
			</section>
			
			<?php
		}
		?>
	  <div id="asset_panel">
		      <section>
		      		<div class="tbl-header">
		      			<table cellpadding="0" cellspacing="0" border="0" style="background: #2a374c">
		      				<thead>
		      					<tr class="tbhead">
		      						<th>Item Code</th>
		      						<th>Model</th>
		      						<th>Status</th>
		      						<th>Created</th>
		      						<th>Created By</th>
		      						<th>Scan</th>
		      					</tr>
		      				</thead>
		      			</table>
		      		</div>

		      		<div class="tbl-content">
		      			<table cellpadding="0" cellspacing="0" border="0"">
		      				<tbody>
		      					
		      				</tbody>
		      			</table>
		      		</div>
		      		<br /><br />
		      		<p style="text-align: right;"><span style="background:;color: whie;padding: 3px"></span></p>
		      </section>
      </div>