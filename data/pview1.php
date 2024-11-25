
<?php
require('../db.php');
include("../auth.php"); //include auth.php file on all secure pages
require("../functions.php");

?>
<html>
<head>
<style>

img{
  width:100px;
}
</style>
<link rel="stylesheet" href="../css/style.css" />
<link rel="stylesheet" href="../css/bootstrap.min.css"/>
<link rel="stylesheet" href="../css/bootstrap-theme.min.css"/>
<link rel='stylesheet' href='../css/annimate.css'/>
</head>
<body>
<div class="col-md-10">
  <h1>Members payment Information</h1>
<table class='table table-bordered table-striped'>
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


while($row=mysqli_fetch_assoc($q)){?>
<tr>
<td> <?php echo $row['name'] ;?></td>
<td> <?php echo $row['surname']; ?></td>
<td> <?php echo $row['address'] ;?></td>
<td> <?php echo $row['cellnumber']; ?></td>
<td> <?php echo $row['email'] ;?></td>
<td> <?php echo $row['gender']; ?></td>
<td> <?php  echo '<img src="../uploads/'.$row['face'].'">' ?></td>
<td> <?php echo "<input type='checkbox' class='paid'  id=".$row['member_id'].">";?></td>
<td><span class="date"></span></td>
<td><span class='amount'></span></td>
<td><span class='month'></span> <?php  echo date('M') ?></td>
</tr>
<?php }?>
</table>
</div>
<script src='../js/jquery-3.3.1.min.js'></script>
<script src="../js/bootstrap.min.js"></script>
<script>

function tickcheckbox(){
$.ajax({
  type:"POST",
  url:'../new/load.php',
  datatype:JSON,
success:function(data){
var results=JSON.parse(data);
var paid=document.getElementsByClassName("paid");
var amount=document.getElementsByClassName("amount");
var date=document.getElementsByClassName("date");
for(var x=0;x<paid.length;x++){
  for(var i=0;i<results.length;i++){
var id=results[i].member_id

if(paid[x].id===id){
  paid[x].checked=true
  amount[x].innerHTML="$"+results[i].amount
  date[x].innerHTML=results[i].date


}


}}

}
})
}
tickcheckbox();
$(document).ready(function(){
  window.print();
})
</script>
</body>
</html>
