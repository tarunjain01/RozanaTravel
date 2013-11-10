var reportbus=1;
function subbuslocate()
{
	var busnum=document.getElementById('busnum').value;
	var busloc=document.getElementById('busloc').value;
	var bustow=document.getElementById('bustow').value;
	var fillstatus=document.getElementById('situation').value;
	//showAddress(busloc);
	//while(document.getElementById('lath').value==""||document.getElementById('langh').value=="");

	var lat=document.getElementById('lath').value;
	var lang=document.getElementById('langh').value;

	document.getElementById('lath').value="";
	document.getElementById('langh').value="";

	var xmlhttp;
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById('reportres').innerHTML=xmlhttp.responseText;
			//select_innerHTML(document.getElementById('stateName'),xmlhttp.responseText);
			//alert("Data Submitted");
		}
	}
	xmlhttp.open("GET","insbusdata.php?busnum="+busnum+"&busloc="+busloc+"&bustow="+bustow+"&lat="+lat+"&lang="+lang+"&fillstatus="+fillstatus,true);
	xmlhttp.send();

	//initialize(lat,lang);
}

function loadbuslocate()
{
	var busnum=document.getElementById('busnum_search').value;
	var busloc=document.getElementById('busloc_search').value;
	var busrad=document.getElementById('busrad_search').value;
	
	if(busrad=="")
		busrad=1;

	//showAddress(busloc);
	//while(document.getElementById('lath').value==""||document.getElementById('langh').value=="");

	var lat=document.getElementById('lath').value;
	var lang=document.getElementById('langh').value;

	document.getElementById('lath').value="";
	document.getElementById('langh').value="";

	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
	}
	else
	{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4&& xmlhttp.status==200)
		{
			document.getElementById('buslocate').innerHTML=xmlhttp.responseText;
			//select_innerHTML(document.getElementById('cityName'),xmlhttp.responseText);
		}
	}
	//alert("loadbusdata.php?busnum="+busnum+"&busloc="+busloc+"&busrad="+busrad+"&lat="+lat+"&lang="+lang);
	xmlhttp.open("GET","loadbusdata.php?busnum="+busnum+"&busloc="+busloc+"&busrad="+busrad+"&lat="+lat+"&lang="+lang,true);
	xmlhttp.send();

	initialize(lat,lang);
}

//Getting lat and long
function showAddress(address) {
		geocoder = new GClientGeocoder();
		if (geocoder) {
        geocoder.getLatLng(
          address+",India",
          function(point) {
            if (!point) {
              alert(address + " not found");
            } else {
		  //var lat=point.lat().toFixed(5);
	   	  //var lang=point.lng().toFixed(5);
	   	  document.getElementById('lath').value=point.lat().toFixed(5);
	   	  document.getElementById('langh').value=point.lng().toFixed(5);
        }});

          }
          return true;
    }

function loadData(latitude,longitude){
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
	}
	else
	{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4&& xmlhttp.status==200)
		{
			document.getElementById('buslocate').innerHTML=xmlhttp.responseText;
			//select_innerHTML(document.getElementById('cityName'),xmlhttp.responseText);
		}
	}
	//alert("loadbusdata.php?busnum="+busnum+"&busloc="+busloc+"&busrad="+busrad+"&lat="+lat+"&lang="+lang);
	xmlhttp.open("GET","loadbusdata.php?busnum=&busloc=&busrad="+1+"&lat="+latitude+"&lang="+longitude,true);
	xmlhttp.send();
}

function loadbuslocatepredictive()
{
	var busnum=document.getElementById('busnum_search').value;
	var busloc=document.getElementById('busloc_search').value;
	var busrad=document.getElementById('busrad_search').value;
	
	if(busrad=="")
		busrad=5;

	//showAddress(busloc);
	//while(document.getElementById('lath').value==""||document.getElementById('langh').value=="");

	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
	}
	else
	{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4&& xmlhttp.status==200)
		{
			document.getElementById('buslocatepredictive').innerHTML=xmlhttp.responseText;
			//select_innerHTML(document.getElementById('cityName'),xmlhttp.responseText);
		}
	}
	//alert("loadbusdata.php?busnum="+busnum+"&busloc="+busloc+"&busrad="+busrad+"&lat="+lat+"&lang="+lang);
	xmlhttp.open("GET","loadbusdatapredictive.php?busnum="+busnum+"&busloc="+busloc+"&busrad="+busrad,true);
	xmlhttp.send();
}

function reportloctrvl(){
	var srctrvl=document.getElementById('srctrvl').value;
	var desttrvl=document.getElementById('desttrvl').value;
	var startmins=document.getElementById('startmins').value;
	var cntctno=document.getElementById('cntctno').value;

	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
	}
	else
	{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4&& xmlhttp.status==200)
		{
			document.getElementById('reportlocres').innerHTML=xmlhttp.responseText;
			//select_innerHTML(document.getElementById('cityName'),xmlhttp.responseText);
			//alert(xmlhttp.responseText);
		}
	}
	//alert("loadbusdata.php?busnum="+busnum+"&busloc="+busloc+"&busrad="+busrad+"&lat="+lat+"&lang="+lang);
	xmlhttp.open("GET","instrvldata.php?srctrvl="+srctrvl+"&desttrvl="+desttrvl+"&startmins="+startmins+"&cntctno="+cntctno,true);
	xmlhttp.send();
}

function loadtrvldata(){
	var trvlloc_search=document.getElementById('trvlloc_search').value;
	var trvllocrad_search=document.getElementById('trvllocrad_search').value;
	
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
	}
	else
	{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4&& xmlhttp.status==200)
		{
			document.getElementById('trvllocdisp').innerHTML=xmlhttp.responseText;
			//select_innerHTML(document.getElementById('cityName'),xmlhttp.responseText);
			//alert(xmlhttp.responseText);
		}
	}
	//alert("loadbusdata.php?busnum="+busnum+"&busloc="+busloc+"&busrad="+busrad+"&lat="+lat+"&lang="+lang);
	xmlhttp.open("GET","disptrvldata.php?trvlloc="+trvlloc_search+"&trvllocrad="+trvllocrad_search,true);
	xmlhttp.send();	
}

/*function loadtrafficmap(source,dest){
	var jsonlatlngdata="https://maps.googleapis.com/maps/api/directions/json?origin="+source+"&destination="+dest+"&sensor=false&region=in";
	
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
	}
	else
	{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange=function(){
		
		if(xmlhttp.readyState==4&& xmlhttp.status==200)
		{
		var resp=xmlhttp.responseText;
		var jso=eval("("+resp+")");
		alert(jso);
		//mapTraffic(jso.routes.legs[0].start_location.lat,jso.routes.legs[0].start_location.lng,jso.routes.legs[0].start_location.lat,jso.routes.legs[0].start_location.lng);
		}
	}
	xmlhttp.open("GET",jsonlatlngdata,true);
	xmlhttp.send();
}

function mapTraffic(srcLat,srcLng,destLat,destLng){
	alert(srcLat+" "+srcLng+" "+destLat+" "+destLng);
	var map_canvas=document.getElementById('trafficMapArea');	
}*/

function loadtrafficmap(source,dest){
	
}