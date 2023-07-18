<?php
$title="Create Department";
include "../share/connection.php";
include "../share/header.php";
include "../share/body.php";
echo "<h1 class=mx-auto style=width: 200px; style=height: 200px;> CREATE EMPLOYEE</h1>";
echo '<br>';
if(isset($_POST['insert']))
{print_r($_FILES);
  $name=time().$_FILES['image']['name'];
  $location=$_FILES['image']['tmp_name'];
 $save= move_uploaded_file($location,"../upload/$name");

	$sql="insert into employee(name,salary,email,password,department_id,image)  values('$_POST[name]',$_POST[salary],'$_POST[email]','$_POST[pass]',$_POST[dep_id],'$name')";
	$insert=mysqli_query($con,$sql);
 header("location:/project/employee/create.php"); 

}
?>
<div class="mx-auto" style="width: 800px;">
<div class="p-3 mb-2 bg-secondary text-white" >	
<form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="formGroupExampleInput">Employee Name</label>
    <input type="text" class="form-control"name='name' required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Employee Email</label>
    <input type="email" class="form-control"name='email'>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Employee Salary</label>
    <input type="text" class="form-control"name='salary' required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Employee Password</label>
    <input type="password" class="form-control"name='pass' required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Employee Image</label>
    <input type="file" class="form-control"name='image' required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Employee Department</label>
    <select name="dep_id" class="form-control" required>
        <?php $sql="select * from department" ;
        $selsct=mysqli_query($con,$sql);
        foreach($selsct as $data)
        {
        ?>
    <option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?></option>
    <?php }?>
  </select>
  </div>
  <button  type="submit" class="btn btn-primary" name='insert' value='Insert Employee'>Insert Employee</button>
</form>
</div>
</div>
<?php
include "../share/footer.php";
?>