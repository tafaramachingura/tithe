
<?php
if($_POST){
 $face=$_FILES['file']['name'];


require('../db.php');
$name=$_POST['fname'];


$surname=$_POST['lname'];
$address=$_POST['address'];
$email=$_POST['email'];
$cell=$_POST['cell'];
$gender=$_POST['gender'];
$n = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";
  $qs=mysqli_query($con,"select *from members where name='".$name."' and surname='".$surname."'");
  $emailex=mysqli_query($con,"select *from members where email='".$email."'");

  if(mysqli_num_rows($qs)>0)
  {
    echo "<script>alert('user with provided name and surname exits')</script>";
  }
  elseif(mysqli_num_rows($emailex)>0){
    echo "<script>alert('user with provided Email exits exits')</script>";

  }
  else{
       if(!preg_match($n,$name)){
       echo "<script>alert('Enter text only for name')

         </script>";

          }
          elseif(!preg_match($n,$surname)){
              echo "<script>alert('Enter text only for surname')

               </script>";
                      }

                             else{
                          $q=mysqli_query($con,"insert into members(name,surname,address,cellnumber,email,gender,face)

                           values('".$name."','".$surname."','".$address."','".$cell."','".$email."','".$gender."','".$face."')");
move_uploaded_file($_FILES['file']['tmp_name'], '../uploads/'.$face);
                                if($q){
                                       echo "<script>
                                  alert('success')
                                         </script>";
                                          }

                                   }
}
}
?>

<?php

require('../db.php');
include("../auth.php"); //include auth.php file on all secure pages
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
<title>New Member </title>
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
  <div class='col-md-9 pull-right' >
    <h3> Register New Member</h3>
    <form name="registration" action="" method="post" enctype="multipart/form-data">
      <p> <label>First name</label> <input type="text" name="fname" placeholder="first name"  class='form-control' minlength="4" required/></p>
      <p><label>Surname</label> <input type="text" name="lname" placeholder="last name"  class='form-control' minlength='4' required/></p>
      <p>  <label>Email</label><input type="email" name="email" placeholder="Email" class='form-control' minlength='4' required/></p>
      <p> <label>CellNumber</label><input type="number" name="cell" placeholder="cellnumber"   class='form-control' required /></p>
      <p> <label>Address</label><input type="text" name="address" placeholder="address"  class='form-control' required/></p>
      <p> <label>Face </label><input type="file" name="file" class="form-control"  accept="image/*" required/></p>
<p> <label>Gender</label><select name="gender" required class='form-control'>
<option name='male' value='male'> Male</option>
<option name='female' value='female'> Female</option>

</select>

</p>


<p><input type="submit" name="submit" value="Register" /></p>
</form>
</div>



</body>
</html>
