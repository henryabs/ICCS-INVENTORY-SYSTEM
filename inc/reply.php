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
					  	<a href="./?l=thread" class="breadcrumbtext">Reply</a>
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
			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<?php
					@$post = $_GET['post'];
					$post = mysqli_real_escape_string($conn,$post);
					//check 
					$select_post = "SELECT * FROM `request_tbl` WHERE `req_id`='$post'";
					$post_result = mysqli_query($conn,$select_post);
					$row = mysqli_fetch_assoc($post_result);
					$count_post = mysqli_num_rows($post_result);
						if($count_post > 0){
							?>
							<div class="card">
								  <div class="card-header"><?php echo $row['req_title'].' on '.$row['req_created_at']; ?></div>
								  <br />
								  <div class="card-body">
								  		<form action="" method="POST">
								  			
								  			<?php
								  			if($_SESSION['user_level'] == 4){
								  				?>
								  				<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal">Generate Link and Code</button>
								  				<?php
								  			}
								  			?>
								  			


								  			<br /><br />
											<textarea name="reply_body" class="form-control" style="height: 200px" placeholder="Enter some message here" id="o"></textarea>
											<br />
											<input type="submit" name="reply_submit" value="Post Reply"  class="btn  btn-xs" style="background: #FF851B;padding: 4px;color: #FFF;border-radius:5px; ">
										</form>
										<div class="container">
										  
										  <!-- Modal -->
										  <div class="modal fade" id="myModal" role="dialog">
										    <div class="modal-dialog modal-lg">
										      <div class="modal-content">
										        <div class="modal-header">
										          <button type="button" class="close" data-dismiss="modal">&times;</button>
										          <h4 class="modal-title text-danger">Select Asset In Stock</h4>
										        </div>
										        <div class="modal-body">
										          <!---->
										          	<?php $asset_req = $row['unit_code']; ?>
										        	<div class="row">
										        		<div class="col-sm-12 bg-success">
										        			<section>
										        				<!--
										        				<select class="text-danger" id="u">
										        					<option>Choose Unit...</option>
										        					<?php
										        						$select_unit = "SELECT DISTINCT `unt_name` FROM `unit_tbl`";
										        						$unit_result = mysqli_query($conn,$select_unit);
										        						while($row = mysqli_fetch_assoc($unit_result)){
										        							echo '<option>'.$row['unt_name'].'</option>';
										        						}
										        					?>
										        				</select>
										        				<script type="text/javascript">
																	$(document).ready(function(){
																		$('#u').on('change', function() {
																		  $value = this.value;
																		  $.ajax({url:'./controls/ajax/onstock.php?q='+$value,success:function(result){
																		$('#r').html(result);
																		}});
																		})
																	});

																	
																</script>
																-->

										        			<?php
										        			//select available unit request from storage and convert unit to unit code

										        			$select_code = "SELECT `unt_code` FROM `unit_tbl` WHERE `unt_name`='$asset_req'";
										        			$ucode = mysqli_query($conn,$select_code);
										        			$ucode = mysqli_fetch_assoc($ucode);
										        			$ucode = $ucode['unt_code'];


										        			//LISTING OF ASSET
										        			$select_asset = "SELECT * FROM `asset_tbl` WHERE `asst_unit_code`='$ucode' AND `asst_stord_id`=2 LIMIT 10";
										        			$asset_result = mysqli_query($conn,$select_asset);
										        			$count = mysqli_num_rows($asset_result);
										        			if($count > 0){
										        				while($asset = mysqli_fetch_assoc($asset_result)){
											        				?>
											        				<table>
												        				<tr>
												        					<td><?php echo $asset['asst_item_code']; ?></td>
												        					<td><?php echo $asset['asst_code']; ?></td>
												        					<td>
												        						<button type="button" class="btn btn-default btn-xs" id="paste<?php echo $asset['asst_item_code'];?>" data-dismiss="modal">Use this code</button>
																	        	<script type="text/javascript">
																								$(document).ready(function(){
																									 $("#paste<?php echo $asset['asst_item_code'];?>").on("click", function(event) {
																							            $("#o").val('This is acknowledge. Here is the link to edit the item...<a href="./?l=deployment&item=<?php echo $asset['asst_item_code'].'&code='.$asset['asst_code']?>"> Link </a>');
																						       		 });
																								});			
																				</script>

												        					</td>
												        				</tr>
												        			</table>
											        				<?php

											        			}
										        			}else{
										        				echo "No asset available as of the moment!";
										        			}
										        			
										        			?>
										        			
										        			</section>
										        			<div class="text-danger" id="r"></div>
										        		</div>
										        	</div>


										        </div>
										        <div class="modal-footer">
										          <p><?php echo $count.' pcs. available for deployment.'; ?></p>
										          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										        </div>
										      </div>
										    </div>
										  </div>
										</div>
								  </div> 
							</div>
							
							<?php

						}else{
							header('location:./?l=404');
						}
					?>
					<?php
					if(isset($_POST['reply_submit'])){
						$reply = $_POST['reply_body'];
						if(empty($reply)){
							echo "Message field can't be empty!";
						}else{
							$reply;
							$date;
							$time;
							$author = $_SESSION['user'];
							$post;
							$insert_reply = "INSERT INTO `reply_tbl` (`rep_body`,`rep_created_at`,`rep_created_time`,`rep_author`,`rep_post`)VALUES('$reply','$date','$time','$author','$post')";
							if(mysqli_query($conn,$insert_reply)){
								echo 'posted reply. <a href="#">Go to thread</a>';
							}else{
								echo mysqli_error();
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