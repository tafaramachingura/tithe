
<?php

require('../db.php');
include("../auth.php"); //include auth.php file on all secure pages
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
<title>Edit User </title>
<style>
.form-control{
  display: inline-block !important;
  width: 30% !important;
  }

label{
  float:none !important;
}
</style>
<link rel="stylesheet" href="../css/style.css" />
<link rel="stylesheet" href="../css/bootstrap.min.css"/>
<link rel="stylesheet" href="../css/bootstrap-theme.min.css"/>

</head>
<body>
  <div id="content" style="margin-top:2%">
<div class="col-md-9" style='margin-right:10%;margin-left:10%;float:right'>

<nav class='navbar navbar-inverse'>
<div class='container-fluid'>
<div class='navbar-header'><a class='navbar-brand' href='../dashboard.php'><i class='glyphicon glyphicon-dashboard'> </i> Dashboard</a>
</div>
<ul  class='nav navbar-nav'>
    <li><a href="../index.php"><i class="glyphicon glyphicon-home"></i> Home</a></li>
<li><a href="#" data-toggle="modal" data-target="#newtithe">New Tithe</a> </li>
<li><a href="../update/new_member.php"><i class="glyphicon glyphicon-user"></i> New member</a></li>
<li class='pull-right'> <a href="../logout.php">  <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Logout</a> </li>
</ul>
</div>
</nav>

<?php

if($_GET['id']){
  $member_id=$_GET['id'];
  $q=mysqli_query($con,"select * from members where member_id='".$member_id."'");
$fetch=mysqli_fetch_assoc($q);


?>
<h3>Edit User <?php echo $fetch['name'] ?></h3>
<form action="" method="post">
<p><label>Name </label><input type="text" class='form-control' name='name' value="<?php echo $fetch['name'] ?>" minlength="4" required></p>
<p><label>SurName</label> <input type="text" class='form-control' name='surname' value="<?php echo $fetch['surname'] ?>" minlength="4" required></p>
<p><label>Email</label> <input type="text" class='form-control' name="email"  value="<?php echo $fetch['email'] ?>" minlength="4" required ></p>
<p><label>CellNumber </label><input type="number" class='form-control' name='cell'  value="<?php echo $fetch['cellnumber'] ?>" minlength="9" required> </p>
<p><label>Address</label><input type="text" class='form-control' name="address" value="<?php echo $fetch['address'] ?>" minlength="4" required></p>
<p><button type="submit" name='submit' class="btn btn-primary" style="margin-left:20%"> <i class="glyphicon glyphicon-ok"></i>Save</button></p>
</form>
<?php


}
if(isset($_POST['submit']))
{
  require('save.php');
}
 ?>

 <script src='../js/jquery-3.3.1.min.js'></script>
 <script src="../js/bootstrap.min.js"></script>
 <script src='../js/tithe.js'></script>

 </body>
 </html>
