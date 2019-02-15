<section>
	<table>
		<tr>

			<?php
				$select_site = "SELECT `site_name` FROM `site_tbl`";
				$site_result = mysqli_query($conn,$select_site);
				while($site = mysqli_fetch_assoc($site_result)){
						echo '<th colspan="6" style="color:white;background:#384155;border-left:2px solid red;">'.strtoupper($site['site_name']).'</th>';
						?>
						
							
								
							
						
						<?php
				}
			?>
		</tr>
	</table>
	<table>
		<tr>
			<?php
				$select_site = "SELECT `site_name` FROM `site_tbl`";
				$site_result = mysqli_query($conn,$select_site);
				while($site = mysqli_fetch_assoc($site_result)){
						echo '<th colspan="2" style="color:white;background:#384155;border-left:2px solid red;">Unit</th>
						<th colspan="2" style="color:white;background:#384155;border-left:2px solid red;">Total</th>
						<th colspan="2" style="color:white;background:#384155;border-left:2px solid red;">Shortage</th>';
						?>
						
							
								
							
						
						<?php
				}
			?>
		</tr>
	</table>
</section>