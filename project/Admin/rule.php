<?php 
$title="rule";
include "../share/connection.php";
include "../share/header.php";
include "../share/body.php";
echo "<h1 class=mx-auto style=width: 200px; style=height: 200px;> ADD RUlSE</h1>";
if(isset($_POST['role']))
{
    $sql="insert into roles values($_POST[id],'$_POST[name]')";
    mysqli_query($con,$sql);
    header("location:/project/Admin/rule.php");
}
?>
<div class="mx-auto" style="width: 800px;">
<div class="p-3 mb-2 bg-secondary text-white" >	
<form method="post">
  <div class="form-group">
    <label for="formGroupExampleInput">ID</label>
    <input type="text" class="form-control" name='id' required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">NAME</label>
    <input type="text" class="form-control"name='name' required>
  </div>
  <button  type="submit" class="btn btn-primary" name='role' value='Insert rule'>ADD RULE</button>
</form>
</div>
</div>
<?php 
include "../share/footer.php";