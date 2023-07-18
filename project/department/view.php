<?php
$title="Detals";
 include "../share/connection.php";
include "../share/header.php";
include "../share/body.php";
echo "<h1 class=mx-auto style=width: 200px; style=height: 200px;> DETAILS OF DEPARTMENT</h1>";
if(isset($_GET['remove']))
{
    $delete="delete from department where id=$_GET[remove]";
    mysqli_query($con,$delete);
    header("location:/project/department/view.php");
}
$sql="select * from department";
$select=mysqli_query($con,$sql);
?>
<div class="mx-auto" style="width: 1000px;">
<table class="table table-dark">
  <thead class="p-3 mb-2 bg-secondary text-white">
    <tr>
    <th scope="col">ID</th>
    <th scope="col">NAME</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>

  <?php
 foreach($select as $data)
  {?>

    <tr>
      <th scope="row"><?php echo $data['id']?></th>
      <td><?php echo $data['name']?></td>
      <td> <a href="/project/department/update.php?edit=<?=$data['id']?>" class="btn btn-primary">EDIT</a>
    <a href="/project/department/view.php?remove=<?=$data['id']?>" class="btn btn-primary">REMOVE</a></td>
  </tr>
  <?php }?>
  </tbody>
</table>
</div>
<?php
include "../share/footer.php";
?>