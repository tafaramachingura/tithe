<?php

require("../db.php");
if(isset($_POST['date'])){
$date=$_POST['date'];
$date_format=explode('/',$date);
$mon=$date_format[0];
$as=mysqli_query($con,"select * from months where mid='".$mon."'");
$re=mysqli_fetch_assoc($as);
$mname=$re['mname'];
function searchmembers($con,$date,$mname)
{
global $mon;

  $q=mysqli_query($con,"select * from members  left join tithe on members.member_id =tithe.mid and tithe.montid='".$mon."'");

$nrows=mysqli_num_rows($q);

if($nrows>0){



?>

<!-----end of code --->
<table class='table table-bordered table-striped'>
  <!---satrt of-------------------------------------------->
  <tr>
    <th colspan="11">
      <form action="" method="post">
<div class="form-group">
Search members &nbsp;<input type="text" id="emails"  class='form-control' placeholder="Email">  &nbsp;&nbsp;
&nbsp;&nbsp;
Or Month Information <input type="text" placeholder="05/2020" class="form-control" id="month"  value="<?php echo $date ?>">
<input type="button" value="Search" class="btn btn-primary search2">
</form>
<!--- forms for generating data ---->
&nbsp;&nbsp;&nbsp;
<form action="data/csv4.php"  method="post" enctype="multipart/form-data" class="csv_print">
  <button type="submit" name="csv" class='defa'> Save CSV Data  <i class="glyphicon glyphicon-download-alt"></i></button>
  <input type="hidden" value="<?php echo $mon ?>" name='mon'>
</form> &nbsp;&nbsp;&nbsp;
<form class="csv_print" action="" target="blank">
  <button class="defa" type="button" onclick="window.print()"> Print Preview&nbsp;
  <i class="glyphicon glyphicon-print"></i></button>
</form>
<!--- end of form ----->
<span style="margin-left:1%;font-size:20px;color:#0265cb"  id= "<?php echo date('m') ?>" class='dfm' ><?php
$defaultyear=date('M:Y');
 echo $mname ?>

</span>
</div>
</th>
</tr>
<!---  end of            ------------->
<tr class='btn-primary'>
<th>Name</th>
<th>Surname</th>
 <th>Home address</th>
  <th>CellNumber</th>
  <th>Email</th>
  <th>Gender</th>
   <th>face</th>
   <th>tithe paid</th>
   <th>Date paid</th>
    <th>Amount</th>
    <th>Month Of</th>

    </tr>


<?php
while( $row=mysqli_fetch_assoc($q)){ ?>
  <tr>
  <td> <?php echo $row['name'] ;?></td>
  <td> <?php echo $row['surname']; ?></td>
  <td> <?php echo $row['address'] ;?></td>
  <td> <?php echo $row['cellnumber']; ?></td>
  <td> <?php echo $row['email'] ;?></td>
  <td> <?php echo $row['gender']; ?></td>
  <td> <?php  echo '<img src="uploads/'.$row['face'].'" class="zoom" onclick= "return zoom(this)">' ?></td>
  <td> <?php echo "<input type='checkbox' class='paid'  id=".$row['member_id'].">";?></td>
  <td><span class="date"></span></td>
  <td><span class='amount'></span></td>
  <td><span class='month'></span> <?php echo $mname; ?></td>
</tr>
<?php } ?>
</table>
<?php



}
else{
  echo "<h3>User does not exit</h3>";

}

}

$day=date('d');
if(@checkdate($date_format[0],$day,$date_format[1])){
  if($date_format[1]>date('Y') or $date_format[1]<date('Y'))
     {
       echo"<script> alert('date format incorrect')
       window.location.href='dashboard.php';
       </script>";
     }
         else{
         echo (searchmembers($con,$date,$mname));
                  }
}
else{
echo"<script> alert('enter valid date format as provided')
window.location.href='dashboard.php';
</script>";

}
}

?>
<script src='js/jquery-3.3.1.min.js'></script>
<script src="js/bootstrap.min.js"></script>
<script src='js/tithe.js'></script>
<script> search2()</script>
