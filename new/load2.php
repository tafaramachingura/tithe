<?php

require('../db.php');
if(isset($_POST['monthid'])){
  $mon=explode("/",$_POST['monthid']);
  $defaultmonth=$mon[0];

  
}
$q=mysqli_query($con,"select * from members, tithe where members.member_id=tithe.mid and tithe.status='yes' and tithe.montid=$defaultmonth");
$json_array=array();
while($row=mysqli_fetch_array($q)){
  $array_id=array('member_id'=>$row['member_id'],
'amount'=>$row['amount'],
'date'=>$row['date'],
'month'=>$row['montid']);
  array_push($json_array,$array_id);
}
echo (json_encode($json_array));

?>
