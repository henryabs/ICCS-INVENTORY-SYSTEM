<?php
session_start();
?>
<script type="text/javascript">
	$(document).ready(function(){

		document.cookie="page=1";
		
		$('#sel').on('change', function() {
			 $value = this.value;
			 //document.getElementById('p').value = $value;
			 document.cookie="page="+$value;
			 location.href=location.href

		})

		$('#prev').on('click', function() {
			 
			 $value = document.getElementById('sel').value;
			 $value = ($value) - 1;
			 document.cookie="page="+$value;
			 location.href=location.href

		})

		$('#next').on('click', function() {
			 
			 $value = document.getElementById('sel').value;
			 $value = parseInt($value) + 1;
			 document.cookie="page="+$value;
			 location.href=location.href

		})

	});
</script>
<?php
include '../core/internal_connect.php';
	$q = $_GET['q'];

	if(empty($q)){
		$q = '';
	}else{
		$q;
	}
	if($page = $_COOKIE['page']){
		$page = $_COOKIE['page'];
	}else{
		$page = 1;
	}
	
	$_SESSION['asset_q'] = $q;
	$_SESSION['page'] = $page;
	$page = $_SESSION['page'];
?>


<?php

//#
//$page = 1;
if(empty($page)){
	 $page = 1;
}
$per_page = 20;
if($page =='' || $page == 1){
$page1 = 0;
$page1 = mysqli_real_escape_string($conn,$page1);
}else{
$page1 = ($page * $per_page)-$per_page;
$page1 = mysqli_real_escape_string($conn,$page1);
}
//#


$all_asset = "SELECT * FROM `asset_tbl`";
$all_result = mysqli_query($conn,$all_asset);

//extract ASSET
$select_asset = "SELECT * FROM `asset_tbl` WHERE `asst_item_code` LIKE '%$q%' ORDER BY `asst_code` LIMIT $page1,$per_page";
$asset_result = mysqli_query($conn,$select_asset);
$num_asset = mysqli_num_rows($asset_result);

//get page number
$select_page = "SELECT * FROM `asset_tbl` WHERE `asst_item_code` LIKE '%$q%'";
$page_result = mysqli_query($conn,$select_page);
$num_asset = mysqli_num_rows($page_result);
$num_page = ceil($num_asset/$per_page);
?>


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
					<tr>
						<?php
						while($row = mysqli_fetch_assoc($asset_result)){
						$status_id = $row['asst_sts_id'];
						$select_status = "SELECT `sts_mark`,`sts_color` FROM `status_tbl` WHERE `sts_id`='$status_id'";
						$status_query = mysqli_query($conn,$select_status);
						$status = mysqli_fetch_assoc($status_query);
						$status_mark = $status['sts_mark'];
						$status_color = $status['sts_color'];
						$user_account = $row['asst_created_by'];
											      				
						$user_account_id = "SELECT `usr_id` FROM `users_tbl` WHERE `usr_full_name`='$user_account'";
						$account_id = mysqli_query($conn,$user_account_id);
						$account_id = mysqli_fetch_assoc($account_id);
						$account_id = $account_id['usr_id'];
						?>
						
						<tr style="font-family: monospace;">
						    <td><a href="./?l=item&code=<?php echo $row['asst_item_code']?>"><?php echo strtoupper($row['asst_item_code']); ?></a></td>
						    <td><?php echo strtoupper($row['asst_model_name']); ?></td>
						    <td><span class="label label-<?php echo $status_color?>"><?php echo $status_mark ?></span></td>
						    <td><?php echo $row['asst_created_at']; ?></td>
						    <td><a href="./?l=account&user=<?php echo $account_id;?>"><?php echo $row['asst_created_by']; ?></a></td>
						    <td><a href="#"><span class="glyphicon glyphicon-qrcode" aria-hidden="true"  data-toggle="modal" data-target="#<?php echo $row['asst_item_code']?>"></span></a></span></td>
						</tr>
						

						<div class="modal fade" id="<?php echo $row['asst_item_code']; ?>" role="dialog">
						    <div class="modal-dialog modal-sm">
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal">&times;</button>
						          
						        </div>
						        <div class="modal-body">
						        	
						          	
									
										<img src="<?php echo './image/'.$row['asst_item_code'].'.png'?>" class="img-responsive">
									</a>
						        </div>
						        <div class="modal-footer">
						          <button type="button" class="btn btn-primary btn-xs" data-dismiss="modal">Close</button>
						        </div>
						      </div>
						    </div>
						  </div>
						</div>
						<?php

						}
						if($num_page == 0){
							echo '<tr><td><h1>Sorry! No asset found our system.</h1></td></tr>';
						}
					$conn->close();
						?>
					</tr>
				</tbody>
			</table>
		</div>
		<br /><br />
		<?php
		if(!$num_page == 0){
			?>
			<p style="text-align: right;"><span style="background:;color: whie;padding: 3px">

      			<!--15 records of <?php //echo $count_all; ?>-->
      				<!--PREVIOUS-->
      				<?php
      					$previous = $page - 1;
	      				if($page == 0 || $page == 1){
	      					
	      				}else{
	      					?>
	      					<a href="" id="prev" style="color:#">Previous</a>
	      					
	      					
	      					<?php
	      				}
      				?>
      				
      				<select id="sel">
	      						<?php
	      							$i = 1;
	      							while($i <= $num_page){
	      								if($i == $_SESSION['page']){
	      									echo '<option selected="selected" value="'.$i.'">'.$i.'</option>';
	      									$i++;
	      								}else{
	      									echo '<option value="'.$i.'">'.$i.'</option>';
	      									$i++;
	      								}
	      								
	      							}
		      						
	      						?>
	      						
	      					</select>
      				<?php
      				/*
      				for($i = 1; $i<= $num_page; $i++){
						echo '<a href="./?l=home&page='.$i.'" style="text-decoration:none;padding:3px;border-radius:3px;color:whie;margin:1px;"> '.$i.' </a>';
					}
					*/
					echo ' of '.$num_page;
      				?>

      				<!--NEXT-->
      				<?php

      					$next = $page + 1;
	      				if($page < $num_page){
	      					?>
	      					<a href="" id="next" style="color:#">Next</a>
	      					<?php
	      				}else{
	      					
	      				}
      				?>
      				
      			</span></p>
			<?php
		}
		
		?>
		
</section>
