<?php
$title ="view";
include "../share/connection.php";
include "../share/header.php";
include "../share/body.php"; 
echo "<h1 class=mx-auto style=width: 200px; style=height: 200px;> DETAILS OF Admins</h1>";
if(isset($_GET['remove']))
{
    $SQL="DELETE FROM ADMIN WHERE id=$_GET[remove]";
    mysqli_query($con,$SQL);
    header("location:/project/Admin/view.php");
//echo "{$_SESSION['admin']['rule']}"
}
$sql= "select * from admin";
$select=mysqli_query($con,$sql);
?>

<div class="mx-auto" style="width: 750px;">
<table class="table table-dark">
  <thead class="p-3 mb-2 bg-secondary text-white">
    <tr>
    <th scope="col">ID</th>
    <th scope="col">EMAIL</th>
    <th scope="col">PASSWORD</th>
    <th scope="col">ROLE NAME</th>
    <th scope="col">ACTIONS</th>
    <th scope="col"></th>

    </tr>
  </thead>
  <tbody>
  <?php
 foreach($select as $data)
  {?>

	
    <tr>
        <th scope="row"><?php echo $data['id']?></th>
      <td><?php echo $data['email']?></td>
      <td><?php echo $data['password']?></td>
      <?php
      $sql="select name from roles where id=$data[role]";
      $Select=mysqli_query($con,$sql);
      $Data=mysqli_fetch_assoc($Select);
      
      ?>
      <td><?=$Data['name']?></td>
      <td ><a href="/project/Admin/update.php?edit=<?=$data['id']?>" class="btn btn-primary">EDIT</a>
  </td>
  <td> <a href="/project/Admin/view.php?remove=<?=$data['id']?>" class="btn btn-primary">RMOVE</a>
    </td>
     
  </tr>
  <?php }?>
  </tbody>
</table>
</div>
<?php 
include "../share/footer.php";
?>