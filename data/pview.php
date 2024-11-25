<?php
require('../db.php');
require('../auth.php');
?>
<link rel="stylesheet" href="../css/style.css" />
<link rel="stylesheet" href="../css/bootstrap.min.css"/>
<link rel="stylesheet" href="../css/bootstrap-theme.min.css"/>
<div class="col-md-9">
  <h1> Members Information</h1>
<table class='table table-bordered table-striped '>
  <style>
  img{
    width:100px;
    }</style>
<tr>
<th>Name</th><th>Surname</th> <th>Home address</th> <th>CellNumber</th><th>Email</th> <th>Gender</th> <th></th> </tr>
<?php $q=mysqli_query($con,"select * from members"); ?>
  <tbody class="searched">
<?php  while($row=mysqli_fetch_assoc($q)){?>
<tr>
<td> <?php echo $row['name'] ;?></td>
<td> <?php echo $row['surname']; ?></td>
<td> <?php echo $row['address'] ;?></td>
<td> <?php echo $row['cellnumber']; ?></td>
<td> <?php echo $row['email'] ;?></td>
<td> <?php echo $row['gender']; ?></td>
<td> <?php  echo '<img src="../uploads/'.$row['face'].'">' ?></td>

</tr>
<?php } ?>
</table>
<script src='../js/jquery-3.3.1.min.js'></script>
<script src="../js/bootstrap.min.js"></script>
<script src='../js/tithe.js'></script>
<script>
$(document).ready(function(){
  window.print();
})
 </script>
</div>
