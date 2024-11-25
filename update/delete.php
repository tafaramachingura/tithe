<?php
require('../db.php');
$user_id=$_POST['user_id'];
$q=mysqli_query($con,"delete from members where member_id='".$user_id."'");
mysqli_query($con,"delete from tithe where mid='".$user_id."'");
if($q){
  echo" deleted";
}

?>
