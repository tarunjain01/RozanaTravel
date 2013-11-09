<?php
$busnum=$_GET['busnum'];
$busloc=$_GET['busloc'];
$busrad=$_GET['busrad'];
$lat=$_GET['lat'];
$lang=$_GET['lang'];
	include_once("classes/database.php");
	$db=new DBConnection();
	$con=$db->getConnection();
	//echo $busrad;
	$q=$con->query("select busnum,busloc,bustow,time(timeofreport) as timeofreport,distance,fillstatus from (SELECT *,round((((acos(sin((".$lat."*pi()/180)) * sin((lat*pi()/180))+cos((".$lat."*pi()/180)) * cos((lat*pi()/180)) * cos(((".$lang."- lang)*pi()/180))))*180/pi())*60*1.1515*1.609344)) as distance FROM busdata where date(timeofreport)=current_date() and ('".strtolower($busnum)."'=lower(busnum) or '".$busnum."'='')) as resdata where distance <=".$busrad." order by timeofreport desc");
	
	//echo "SELECT * FROM busdata where date(timeofreport)=current_date() and ('".strtolower($busnum)."'=lower(busnum) or ".$busnum."='')";
	$data="";
	while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
		$data.="<tr><td>".$row['busnum']."</td><td>".$row['busloc']."</td><td>".$row['bustow']."</td><td>".$row['timeofreport']."</td><td>".$row['distance']."</td><td>".$row['fillstatus']."</td></tr>";
	}

	if($data!="")
		$data="<table width='100%' style='text-align:center;'><tr><th>Bus Number</th><th>Bus Location</th><th>Going Towards</th><th>At Time</th><th>Distance</th><th>Situation</th><tr>".$data."</table>";
	else
		$data="No related data present";
	echo $data;
?>