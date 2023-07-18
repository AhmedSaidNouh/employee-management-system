<?php
$title="LOG IN AS ADMIN";
 include "../share/connection.php";
 include "../share/header.php";
 include "../share/body.php";
 echo "<h1 class=mx-auto style=width: 200px; style=height: 200px;> LOG IN AS ADMIN</h1>";
 if(isset($_POST['login']))
 {
    $sql="select * from admin where email='$_POST[email]' and password='$_POST[pass]'";

    $select=mysqli_query($con,$sql);
    $num=mysqli_num_rows($select);
    $data=mysqli_fetch_assoc($select);
  if($num)
  {
    
    $_SESSION['admin']=['admin'=>$data['id'],'rule'=>$data['role']];
    header("location:/project/index.php");

  }
  else
  header("location:/project/Admin/Admin.php");
 }
?>
<div class="mx-auto" style="width: 800px;">
<div class="p-3 mb-2 bg-secondary text-white" >	
<form method="post">
  <div class="form-group">
    <label for="formGroupExampleInput">Admin Email</label>
    <input type="text" class="form-control" name='email' required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Admin Password</label>
    <input type="text" class="form-control"name='pass' required>
  </div>
  <button  type="submit" class="btn btn-primary" name='login' value='Insert Admin'>Log In</button>
</form>
</div>
</div>
<?php
include "../share/footer.php";