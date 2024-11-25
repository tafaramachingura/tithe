<?php

require("../db.php");
if(isset($_POST['email'])){
$email=$_POST['email'];

function searchmembers($con,$email)
{
  ?>
<!-----end of code --->
  <table class='table table-bordered table-striped' style="display:inline;">
    <!---satrt of-------------------------------------------->
    <tr>
      <th colspan="7">
        <form action="" method="post">
  <div class="form-group">
  Search members &nbsp;<input type="text" id="emails"  class='form-control' placeholder="Email" value="<?php echo $email ?>">  &nbsp;&nbsp;
  &nbsp;&nbsp;
  Or Month Information <input type="text" placeholder="05/2020" class="form-control" id="month">
  <input type="button" value="Search" class="btn btn-primary search2">
  </form>
  <!--- forms for generating data ---->
  &nbsp;&nbsp;&nbsp;
  <form action="data/csv3.php"  method="post" enctype="multipart/form-data" class="csv_print">
    <button type="submit" name="csv" class='defa'> Save CSV Data  <i class="glyphicon glyphicon-download-alt"></i></button>
    <input type="hidden" value="<?php  echo $email ?>" name='email'>
  </form> &nbsp;&nbsp;&nbsp;
  <form class="csv_print" action="" target="blank">
    <button class="defa" type="button" onclick="window.print()"> Print Preview&nbsp;
    <i class="glyphicon glyphicon-print"></i></button>
  </form>
  <!--- end of form ----->
  <span style="margin-left:1%;font-size:20px;color:#0265cb"  id= "<?php echo date('m') ?>" class='dfm' ><?php
  $defaultyear=date('M:Y');
    ?>

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


      </tr>
      <?php
  $defmonth=date('m');
$sd=mysqli_query($con,"select DISTINCT * from tithe, members where members.email='".$email."' and members.member_id=tithe.mid");
$nrows=mysqli_num_rows($sd);
$qm=mysqli_query($con,"select  * from  months where months.mid<=$defmonth order by mid desc "); ?>
<?php
if($nrows>0){

    $assoc=mysqli_fetch_assoc($sd);
    ?>
      <tr><td> <?php echo $assoc['name'] ;?></td>
      <td> <?php echo $assoc['surname']; ?></td>
      <td> <?php echo $assoc['address'] ;?></td>
      <td> <?php echo $assoc['cellnumber']; ?></td>
      <td> <?php echo $assoc['email'] ;?></td>
      <td> <?php echo $assoc['gender']; ?></td>
      <td> <?php  echo '<img src="uploads/'.$assoc['face'].'" class="zoom" onclick= "return zoom(this)">' ?></td>
    </tr>
  <?php ?>
  </table>
</br></br>
      <table class='table table-bordered table-striped' style="display: inline;width:100px;margin-left:30%" >
        <tr> <td colspan="4" style="height:90px"> <h3>User <?php echo $assoc['name']." ".$assoc['surname'] ?>Tithe History</h3></td>

      </tr>
      <tr class=" btn-primary"><th>tithe paid</th>
      <th>Date paid</th>
       <th>Amount</th>
       <th>Month Of</th></tr>
       <?php
while( $row=mysqli_fetch_assoc($qm)){

?>

<tr>
<td> <?php echo "<input type='checkbox' class='paid'  id=".$row['mid'].">";?></td>
<td><span class="date"></span></td>
<td><span class='amount'></span></td>
<td><?php echo $row['mname']?></td>


</tr>
<?php

}

}
else{
  echo "<tr><p><h3>User have not paid tithe for this year</h3></p></tr>";
}

}

?>
</table>
 <?php
echo (searchmembers($con,$email));

}

?>

<script src='js/jquery-3.3.1.min.js'></script>
<script src="js/bootstrap.min.js"></script>
<script src='js/tithe.js'></script>
<script> search2()</script>
