<?php
$title="Create Department";
include "../share/connection.php";
include "../share/header.php";
include "../share/body.php";
echo "<h1 class=mx-auto style=width: 200px; style=height: 200px;> CREATE DEPARTMENT</h1>";
echo '<br>';
if(isset($_POST['insert']))
{
	$sql="insert into department(id, name)  values($_POST[id],'$_POST[name]')";
	$insert=mysqli_query($con,$sql);
    header("location:/project/department/create.php");
}
?>
<div class="mx-auto" style="width: 800px;">
<div class="p-3 mb-2 bg-secondary text-white" >	
<form method="post">
  <div class="form-group">
    <label for="formGroupExampleInput">department ID</label>
    <input type="text" class="form-control" name='id' required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">DEPATMENT NAME</label>
    <input type="text" class="form-control"name='name' required>
  </div>
  <button  type="submit" class="btn btn-primary" name='insert' value='Insert Employee'>Insert department</button>
</form>
</div>
</div>
<?php
include "../share/footer.php";
?>