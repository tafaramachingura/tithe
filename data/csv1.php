<?php

require("../db.php");
if(isset($_POST['csv'])){
  $date=date('m');

  $month=mysqli_query($con,"select months.mname from months where mid=$date");
  $res=mysqli_fetch_assoc($month);
  $mname=$res['mname'];

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');
$output=fopen('php://output','w');
fputcsv($output, array('name','surname','Home Address','CellNumber','Email','Gender','tithe paid','Amount','Date Paid','Month Of'));
$q=mysqli_query($con,"select members.name,members.surname,

members.address,members.cellnumber,members.email,members.gender,tithe.status,tithe.amount,tithe.date,tithe.montid from members  left join tithe on members.member_id =tithe.mid and tithe.montid='".$date."'");
while($row=mysqli_fetch_assoc($q)){
  fputcsv($output,array($row['name'],$row['surname'],$row['address'],$row['cellnumber'],$row['email'],$row['gender'],$row['status'],$row['amount'],$row['date'],$mname));
}
fclose($output);
}



 ?>
