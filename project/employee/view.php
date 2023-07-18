<?php
$title="Detals";
include "../share/connection.php";
include "../share/header.php";
include "../share/body.php";
echo "<h1 class=mx-auto style=width: 200px; style=height: 200px;> DETAILS OF EMPLOYESS</h1>";
if(isset($_GET['remove']))
{$sql="select image from employee where id=$_GET[remove] ";
  $select= mysqli_query($con,$sql);
  $data=mysqli_fetch_assoc($select);
  unlink("../upload/$data[image]");
   $delete="delete from employee where id=$_GET[remove]";
   mysqli_query($con,$delete);
   header("location:/project/employee/view.php");
}
$sql="select * from employee";
$select=mysqli_query($con,$sql);

?>
<div class="mx-auto" style="width: 750px;">
<table class="table table-dark">
  <thead class="p-3 mb-2 bg-secondary text-white">
    <tr>
    <th scope="col">ID</th>
    <th scope="col">NAME</th>
    <th scope="col">EMAIL</th>
    <th scope="col">SALARY</th>
    <th scope="col">PASSWORD</th>
    <th scope="col">DEPARTMENT</th>
    <th scope="col">image</th>
      <th scope="col">ACTION</th>
      <th scope="col"></th>

    </tr>
  </thead>
  <tbody>
  <?php
 foreach($select as $data)
  {?>

	
    <tr>
        <th scope="row"><?php echo $data['id']?></th>
      <td><?php echo $data['name']?></td>
      <td><?php echo $data['email']?></td>
      <td><?php echo $data['salary']?></td>
      <td><?php echo $data['password']?></td>
      <td><?php $sql="select name from department where id=$data[department_id]"; 
      $Select=mysqli_query($con,$sql);
      $d=mysqli_fetch_assoc($Select);
      echo $d['name'];
      ?></td>
       <td><img src="/project/upload/<?=$data['image'] ?>" width="50px"></td>
      <td ><a href="/project/employee/update.php?edit=<?=$data['id']?>" class="btn btn-primary">EDIT</a>
  </td>
  <td> <a href="/project/employee/view.php?remove=<?=$data['id']?>" class="btn btn-primary">RMOVE</a>
    </td>
     
  </tr>
  <?php }?>
  </tbody>
</table>
</div>

<?PHP
include "../share/footer.php";
?>