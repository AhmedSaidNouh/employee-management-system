<?php
$title="LOG IN";
 include "../share/connection.php";
 include "../share/header.php";
 include "../share/body.php";
 echo "<h1 class=mx-auto style=width: 200px; style=height: 200px;> LOG IN</h1>";
 if(isset($_POST['login']))
 {
  $email=$_POST['email'];
  if(preg_match("/@admin/",$email))
  {
    $sql="select * from admin where email='$email'";
    $select=mysqli_query($con,$sql);
    $num=mysqli_num_rows($select);
    if($num)
    {
    $data=mysqli_fetch_assoc($select);
    $_SESSION['admin']=['admin'=>$data['id'],'rule'=>$data['role']];
    header("location:/project/index.php");
    }
  }
  else if(preg_match("/@employee/",$email))
  {
    $sql="select * from employee where email='$email'";
    $select=mysqli_query($con,$sql);
    $num=mysqli_num_rows($select);
    if($num)
    {
    $data=mysqli_fetch_assoc($select);
    $_SESSION['emp']=$data['id'];
    header("location:/project/index.php");
    }
  }
  else
  header("location:/project/login/login.php");
 }
?>
<div class="mx-auto" style="width: 800px;">
<div class="p-3 mb-2 bg-secondary text-white" >	
<form method="post">
  <div class="form-group">
    <label for="formGroupExampleInput"> Email</label>
    <input type="email" class="form-control" name='email' required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Admin Password</label>
    <input type="password" class="form-control"name='pass' required>
  </div>
  <button  type="submit" class="btn btn-primary" name='login' value='Insert Admin'>Log In</button>
</form>
</div>
</div>
<?php
include "../share/footer.php";