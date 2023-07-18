<?php
$title="update";
include "../share/connection.php";
include "../share/header.php";
include "../share/body.php";
echo "<h1 class=mx-auto style=width: 200px; style=height: 200px;> UPDATE</h1>";
if(isset($_GET['edit'])&& isset($_POST['update']))
{
 
  $sql="update admin set 
  email='$_POST[email]',
  password='$_POST[pass]',
  role=$_POST[rule]
  where id=$_GET[edit]";
  mysqli_query($con,$sql);
header("location:/project/Admin/view.php");
  
  

}

elseif(isset($_GET['edit']))
{
  $sql="select * from admin where id=$_GET[edit]";
  $select=mysqli_query($con,$sql);
  $Data=mysqli_fetch_assoc($select);
}
?>
<div class="mx-auto" style="width: 800px;">
<div class="p-3 mb-2 bg-secondary text-white" >	
<form method="post">
  <div class="form-group">
    <label for="formGroupExampleInput">EMAIL</label>
    <input type="text" class="form-control" name='email' value="<?=$Data['email']?>" >
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">PASSWORD</label>
    <input type="text" class="form-control" name='pass' value="<?=$Data['password']?>">
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
        <option value="<?=$data['id']?>"  <?php if($data['id']==$Data['role']) echo "selected" ?>> <?=$data['name']?></option>
        <?php }?>
    </select>
    
  </div>
  <button  type="submit" class="btn btn-primary" name='update' value='Insert Admin'>UPDATE ADMIN</button>
</form>
</div>
</div>
<?php
include "../share/footer.php";
?>