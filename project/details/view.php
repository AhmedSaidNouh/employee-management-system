<?php
$title="Detals";
include "../share/connection.php";
include "../share/header.php";
include "../share/body.php";
echo "<h1 class=mx-auto style=width: 200px; style=height: 200px;> DETAILS</h1>";
$sql="select* from details";
$select=mysqli_query($con,$sql);
?>

<div class="mx-auto" style="width: 1000px;">
<table class="table table-dark">
  <thead class="p-3 mb-2 bg-secondary text-white">
    <tr>
    <th scope="col">Employee Name</th>
    <th scope="col">Salry</th>
    <th scope="col">EMAIL</th>
      <th scope="col">Department Name</th>
    </tr>
  </thead>
  <tbody>
	
  <?php 
 foreach($select as $data)
  {?>

	
    <tr>
      <th scope="row"><?php echo $data['Employee Name']?></th>
      <td><?php echo $data['salary']?></td>
      <td><?php echo $data['email']?></td>
      <td><?php echo $data['Departement Name']?></td>
  </tr>
  <?php }?>
  </tbody>
</table>
</div>
<?php
include "../share/footer.php";
?>
