<?php 
$title="Crate admin";
include "../share/connection.php";
include "../share/header.php";
include "../share/body.php";
echo "<h1 class=mx-auto style=width: 200px; style=height: 200px;> ADD ADMIN</h1>";
if(isset($_POST['add']))
{
    $sql="insert into admin(email,password,role) values('$_POST[email]','$_POST[pass]',$_POST[rule])";
    mysqli_query($con,$sql);
    header("location:/project/Admin/create.php");
}
?>
<div class="mx-auto" style="width: 800px;">
<div class="p-3 mb-2 bg-secondary text-white" >	
<form method="post">
  <div class="form-group">
    <label for="formGroupExampleInput">EMAIL</label>
    <input type="text" class="form-control" name='email' required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">PASSWORD</label>
    <input type="text" class="form-control" name='pass' required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">RULE</label>
    <select name="rule" class="form-control" >
        <?php
        $sql="select * from roles";
         $select=mysqli_query($con,$sql);
         foreach($select as $data)
         {
        ?>
        <option value="<?=$data['id']?>" > <?=$data['name']?></option>
        <?php }?>
    </select>
    
  </div>
  <button  type="submit" class="btn btn-primary" name='add' value='Insert Admin'>ADD ADMIN</button>
</form>
</div>
</div>
<?php 
include "../share/footer.php";