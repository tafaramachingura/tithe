<?php
$servername ="localhost";
$usernane = "dean";
$password = "deandean";
$con = new mysqli($servername,'root','','register' );
if ($con -> connect_error)
{
die("connection failed". $con -> connect_error);
}
else{}
?>