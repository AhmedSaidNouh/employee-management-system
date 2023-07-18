<?php 
include "../share/connection.php";
include "../share/header.php";
include "../share/body.php";
echo "<h1 class=mx-auto style=width: 200px; style=height: 200px;> UPDATE employee</h1>";
$bool=isset($_SESSION['emp']);
if(isset($_GET['edit']) &&isset( $_POST['update']))
{
  $sql="select image from employee where id=$_GET[edit]";
  $select=mysqli_query($con,$sql);
  $data=mysqli_fetch_assoc($select);
  if(empty($_FILES['image']['name']))
  {
    $name=$data['image'];

  }
  else
  {
    unlink("../upload/$data[image]");
    $name=time(). $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],"../upload/$name");

  }
    $sql="update employee
    set  name='$_POST[name]',
    salary=$_POST[salary],
    email='$_POST[email]',
    password='$_POST[pass]',
    department_id=$_POST[dep_id] ,
    image='$name'
    where id=$_GET[edit]";
   $update=mysqli_query($con,$sql);
   if(!$bool)
    header("location:/project/employee/view.php");
    else
    header("location:/project/employee/profile.php");

 }
elseif(isset($_GET['edit']))
{
    $sql="select * from employee where id=$_GET[edit]";
    $select=mysqli_query($con,$sql);
    $data=mysqli_fetch_assoc($select);
    if(!$bool)
    {
    $Sql="select * from department" ;
        $Selsct=mysqli_query($con,$Sql);
    }
    else
    {
      $Sql="select name,id from department where id=$data[department_id]" ;
      $Selsct=mysqli_query($con,$Sql);
      $d=mysqli_fetch_assoc($Selsct);
    }
}
?>
<div class="mx-auto" style="width: 800px;">
<div class="p-3 mb-2 bg-secondary text-white" >	
<form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="formGroupExampleInput">Employee Name</label>
    <input type="text" class="form-control"name='name' value="<?=$data['name']?>" <?php if($bool) echo "readonly";?>>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Employee Email</label>
    <input type="text" class="form-control"name='email' value="<?=$data['email']?>" <?php if($bool) echo "readonly";?>>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Employee Salary</label>
    <input type="text" class="form-control"name='salary' value="<?=$data['salary']?>" <?php if($bool) echo "readonly";?>>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Employee Password</label>
    <input type="password" class="form-control"name='pass' value="<?=$data['password']?>"  >
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Employee Image</label>
    <input type="file" class="form-control"name='image' >
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Employee Department</label>
    <select name="dep_id"  class="form-control"  >
        <?php 
        if(!$bool)
        foreach($Selsct as $d)
        {
        ?>
    <option  value="<?php echo $d['id'] ?>" <?php if($d['id']==$data['department_id']) echo "selected"; ?>><?php echo $d['name'] ?></option>
    <?php }?>
    <?php if($bool)
    {?>
 <option  value="<?php echo $d['id'] ?>"  selected ><?php echo $d['name'] ?></option>
   <?php }?>
    ?>
  </select>
  </div>
  <button  type="submit" class="btn btn-primary" name='update' value='Insert Employee'>Update Employee</button>
</form>
</div>
</div>
<?php 
include "../share/footer.php";
?>