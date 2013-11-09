<?php
$busnum=$_GET['busnum'];
$busloc=$_GET['busloc'];
$bustow=$_GET['bustow'];
$lat=$_GET['lat'];
$lang=$_GET['lang'];
$fillstatus=$_GET['fillstatus'];

	include_once("classes/database.php");
	$db=new DBConnection();
	$con=$db->getConnection();
	$q=$con->prepare("insert into busdata(busnum,busloc,bustow,lat,lang,fillstatus) values('".str_replace("-","",$busnum)."','".$busloc."','".$bustow."',".$lat.",".$lang.",'".$fillstatus."') ") or die("Query Execution Failed");
	$n=$q->execute();

	echo "Data inserted";
?>