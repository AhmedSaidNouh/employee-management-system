<?php 
$title="profile";
include "../share/connection.php";
include "../share/header.php";
include "../share/body.php";
echo "<h1 class=mx-auto style=width: 200px; style=height: 200px;> PROFILE</h1>";
$id=$_SESSION['emp'];
$sql="select * from employee where id=$id";
$select=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($select);
$img=$data['image'];
$name=$data['name'];
$salary=$data['salary'];
$email=$data['email'];
$password=$data['password'];
$sql="select name from department where id=$data[department_id]";
$select=mysqli_query($con,$sql);
$name_dep=mysqli_fetch_assoc($select);
?>

<div class="mx-auto" style="width: 270px;">
<div  class="text-body">
<div class="card" style="width: 18rem;">
  <img src="/project/upload/<?=$img?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Information</h5>
    <p class="card-text">Name:<?=$name?></p>
    <p class="card-text">email:<?=$email?></p>
    <p class="card-text">password:<?=$password?></p>
    <p class="card-text">salary:<?=$salary?></p>
    <a href="/project/employee/update.php?edit=<?=$id?>" class="btn btn-primary">Update</a>
  </div>
</div>
</div</div>
<?php 
include "../share/footer.php";
?>
