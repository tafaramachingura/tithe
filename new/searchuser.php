
<?php
require('../db.php');
$email=$_POST['email'];

$sf=mysqli_query($con,"select member_id from members where members.email='".$email."'");
$arow=mysqli_fetch_assoc($sf);
$member_id=$arow['member_id'];
$q=mysqli_query($con,"select DISTINCT * from months, tithe where tithe.montid=months. mid and tithe.mid='".$member_id."'");
$rws=mysqli_num_rows($q);
$json_array=array();
while($row=mysqli_fetch_array($q)){
  $array_id=array('montid'=>$row['montid'],
'amount'=>$row['amount'],
'date'=>$row['date']);
  array_push($json_array,$array_id);
}
echo (json_encode($json_array));
?>
