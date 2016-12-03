function get_geolocation(){

if(navigator.geolocation){
	var opt={
			enableHighAccuracy:true,
			timeout:Infinity,
			maximumAge:0		
	};
		
	navigator.geolocation.getCurrentPosition(showinhtml);
}
else{
	latitude_div.innerHTML="Not Supported";
}
}

function showinhtml(position){

	latitude_div.innerHTML="Latitude is "+position.coords.latitude;
	longitude_div.innerHTML="Longitude is "+position.coords.longitude;
	accuracy_div.innerHTML="Accuracy is "+position.coords.accuracy+" meters";
}