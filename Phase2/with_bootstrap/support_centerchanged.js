// Global variables
	setInterval(ping,100);
	var user_marker="";
	var cen_lat="";
	var cen_lon="";
	newmarkers=[];
	oldmarkers=[];
	stat=false;
	var popup;
	var popup_content="<form action='#'><input type='time' placeholder='Checkin time'></input><button>Reserve</button></form>";
	// Global variables end

	// Get the geolocation
	function geolocation()
	{
		if(navigator.geolocation){
			var opt={
				enableHighAccuracy: true,
				timeout: Infinity,
				maximumAge: 0
			};
			navigator.geolocation.getCurrentPosition(load);
		}
	}

	// Map Initializer
	function load(position){
		cen_lat=position.coords.latitude;
		cen_lon=position.coords.longitude;
		var google_latlon= new google.maps.LatLng(cen_lat,cen_lon);
		map = new google.maps.Map(document.getElementById('map'),
		{
			center: google_latlon,
			zoom: 15,
			mapTypeId: google.maps.MapTypeId.ROADMAP
        });

		popup=new google.maps.InfoWindow({content:popup_content});
		/*user_marker=new google.maps.Marker(
		{
			position: google_latlon,
			map: map
		});
		*/
		// Create View for easy access until center changed
		center_marker= new google.maps.Marker({
				position: map.center,
				map: map,
				icon: "center_car.png"
		});
		$.post("view.php",{cur_lat: cen_lat, cur_lon: cen_lon});
		map.addListener('bounds_changed', update_center);
		ping();
	}

	function update_center(){
		center_marker.setPosition(map.getCenter());
		cen_lat=map.getCenter().lat();
		cen_lon=map.getCenter().lng();
		// Remove all old and new markers
		for(var o=0;o<oldmarkers.length;o++){
			oldmarkers[o].setMap(null);
			oldmarkers[o]=null;
			oldmarkers.splice(o,1);
			}
		for(var o=0;o<newmarkers.length;o++){
			newmarkers[o].setMap(null);
			newmarkers[o]=null;
			newmarkers.splice(o,1);
			}
		//alert("New Center "+cen_lat+" "+cen_lon);
		$.post("view.php",{cur_lat: cen_lat, cur_lon: cen_lon});
		ping();
	}
	// Function that sets marker icons
	function space_status(occ,res){
		if(res=="YES" & occ=="NO")
		return "reserved.png";

		else if(res=="YES" & occ=="YES" | occ=="YES")
		return "occupied.png";

		else if(res=="NO" & occ=="NO")
		return "vacant.png";
	}

	// Ajax call in this function
	// Called by setInterval
	function ping(){
		$.ajax({url:"handleajax.php", success:function(result)
		{
			stat=false;
			var obj=$.parseJSON(result);
			var len=obj.length;
			var i=0;
			while(i<len)
			{
				var lat=obj[i].lat;
				var lon=obj[i].lon;
				var status="";
				status=space_status(obj[i].is_occupied,obj[i].is_reserved);
				var google_latlon= new google.maps.LatLng(lat,lon);
				var nmarker = new google.maps.Marker(
				{
					position: google_latlon,
					title: "Here you live!",
					icon: status
				});
				newmarkers.push(nmarker);
				i++;
			}

			// For the first time oldmarkers is 0
			// This runs for the first time
			if(oldmarkers.length<=0)
			{
				for(b=0;b<newmarkers.length;b++)
				{
					newmarkers[b].setMap(map);
					if(newmarkers[b].icon=="vacant.png"){
					google.maps.event.addListener(newmarkers[b],'click',function(){popup.open(map,this)});
					}
				}
				oldmarkers=newmarkers;
				newmarkers=[];
			}
			// For rest of the loop oldmarkers will have some objects
			// This is when comparision needed
			else if(oldmarkers.length>0)
			{
			var rm_ind=[];
			var map_rm_ind=[];
				for(q=0;q<oldmarkers.length;q++)
				{
					stat=false;
					for(w=0;w<newmarkers.length;w++)
					{
						var chk=oldmarkers[q].getPosition().equals(newmarkers[w].getPosition());
						stat |=chk;
						if(chk)
						{
							oldmarkers[q].setIcon(newmarkers[w].icon);
							// Save these indices in array to remove at end of the loop
							rm_ind.push(w);
						}

					}
					if(stat==false | stat==0)
					{
					// Store the indices to remove them from map
					map_rm_ind.push(q);
					}
				}
				//remove obsolete markers from map
				for(u=0;u<map_rm_ind.length;u++)
				{
					oldmarkers[u].setMap(null);
					oldmarkers[u]=null;
					oldmarkers.splice(u,1);
				}
				map_rm_ind=[];
				// remove existing markers from newmarkers
				for(f=0;f<rm_ind.length;f++)
				{
					newmarkers.splice(f,1);
				}
				rm_ind=[];
				for(r=0;r<newmarkers.length;r++)
				{
					newmarkers[r].setMap(map);
					if(newmarkers[r].icon=="vacant.png"){
					google.maps.event.addListener(newmarkers[r],'click',function(){popup.open(map,this)});
					}
				}
				oldmarkers=oldmarkers.concat(newmarkers);
				newmarkers=[];
			}

	}
	});
	}
