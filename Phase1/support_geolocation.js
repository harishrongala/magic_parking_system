function get_location(){
	if(navigator.geolocation){
		var opt={
			enableHighAccuracy: true,
			timeout: Infinity,
			maximumAge: 0
		};
		//var watchID=navigator.geolocation.watchPosition(printem,printer,opt);
	navigator.geolocation.getCurrentPosition(printem,printer);
	
	}
	else{
	x.innerHTML="Geolocation not supported";
	}
}

function printem(position){
	var lat=position.coords.latitude;
	var lon=position.coords.longitude;
	var acc=position.coords.accuracy;
	var google_latlon= new google.maps.LatLng(lat,lon);
	var mapopt={
		zoom:10,
		center:google_latlon,
		mapTypeId:google.maps.MapTypeId.ROAD
	}
	var web_map=document.getElementById("map");
	var map=new google.maps.Map(web_map,mapopt);
	var x=document.getElementById("lat");
	x.innerHTML="Latitude is "+lat;
	var y=document.getElementById("lon");
	y.innerHTML="Longitude is"+lon;
	var z=document.getElementById("acc");
	z.innerHTML="Accuracy is "+acc;
	var lat=position.coords.latitude;
	var lon=position.coords.longitude;
	var acc=position.coords.accuracy;
	var google_latlon= new google.maps.LatLng(lat,lon);
	 map = new google.maps.Map(document.getElementById("map"), {
          center: google_latlon,
          zoom: 19
        });
	var marker = new google.maps.Marker({
		position: google_latlon,
		map: map,
		title: "Here you live!",
		icon: 'reserved.png'});
		marker.setMap(map);
	var nmarker = new google.maps.Marker({
		position: new google.maps.LatLng(lat,lon+0.00005),
		map: map,
		title: "Here you live!",
		icon: 'vacant.png'});
		nmarker.setMap(map);
	var mmarker = new google.maps.Marker({
		position: new google.maps.LatLng(lat,lon+0.0001),
		map: map,
		title: "Here you live!",
		icon: 'occupied.png'
		});
		
		mmarker.setMap(map);
		
	var infowindow = new google.maps.InfoWindow({
		content: "Rem: 2:00"
	});
	//infowindow.open(map,marker);
	var infowindow1 = new google.maps.InfoWindow({
		content: '<button onclick="save_data()">'+'Helo'+'</button>'
		});
		
	
	
	var infowindow2 = new google.maps.InfoWindow({
		content: "Rem: 1:30"
	});
	//infowindow2.open(map,mmarker);
		google.maps.event.addListener(nmarker,'click',function (){
		infowindow1.open(map,nmarker);
	});
}

function save_data(){
	window.location.href="gmaps_geolocation_test_sample.html";
}

function printer(result){
	var x= document.getElementById("lat");
	x.innerHTML="Something wrong";
}

