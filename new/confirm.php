<?php

require("../db.php");
$name=mysqli_real_escape_string($con,$_POST['name']);
$sname=mysqli_real_escape_string($con,$_POST['sname']);
$amount=mysqli_real_escape_string($con,$_POST['amount']);
$name=strtolower($name);
$sname=strtolower($sname);
$month=$_POST['month'];
$fm=explode("-",$month);
$fs=end($fm);
$date=date('Y-m-d');
echo $name;
$q=mysqli_query($con,"select *from members where name='".$name."' and surname='".$sname."'");

if(mysqli_num_rows($q)>0){
  $s=mysqli_fetch_assoc($q);
  $member_id=$s['member_id'];
  // dumping payed tithe information *//
  //************************************** preventing user from dumping data more than once ************************
  $md=mysqli_query($con,"select * from tithe where mid='".$member_id."' and montid='".$fs."'");
  $rs=mysqli_fetch_assoc($md);
  $am=$rs['amount'];
  $total_amount=$amount+$am;

  $al=mysqli_query($con,"update tithe set amount='".$total_amount."' , date='".$date."' where mid='".$member_id."' and montid='".$fs."'");
  if($al){
    echo "altered table";
  }

}
?>
