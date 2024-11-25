<?php
require('db.php');
include("auth.php"); //include auth.php file on all secure pages
require("functions.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
<title>Dashboard - Secured Page</title>
<style>
.form-control{
  display: inline-block !important;
  }
input[type='month']{
  width: auto;
}
img{
  width:100px;
}
</style>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/bootstrap-theme.min.css"/>
<link rel='stylesheet' href='css/annimate.css'/>
</head>
<body>
  <div id="content">
<div class="col-md-10 pull-right" style="margin-right:10%">

<nav class='navbar navbar-inverse'>
<div class='container-fluid'>
<div class='navbar-header'><a class='navbar-brand' href='dashboard.php'><i class='glyphicon glyphicon-dashboard'> </i> Dashboard</a>
</div>
<ul  class='nav navbar-nav'>
    <li><a href="index.php"><i class="glyphicon glyphicon-home"></i> Home</a></li>
<li><a href="#" data-toggle="modal" data-target="#newtithe">New Tithe</a> </li>
<li><a href="update/new_member.php" target="blank"><i class="glyphicon glyphicon-user"></i> New member</a></li>
<li class='pull-right'> <a href="logout.php">  <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Logout</a> </li>
</ul>
</div>
</nav>

<br >
<h4> <a class='text-danger'>This is a Secured page</a> </h4>
<br >

<div id="view">


  <div id='inner-view' class="animated zoomIn">
  <i class='glyphicon glyphicon-remove close'  data-dismiss="modal"></i>
  <img src="" id="views">

  </div>

                </div>

<!-----end of code --->

<div class="loader" style="position: fixed;  height:100%;  left:0;top:0;right:0;z-index:100;
  width:100%;">
  <img src="loader/loader.gif" style="margin-left:40%; margin-right:30%;margin-top:20%">
</div>
<div class="searched">
<table class='table table-bordered table-striped'>
  <tr>
    <th colspan="12">
      <form action="" method="post">
<div class="form-group">
Search members &nbsp;<input type="text" id="emails"  class='form-control emails' placeholder="Email">  &nbsp;&nbsp;
Or Month Information <input type="text" placeholder="05/2020" class="form-control month" id="month">
<input type="button" value="Search" class="btn btn-primary search2">
</form>

<!--- forms for generating data ---->
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<form action="data/csv1.php"  method="post" enctype="multipart/form-data" class="csv_print">
  <button type="submit" name="csv" class='defa'> Save CSV Data  <i class="glyphicon glyphicon-download-alt"></i></button>
</form> &nbsp;&nbsp;&nbsp;
<form class="csv_print" action="data/pview1.php" target="blank">
  <button class="defa"> Print Preview&nbsp;
  <i class="glyphicon glyphicon-print"></i></button>
</form>
<!--- end of form ----->


<span style="margin-left:2%;font-size:20px;color:#0265cb"  id= "<?php echo date('m') ?>" class='dfm' ><?php
$defaultyear=date('M:Y');
 echo $defaultyear; ?>
</span>
</div>
</th>
</tr>
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
   <th>Action</th>
    </tr>

  <tbody>
<?php  while($row=mysqli_fetch_assoc($q)){?>
<tr>
<td> <?php echo $row['name'] ;?></td>
<td> <?php echo $row['surname']; ?></td>
<td> <?php echo $row['address'] ;?></td>
<td> <?php echo $row['cellnumber']; ?></td>
<td> <?php echo $row['email'] ;?></td>
<td> <?php echo $row['gender']; ?></td>
<td> <?php  echo '<img src="uploads/'.$row['face'].'" class="zoom" onclick= "return zoom(this)">' ?></td>
<td> <?php echo "<input type='checkbox' class='paid'  id=".$row['member_id'].">";?></td>
<td><span class="date"></span></td>
<td><span class='amount'></span></td>
<td><span class='month'></span> <?php  echo date('M') ?></td>
<td> <a href="update/edit_member.php?id=<?php echo $row['member_id']?>"><i class='glyphicon glyphicon-pencil'></i></a> <a href='#' onclick=" confirm_delete(this.id)" id="<?php echo $row['member_id']?>"><i class='glyphicon glyphicon-trash text-danger'></i></a></td>
</tr>
<?php }?>
</tbody> <tfoot class='foot'>
<tr><td colspan="12">
<?php require ("new/newtithe.php") ?>
 <ul class='pagination'>
<?php
$current_page="dashboard.php";
$page_link="";
for($i=1;$i<=$tpages;$i++)
          {
              if($page==$i)

              $page_link.="<li class='active'><a href='$current_page?page=".$i."''>".$i."</a></li>";

          else


              $page_link.="<li><a href='$current_page?page=".$i."'>".$i."</a></li>";


          }
		echo "<p style='float:left;margin-right:20px'><b> Pages</b></p>";  echo $page_link;
 ?>
</ul>

</td>
</tr>

</tfoot>
</table>
</div>
</div>
</div>
<script src='js/jquery-3.3.1.min.js'></script>
<script src="js/bootstrap.min.js"></script>
<script src='js/tithe.js'></script>
<script> $(document).ready(function(){
    tickcheckbox()

    search2()
})</script>
</body>
</html>
