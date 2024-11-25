<?php

require("../db.php");
if(isset($_POST['email'])){
$email=$_POST['email'];

function searchmembers($con,$email)
{

$sd=mysqli_query($con,"select * from members where members.email='".$email."'");
$nrows=mysqli_num_rows($sd);

if($nrows>0){


while( $row=mysqli_fetch_assoc($sd)){

?>

<!-----end of code --->
<table class='table table-bordered table-striped'>
  <!---satrt of-------------------------------------------->
  <tr>
    <th colspan="11">
      <form action="" method="post">
<div class="form-group">
Search members &nbsp;<input type="text" id="emails"  class='form-control' placeholder="Email">  &nbsp;&nbsp;
<input type="reset" value="Reset" class="btn btn-default"> <input type="button" value="Search" class="btn btn-primary" id="search1">
</form>
<!--- forms for generating data ---->
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<form action="data/csv2.php"  method="post" enctype="multipart/form-data" class="csv_print">
  <button type="submit" name="csv" class='defa'> Save CSV Data  <i class="glyphicon glyphicon-download-alt"></i></button>
  <input type="hidden" value="<?php echo $email ?>" name='email'>
</form> &nbsp;&nbsp;&nbsp;
<form class="csv_print" action="" target="blank">
  <button class="defa" type="button" onclick="window.print()"> Print Preview&nbsp;
  <i class="glyphicon glyphicon-print"></i></button>
</form>
<!--- end of form ----->
<span style="margin-left:15%;font-size:20px;color:#0265cb"  id= "<?php echo date('m') ?>" class='dfm' ><?php
$defaultyear=date('M:Y');
 echo $defaultyear; ?>

</span>
</div>
</th>
</tr>
<!---  end of            ------------->
<tr class='btn-primary'>
<th>Name</th><th>Surname</th> <th>Home address</th> <th>CellNumber</th><th>Email</th> <th>Gender</th> <th>Face  <th></th> </tr>


<tr>
<td> <?php echo $row['name'] ;?></td>
<td> <?php echo $row['surname']; ?></td>
<td> <?php echo $row['address'] ;?></td>
<td> <?php echo $row['cellnumber']; ?></td>
<td> <?php echo $row['email'] ;?></td>
<td> <?php echo $row['gender']; ?></td>
<td> <?php  echo '<img src="uploads/'.$row['face'].'" class="zoom" onclick= "return zoom(this)">' ?></td>
<td> <a href="update/edit_member.php?id=<?php echo $row['member_id']?>"><i class='glyphicon glyphicon-pencil'></i></a> <a href='#' onclick=" confirm_delete(this.id)" id="<?php echo $row['member_id']?>"><i class='glyphicon glyphicon-trash text-danger'></i></a></td>

</tr>
</table>
<?php

}

}
else{
  echo "<h3>User does not exit</h3>";
}
}
echo (searchmembers($con,$email));

}
?>
<script src='js/jquery-3.3.1.min.js'></script>
<script src="js/bootstrap.min.js"></script>
<script src='js/tithe.js'></script>
<script> searchmembers()</script>
