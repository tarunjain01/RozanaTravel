<?php
$trvlloc=$_GET['trvlloc'];
$trvllocrad=$_GET['trvllocrad'];

	include_once("classes/database.php");
	$db=new DBConnection();
	$con=$db->getConnection();
	$q=$con->query("select srctrvl,desttrvl,cntctno,(timeofreport + interval startmins minute) as starttime from trvldata where timeofreport + interval (startmins+30) minute>=now()") or die("Query Execution Failed");

	$resdata="";
	while($row=$q->fetch(PDO::FETCH_ASSOC)){
		$urlbasic="http://maps.googleapis.com/maps/api/directions/json?origin=".urlencode($row['srctrvl'])."&destination=".urlencode($row['desttrvl'])."&sensor=false&alternatives=true&region=in";
		$urlviawaypoint=$urlbasic."&waypoints=via:".$trvlloc;

		$urlbasic_data=file_get_contents($urlbasic);
		$urlviawaypoint_data=file_get_contents($urlviawaypoint);

		$jsonurlbasic_data = json_decode(utf8_encode($urlbasic_data),true);
		$jsonurlviawaypoint_data = json_decode(utf8_encode($urlviawaypoint_data),true);

		if($jsonurlbasic_data['routes'][0]['legs'][0]['distance']['text'] + $trvllocrad >= $jsonurlviawaypoint_data['routes'][0]['legs'][0]['distance']['text'])
			$resdata.="<tr><td>".$row['srctrvl']."</td><td>".$row['desttrvl']."</td><td>".$row['starttime']."</td><td>".$row['cntctno']."</td></tr>";
	}

	if($resdata!="")
		$resdata="<table width='100%' style='text-align:center;'><th>Source</th><th>Destination</th><th>Starting time</th><th>Contact No</th>".$resdata."</table>";
	else
		$resdata="No related data to show";
	echo $resdata;
?>