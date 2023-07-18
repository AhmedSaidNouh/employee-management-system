<?php 
session_start();
$set=isset($_SESSION['admin']);
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/project/index.php">Home </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
         Employee
        </a>
        <div class="dropdown-menu">
            <?php if(  $set&&$_SESSION['admin']['rule']==0) {?>
          <a class="dropdown-item" href="/project/employee/create.php">Create employee</a>
          <?php }?>
          <?php if( $set&& $_SESSION['admin']['rule']>=0) {?>
          <a class="dropdown-item" href="/project/employee/view.php">View details</a>
          <?php }?>
          <?php if( isset($_SESSION['emp']) ) {?>
          <a class="dropdown-item" href="/project/employee/profile.php">View profile</a>
          <?php }?>
        </div>
      </li>
      <li class="nav-item dropdown">
        <?php if(!isset($_SESSION['emp'])){?>
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
         Department
         <?php }?>
        </a>
        <div class="dropdown-menu">
         
            <?php if($set&&  $_SESSION['admin']['rule']==0) {?>
          
          <a class="dropdown-item" href="/project/department/create.php">Create department</a>
          <?php }?>
          <?php if( $set&& $_SESSION['admin']['rule']>=0) {?>
          <a class="dropdown-item" href="/project/department/view.php">View details</a>
          <?php }?>
        </div>
      </li>
      <?php if($set&&  $_SESSION['admin']['rule']==0) {?>
      <li class="nav-item dropdown">
          
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
         Admin
        </a>
        <div class="dropdown-menu">
         
          
          <a class="dropdown-item" href="/project/Admin/Create.php">Create Admin</a>
          <a class="dropdown-item" href="/project/Admin/rule.php">Create Rule</a>
          <a class="dropdown-item" href="/project/Admin/view.php">view admins</a>
        
        </div>
      </li>
      <?php }?>
      <?php if($set&& $_SESSION['admin']['rule']>=0) {?>
      <li class="nav-item active">
    
        <a class="nav-link" href="/project/details/view.php">Details </a>
      
      </li>
      <?php }?>
    </ul>
    <?php
    if(!isset($_SESSION['admin'])&&!isset($_SESSION['emp']))
    {
    ?>
    <a class="btn btn-outline-success my-2 my-sm-0" href="/project/login/login.php" >LOG IN</a>
    <?php }?>
    <?php 
    if(isset($_SESSION['admin'])||isset($_SESSION['emp']))
    {
    ?>
     <a class="btn btn-outline-success my-2 my-sm-0" href="/project/index.php?logout" >LOG OUT</a>
    <?php }?>
     
  </div>
</nav>