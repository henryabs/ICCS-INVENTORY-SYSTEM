
<div class="row" style="padding-top: 50px;">
      <?php

      if(!isset($_GET['l'])){
      	$strip_link = 'home';

      }else{
      	$link = $_GET['l'];
      	$strip_link = mysqli_real_escape_string($conn,$link);
      }
      $check_link = "SELECT `pth_link` FROM `path_tbl` WHERE `pth_link`='$strip_link'";
      	$link_result = mysqli_query($conn,$check_link);
      	$count = mysqli_num_rows($link_result);
      	if($count > 0){
                  
      		include $strip_link.'.php';
      	}else{
      		include '404.php';
      	}
      
      ?>

</div>