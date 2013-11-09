<!DOCTYPE html>
<html lang="en">
<head>
<title>Destinations</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.4.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>  
<script type="text/javascript" src="js/Myriad_Pro_600.font.js"></script>
<script type="text/javascript" src="js/ajaxutil.js"></script>
<script type="text/javascript" src="js/validate.js"></script>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAgrj58PbXr2YriiRDqbnL1RSqrCjdkglBijPNIIYrqkVvD1R4QxRl47Yh2D_0C1l5KXQJGrbkSDvXFA"
      type="text/javascript"></script>
<!--[if lt IE 9]>
	<script type="text/javascript" src="http://info.template-help.com/files/ie6_warning/ie6_script_other.js"></script>
	<script type="text/javascript" src="js/html5.js"></script>
<![endif]-->
<style type="text/css">
#curlocmap{
	width:500px;
	height:400px;
}
</style>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

</head>
<body id="page2">
<div class="extra">
	<div class="main">
<!-- header -->
		<?php include("header.php"); ?>
<!-- / header -->
<!-- content -->
		<section id="content">
			<h3>Search for bus near location</h3>
			<form>
				<p>Bus Number : <input type="text" id="busnum_search" name="busnum_search"/>
					Location : <input type="text" id="busloc_search" name="busloc_search"/>
					Radius (in kmeters) : <input type="text" id="busrad_search" name="busrad_search"/>
					<input type="button" onclick="var b=validatebusloaddata();if(b) b=showAddress(document.getElementById('busloc_search').value);if(b)loadbuslocate();return b;" value="Search"/>
					<input type="button" onclick="var b=validatebusloaddata();if(b){showAddress(document.getElementById('busloc_search').value);loadbuslocatepredictive();}return b;" value="Predictive Analysis"/></p>
			</form>
			<div id="buslocate">
			</div>
			<br/>
			<div id="curlocmap">
			</div>
			<br/>
			<div id="buslocatepredictive">
			</div><br/>
			<h3>Report the bus seen at location</h3>
			<div id="reportbuslocate">
				<form>
					Bus Number : <input type="text" name="busnum" id="busnum"/>
					Location : <input type="text" name="busloc" id="busloc"/>
					Going Towards : <input type="text" name="bustow" id="bustow"/>
					Situation : <select name="situation" id="situation"><option value="Empty">Empty</option><option value="Moderate">Moderate</option><option value="Full">Full</option><option value="Overcrowded">Overcrowded</option></select>
					<input type="button" onclick="var b=validatebussubdata();if(b){showAddress(document.getElementById('busloc').value);subbuslocate();}return b;" value="Submit"/>
				</form>
			</div>
			<div id="reportres"></div>
			<input type="hidden" id="lath"/>
			<input type="hidden" id="langh"/>
		</section>
<!-- / content -->
	</div>
	<div class="block"></div>
</div>
<div class="body1">
	<div class="main">
<!-- footer -->
		<footer>
			<a href="http://www.templatemonster.com/" target="_blank" rel="nofollow">www.templatemonster.com</a><br>
			<a href="http://www.templates.com/product/3d-models/" target="_blank" rel="nofollow">www.templates.com</a>
		</footer>
<!-- / footer -->
	</div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
<script type="text/javascript">
	$(document).ready(function(){
		if(navigator.geolocation)
			navigator.geolocation.getCurrentPosition(getLatLangLoadData);
		else
			alert("Geolocation support not enabled");
	});
	
	function getLatLangLoadData(position){
		loadData(position.coords.latitude,position.coords.longitude);
		initialize(position.coords.latitude,position.coords.longitude);
	}

	function initialize(latitude,longitude){
		var map_canvas=document.getElementById('curlocmap');
		var myLatlng = new google.maps.LatLng(latitude,longitude);
		var mapOptions={
			center:myLatlng,
			zoom:16,
			mapTypeId:google.maps.MapTypeId.ROADMAP
		}
		var map=new google.maps.Map(map_canvas,mapOptions);
		var marker = new google.maps.Marker({
  			position: myLatlng,
  			map: map,
  			title: "Your location or entered bus location"
		});

	}
	//google.maps.event.addDomListener(window,'load',initialize);
</script>
</body>
</html>