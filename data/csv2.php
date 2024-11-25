<?php
require("../db.php");
if(isset($_POST['csv'])){
  $email=$_POST['email'];
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');
$output=fopen('php://output','w');
fputcsv($output, array('name','surname','Home Address','CellNumber','Email','Gender'));
$q=mysqli_query($con,"select name, surname,address,cellnumber,email,gender from members where email='".$email."'");
while($row=mysqli_fetch_assoc($q)){
  fputcsv($output,$row);
}
fclose($output);
}



 ?>
