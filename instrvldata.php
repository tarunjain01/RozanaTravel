<?php
$srctrvl=$_GET['srctrvl'];
$desttrvl=$_GET['desttrvl'];
$startmins=$_GET['startmins'];
$cntctno=$_GET['cntctno'];

	include_once("classes/database.php");
	$db=new DBConnection();
	$con=$db->getConnection();
	//echo "insert into trvldata(srctrvl,desttrvl,startmins,cntctno) values('".$srctrvl."','".$desttrvl."',".$startmins.",'".$cntctno."'";
	$q=$con->prepare("insert into trvldata(srctrvl,desttrvl,startmins,cntctno) values('".$srctrvl."','".$desttrvl."',".$startmins.",'".$cntctno."')") or die("Query Execution Failed");
	$n=$q->execute();

	echo "Data Submitted";
?>