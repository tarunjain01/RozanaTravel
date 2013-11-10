<!DOCTYPE html>
<html lang="en">
<head>
<title>Find Lifts</title>
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
			<h3>Enter location for finding any commuters going through that route</h3>
			<form>
				<p>Location : <input type="text" id="trvlloc_search" name="trvlloc_search"/>
					Distnce Difference (in kmeters) : <input type="text" id="trvllocrad_search" name="trvllocrad_search" value="3"/>
					<input type="button" onclick="var b=validatetrvllocdata();if(b)loadtrvldata();return b;" value="Search"/>
			</form>
			<div id="trvllocdisp">
			</div>
			<br/><br/>
			<div id="curlocmap">
			</div>
			<br/><br/>
			<h3>Enter locations of travel</h3>
			<div id="reportloctravel">
				<form>
					Source : <input type="text" name="srctrvl" id="srctrvl"/>
					Destination : <input type="text" name="desttrvl" id="desttrvl"/>
					Starting in (mins) : <input type="text" name="startmins" id="startmins" value="0"/>
					Contact No : <input type="text" name="cntctno" id="cntctno"/>
					<input type="button" onclick="var b=validatereportloctrvl();if(b)reportloctrvl();return b;" value="Submit"/>
				</form>
			</div>
			<input type="hidden" id="lath"/>
			<input type="hidden" id="langh"/>
			<div id="reportlocres"></div>
		</section>
<!-- / content -->
	</div>
	<div class="block"></div>
</div>
<div class="body1">
	<div class="main">
<!-- footer -->
		<footer>
			<p>&copy; Rozana Travel</p>
		</footer>
<!-- / footer -->
	</div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>