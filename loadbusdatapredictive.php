<?php
$busnum=$_GET['busnum'];
$busloc=$_GET['busloc'];
$busrad=$_GET['busrad'];
	
	$urlforlatlang="http://maps.googleapis.com/maps/api/geocode/json?address=".$busloc."&sensor=false&region=in";
	$urldata=file_get_contents($urlforlatlang);
	$jsonurldata=json_decode(utf8_encode($urldata),true);

	$lat=$jsonurldata['results'][0]['geometry']['location']['lat'];
	$lang=$jsonurldata['results'][0]['geometry']['location']['lng'];

	include_once("classes/database.php");
	$db=new DBConnection();
	$con=$db->getConnection();
	//echo $busrad;

	$q=$con->query("select *,SEC_TO_TIME(AVG(TIME_TO_SEC(time(timeofreport)))) as esttime from (SELECT *,round((((acos(sin((".$lat."*pi()/180)) * sin((lat*pi()/180))+cos((".$lat."*pi()/180)) * cos((lat*pi()/180)) * cos(((".$lang."- lang)*pi()/180))))*180/pi())*60*1.1515*1.609344)) as distance FROM busdata where (hour(timeofreport)=hour(now()) or hour(timeofreport)=hour(now()+interval 1 hour)) and ('".strtolower($busnum)."'=lower(busnum) or '".$busnum."'='')) as resdata where distance <=".$busrad." group by round(minute(timeofreport),-1)");
	
	//echo "SELECT * FROM busdata where date(timeofreport)=current_date() and ('".strtolower($busnum)."'=lower(busnum) or ".$busnum."='')";
	$data="";
	while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
		$data.="<tr><td>".$row['busnum']."</td><td>".$row['busloc']."</td><td>".$row['esttime']."</td><td>".$row['distance']."</td></tr>";
	}

	if($data!="")
		$data="<h3>Estimated timing based on previous data for two hours</h3><table width='100%' style='text-align:center;'><tr><th>Bus Number</th><th>Bus Location</th><th>At Time</th><th>Distance</th><tr>".$data."</table>";
	else
		$data="No data present to show";
	echo $data;
?>