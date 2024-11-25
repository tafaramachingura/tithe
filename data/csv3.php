<?php
require("../db.php");
if(isset($_POST['csv'])){
  $email=$_POST['email'];
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');
$output=fopen('php://output','w');
fputcsv($output, array('name','surname','Home Address','CellNumber','Email','Gender'));
$output2=fopen('php://output','w');


$q=mysqli_query($con,"select members.name, members.surname,members.address,members.cellnumber,members.email,members.gender from  members  where email='".$email."'");
$row=mysqli_fetch_assoc($q);
$q2=mysqli_query($con,"select tithe.amount,tithe.status,tithe.date from  members,tithe  where email='".$email."' and members.member_id=tithe.mid");
$row2=mysqli_fetch_assoc($q2);

  fputcsv($output,$row);
  fputcsv($output2, array('tithe Paid','amount','date Paid','Month Of' ));
$qm=mysqli_query($con,"select  months.mname from months order by mid desc ");
while($assoc=mysqli_fetch_assoc($qm)){
  fputcsv($output2, array($row2['status'] ,$row2['amount'],$row2['date'],$assoc['mname'] ));
}
fclose($output2);
fclose($output);

}






 ?>
