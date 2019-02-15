<?php
    @$author = $_SESSION['user'];
    $select_request = "SELECT * FROM `request_tbl` WHERE `req_author`='$author'";
    $request_result = mysqli_query($conn,$select_request);
    $my_request = mysqli_num_rows($request_result);
    $user_id = @$_SESSION['id'];
if(isset($_SESSION['user']) AND $_SESSION['user_level'] == 1){
  ?>
  <!--IT Support Associate-->
  <nav class="navbar navbar-inverse navbar-fixed-top" style="background:'.$themeColor.';">
    <div class="container-fluid">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="./"><span class="" style="color: white;"><b>ICCS Inventory</b></a>
      </div>
      <div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="./"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>  Home</a></li>
            <li><a href="./?l=report"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>  Report</a></li>
            <!--
            <li><a href="./?l=transaction"><span class="glyphicon glyphicon-transfer" aria-hidden="true"></span>  Transaction</a></li>
          -->
            <li><a href="./?l=myrequest"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span>  My Request <span class="label label-success"><?php echo $my_request; ?></span></a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo ucwords($_SESSION['user']); ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="./?l=account&user=<?php echo $user_id;?>"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>  Account</a></li>
                  
                  <li><a href="./?l=signout"><span class="glyphicon glyphicon-off" aria-hidden="true"></span>  Logout</a></li>
                </ul>
             </li> 
            
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <?php
}elseif(isset($_SESSION['user']) AND $_SESSION['user_level'] == 2){
  ?>
  <!--IT Support-->
  <nav class="navbar navbar-inverse navbar-fixed-top" style="background:'.$themeColor.';">
    <div class="container-fluid">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="./"><span class="" style="color: white;"><b>ICCS Inventory</b></a>
      </div>
      <div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="./"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>  Home</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage List<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="./?l=unit"><span class="glyphicon glyphicon-gift" aria-hidden="true"></span>  Unit</a></li>
                  <li><a href="./?l=brand"><span class="glyphicon glyphicon-sunglasses" aria-hidden="true"></span>  Brand</a></li>
                  <li><a href="./?l=model"><span class="glyphicon glyphicon-leaf" aria-hidden="true"></span>  Model</a></li>
                  <li><a href="./?l=supplier"><span class="glyphicon glyphicon-cd" aria-hidden="true"></span>  Supplier</a></li>
                </ul>
             </li>
            <li><a href="./?l=report"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>  Report</a></li>

            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Request<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="./?l=myrequest"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span>  My Request <span class="label label-success">5</span></a></li>
                  <li><a href="./?l=allrequest"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span>  All Request <span class="label label-success">56</span></a></li>
                  
                </ul>
             </li>

            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo ucwords($_SESSION['user']); ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="./?l=account&user=<?php echo $user_id;?>"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>  Account</a></li>
                  <li><a href="./?l=logs"><span class="glyphicon glyphicon-floppy-open" aria-hidden="true"></span>  System Logs</a></li>
                  
                  <li><a href="./?l=signout"><span class="glyphicon glyphicon-off" aria-hidden="true"></span>  Logout</a></li>
                </ul>
             </li> 
            
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <?php
}elseif(isset($_SESSION['user']) AND $_SESSION['user_level'] == 3){
  ?>
  <!--Manager-->
  <nav class="navbar navbar-inverse navbar-fixed-top" style="background:'.$themeColor.';">
    <div class="container-fluid">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="./"><span class="" style="color: white;"><b>ICCS Inventory</b></a>
      </div>
      <div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="./"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>  Home</a></li>
            <li><a href="./?l=manageuser"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Manage Users</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage List<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="./?l=unit"><span class="glyphicon glyphicon-gift" aria-hidden="true"></span>  Unit</a></li>
                  <li><a href="./?l=brand"><span class="glyphicon glyphicon-sunglasses" aria-hidden="true"></span>  Brand</a></li>
                  <li><a href="./?l=model"><span class="glyphicon glyphicon-leaf" aria-hidden="true"></span>  Model</a></li>
                  <li><a href="./?l=supplier"><span class="glyphicon glyphicon-cd" aria-hidden="true"></span>  Supplier</a></li>
                </ul>
             </li>
            <li><a href="./?l=report"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>  Report</a></li>

            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Request<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  
                  <li><a href="./?l=allrequest"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span>  All Request <span class="label label-success">56</span></a></li>
                  
                </ul>
             </li>

            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo ucwords($_SESSION['user']); ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="./?l=account&user=<?php echo $user_id;?>"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>  Account</a></li>
                  <li><a href="./?l=logs"><span class="glyphicon glyphicon-floppy-open" aria-hidden="true"></span>  System Logs</a></li>
                  
                  <li><a href="./?l=signout"><span class="glyphicon glyphicon-off" aria-hidden="true"></span>  Logout</a></li>
                </ul>
             </li> 
            
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <?php
}elseif(isset($_SESSION['user']) AND $_SESSION['user_level'] == 4){
  ?>
  <!--Administrator-->
  <nav class="navbar navbar-inverse navbar-fixed-top" style="background:'.$themeColor.';">
    <div class="container-fluid">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="./"><span class="" style="color: white;"><b>ICCS Inventory</b></a>
      </div>
      <div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="./"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>  Home</a></li>
            <li><a href="./?l=manageuser"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Manage Users</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage List<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="./?l=unit"><span class="glyphicon glyphicon-gift" aria-hidden="true"></span>  Unit</a></li>
                  <li><a href="./?l=brand"><span class="glyphicon glyphicon-sunglasses" aria-hidden="true"></span>  Brand</a></li>
                  <li><a href="./?l=model"><span class="glyphicon glyphicon-leaf" aria-hidden="true"></span>  Model</a></li>
                  <li><a href="./?l=supplier"><span class="glyphicon glyphicon-cd" aria-hidden="true"></span>  Supplier</a></li>
                  <li><a href="./?l=site"><span class="glyphicon glyphicon-flag" aria-hidden="true"></span>  Site</a></li>
                </ul>
             </li>
            <li><a href="./?l=report"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>  Report</a></li>
            <!--
            <li><a href="./?l=transaction"><span class="glyphicon glyphicon-transfer" aria-hidden="true"></span>  Transaction</a></li>
          -->
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Request<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  
                  <li><a href="./?l=allrequest"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span>  All Request <span class="label label-success"></span></a></li>
                  
                </ul>
             </li>

            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo ucwords($_SESSION['user']); ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="./?l=account&user=<?php echo $user_id;?>"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>  Account</a></li>
                  <li><a href="./?l=logs"><span class="glyphicon glyphicon-floppy-open" aria-hidden="true"></span>  System Logs</a></li>
                  
                  <li><a href="./?l=signout"><span class="glyphicon glyphicon-off" aria-hidden="true"></span>  Logout</a></li>
                </ul>
             </li> 
              
             <!--
             <li><a href="./?l=count"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span>  Count</a></li>
           -->
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <?php
}else{
  ?>
  <!--Guest-->
  

  <?php
}
?>