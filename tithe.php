<?php
require("db.php");
$name=mysqli_real_escape_string($con,$_POST['name']);
$sname=mysqli_real_escape_string($con,$_POST['sname']);
$amount=mysqli_real_escape_string($con,$_POST['amount']);
$name=strtolower($name);
$sname=strtolower($sname);
$month=$_POST['month'];

$date=date('Y-m-d');

$month_format=explode('/',$month);
$mon=$month_format[0];
$day=date('d');
if(@checkdate($month_format[0],$day,$month_format[1])){
  if($month_format[1]>date('Y') or $month_format[1]<date('Y'))
     {
       echo"date_format";
       exit();

     }
         else{



           $q=mysqli_query($con,"select *from members where name='".$name."' and surname='".$sname."'");

           if(mysqli_num_rows($q)>0){
             $s=mysqli_fetch_assoc($q);
             $member_id=$s['member_id'];
             // dumping payed tithe information *//
             //************************************** preventing user from dumping data more than once ************************
             $md=mysqli_query($con,"select * from tithe where mid='".$member_id."' and montid='".$month_format[0]."'");
                    if(mysqli_num_rows($md)>0){
                      echo "confirm";
                      exit();
                       }
                         else{
                          $d=mysqli_query($con,"insert into tithe(montid,yid,mid,amount,date,status) values('".$month_format[0]."','2020','".$member_id."','".$amount."','".$date."','yes')");
                                   if($d)
                                          {
                                          echo "inserted";
                                          exit();
                                           }
                           }
           }
           else {
             echo "failed";
             exit();
           }







                  }
}
else{
echo"date_format";


}


/*checking to see if user is in the database*/

?>
