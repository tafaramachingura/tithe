<?php

if(isset($_GET['page'])){

	$page=$_GET['page'];
}
else{
	$page=1;
}
      $rows_page=5;
             $offset=($page-1)*$rows_page;

               $qr=mysqli_query($con,"select count(*) from members  left join tithe on members.member_id =tithe.mid");

            $nrows= mysqli_fetch_row($qr);
             $Trows=$nrows[0];

			 $tpages=ceil($Trows/$rows_page);

$date=date('m');
$q=mysqli_query($con,"select * from members  left join tithe on members.member_id =tithe.mid and tithe.montid='".$date."' limit $offset, $rows_page");

?>
