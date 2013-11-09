function validatebussubdata(){
	if($('#busnum').val().length==0){
		alert("bus number cannot be empty");
		return false;
	}
	if($('#busloc').val().length==0){
		alert("bus location cannot be empty");
		return false;
	}
	return true;
}

function validatebusloaddata(){
	if($('#busloc_search').val().length==0){
		alert("bus location cannot be empty");
		return false;
	}
	return true;
}

function validatereportloctrvl(){
	if($('#srctrvl').val().length==0){
		alert("Start location cannot be empty");
		return false;
	}
	if($('#desttrvl').val().length==0){
		alert("Destination cannot be empty");
		return false;
	}
	if($('#startmins').val().length==0){
		alert("Start time cannot be empty");
		return false;
	}
	if($('#cntctno').val().length==0){
		alert("Contact no is mandatory");
		return false;
	}
	return true;
}

function validatetrvllocdata(){
	if($('#trvlloc_search').val().length==0){
		alert("location cannot be empty");
		return false;
	}
	return true;	
}

function validatetrafficloc(){
	if($('#source').val().length==0){
		alert("Source location cannot be empty");
		return false;
	}
	if($('#dest').val().length==0){
		alert("Destination cannot be empty");
		return false;
	}
	return true;
}