<?php
include "../share/connection.php";
include "../share/header.php";
include "../share/body.php";
echo "<h1 class=mx-auto style=width: 200px; style=height: 200px;> UPDATE DEPARTMENT</h1>";
if(isset($_GET['edit'])&&isset($_POST['update']))
{
    $sql="update department set  name='$_POST[name]'  where id=$_POST[id]";
    $update=mysqli_query($con,$sql);
    header("location:/project/department/view.php");
}
elseif(isset($_GET['edit']))
{
    $sql="select * from department where id=$_GET[edit]";
    $select=mysqli_query($con,$sql);
    $data=mysqli_fetch_assoc($select);
}
?>
<div class="mx-auto" style="width: 800px;">
<div class="p-3 mb-2 bg-secondary text-white" >	
<form method="post">
  <div class="form-group">
    <label for="formGroupExampleInput">department ID</label>
    <input type="text" class="form-control" name='id' readonly value="<?=$data['id']?>">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">DEPATMENT NAME</label>
    <input type="text" class="form-control"name='name' value="<?=$data['name']?>" >
  </div>
  <button  type="submit" class="btn btn-primary" name='update' value='Update Employee'>Update department</button>
</form>
</div>
</div>
<?php
include "../share/footer.php";
?>