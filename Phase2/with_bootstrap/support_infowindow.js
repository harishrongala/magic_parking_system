function get_location(){
	if(navigator.geolocation){
	navigator.geolocation.getCurrentPosition(printem,printer);
	}
	else
	{
	x.innerHTML="Geolocation not supported";
	}
}

	  function printem(position){
			var lat=position.coords.latitude;
			var lon=position.coords.longitude;
			var google_latlon= new google.maps.LatLng(lat,lon);
			map = new google.maps.Map(document.getElementById('map'), {
          center: google_latlon,
          zoom: 17
        });

			var marker = new google.maps.Marker({
				position: google_latlon,
				map: map,
				title: "Here you live!"});

				var infowindow = new google.maps.InfoWindow({
					content: '<div style='+'"width:300px; height:300px"'+'>This is container<br><iframe style="width:300px; height:300px;" src='+'"infowindow_content.php"'+'></iframe></div>'
				});


				marker.addListener('click',function(){
					infowindow.open(map,marker);
				});

			}


		function printer(result){
			var x= document.getElementById("lat");
			x.innerHTML="Something wrong";
		}


// Geo coding support

function handle(){
  var url="https://maps.googleapis.com/maps/api/geocode/json";
  var inp_address=document.getElementById("search_text").value;
  $.get(url,{address:inp_address,key:"AIzaSyCjMCVGz3TlmuKFuwQ-H7-ORIQQlZ6s2mA"},function(data){han(data);});
  }

function han(data){
  if(data.status!="OK"){
    alert("Try to be more specific");
  }
  if(data.status=="OK") {
  var geo_lat=data.results[0].geometry.location.lat;
  var geo_lng=data.results[0].geometry.location.lng;
	map.setCenter({lat:geo_lat,lng:geo_lng});
}
}

// end of geo coding support file
