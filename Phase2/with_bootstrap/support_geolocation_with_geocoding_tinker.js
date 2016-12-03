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
	  //var lat='40.767612';
	  //var lon='-73.980918';
			var lat=position.coords.latitude;
			var lon=position.coords.longitude;
			var google_latlon= new google.maps.LatLng(lat,lon);
	 		map = new google.maps.Map(document.getElementById('map'), {
          center: google_latlon,
          zoom: 17
      });


			var center_marker= new google.maps.Marker({
					position: map.center,
					map: map,
					icon: "center_car.png",
					size: new google.maps.Size(10,10)
			});
			google.maps.event.addListener(map, 'bounds_changed', function(){
				center_marker.setPosition(map.getCenter());
			});

			google.maps.event.addListener(center_marker,'click',function(){
				$("#myModal").modal();
			})
		/*	var marker = new google.maps.Marker({
					position: google_latlon,
					map: map,
					title: "Here you live!"
			}); */
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
