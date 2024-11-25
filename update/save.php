<?php

require('../db.php');
$name=$_POST['name'];
$surname=$_POST['surname'];
$address=$_POST['address'];
$email=$_POST['email'];
$cell=$_POST['cell'];

$n = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";
if(!preg_match($n,$name)){
  echo "<script>alert('Enter text only for name')

  </script>";

}
elseif(!preg_match($n,$surname)){
  echo "<script>alert('Enter text only for name')

  </script>";
}
else{
  $q=mysqli_query($con,"update members set name='".$name."', surname='".$surname."', email='".$email."',address='".$address."', cellnumber='".$cell."' where member_id='".$member_id."'");
  if($q){
    echo "<script>
alert('success')
    </script>";
  }

}

?>
