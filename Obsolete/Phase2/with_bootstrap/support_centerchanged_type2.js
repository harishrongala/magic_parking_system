// Global variables

	var user_marker="";
	var cen_lat="";
	var cen_lon="";
	var chkin="";
	var chkout="";
	var fil_setting="";
	var map;
	newmarkers=[];
	oldmarkers=[];
	markers=[];
	buffer=[];
	stat=false;
	var popup;

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
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			zoomControl: false,
			mapTypeControl: false,
			scaleControl: false,
			streetViewControl: false,
			rotateControl: false,
			fullscreenControl: false
    });

		center_marker= new google.maps.Marker({
				position: map.center,
				map: map,
				icon: "center_car.png"
		});
		map.addListener('bounds_changed', update_center);
		markers=[];
		buffer=[];
		//initialize_datepickers();
		execute_critical_query();
		//setInterval(execute_critical_query,2000);
	}

	function update_center(){
		center_marker.setPosition(map.getCenter());
		cen_lat=map.getCenter().lat();
		cen_lon=map.getCenter().lng();
		execute_critical_query();
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

// On click "Reserve" in the modal
function ajax_reservation()
{
	console.log($('#spaceid_modal').html());
	console.log($('#checkin_modal').html());
	console.log($('#checkout_modal').html());
	console.log($('#address_modal').html());
	console.log($('#duration_modal').html());
}

function showmodal(ob){
	$('#spaceid_modal').html(ob.id);
	$('#checkin_modal').html(moment(chkin).format('LLL'));
	$('#checkout_modal').html(moment(chkout).format('LLL'));
	get_time_difference();
	$('#address_modal').html("Reverse geocode");
	$('#duration_modal').html(duration);
	$('#myModal').modal();
}

var duration="";

function get_time_difference()
{

	var a = moment(chkin);

	var b = moment(chkout);
	var hours = parseInt(b.diff(a,'hours'));
	var minutes = parseInt(b.diff(a,'minutes'));
	var days = parseInt(b.diff(a,"days"));
	minutes=minutes % 60;
	hours=hours-(days*24);
	if(days>0 & hours>0 & minutes>0){
		duration=days+" Day(s) "+hours+" Hour(s) "+minutes+" Minute(s)";
	}
	else if(days>0 & hours>0 & minutes<=0)
	{
		duration=days+" Day(s) "+hours+" Hour(s)";
	}
	else if(days>0 & hours<=0 & minutes>0)
	{
		duration=days+" Day(s) "+minutes+" Minute(s)";
	}
	else if(days>0 & hours<=0 & minutes<=0)
	{
		duration=days+" Day(s) ";
	}
	else if(days<=0 & hours>0 & minutes>0)
	{
		duration=hours+" Hour(s) "+minutes+" Minute(s)";
	}
	else if(days<=0 & hours>0 & minutes<=0)
	{
		duration=hours+" Hour(s)";
	}
	else if(days<=0 & hours<=0 & minutes>0)
	{
		duration=minutes+" Minute(s)";
	}
}

	// Ajax call in this function
	// Called by setInterval
	function ping()
	{
		$.ajax({url:"handleajax.php", success:function(result)
		{
			get_markers(result);
		}});
	}


//// Testing new algorithm


	function just_create_markers_from_view(result)
	{
		//stat=false;
		var obj=$.parseJSON(result);
		var len=obj.length;
		var i=0;
		newmarkers=[];
		while(i<len)
		{
			var lat=obj[i].lat;
			var lon=obj[i].lon;
			var google_latlon= new google.maps.LatLng(lat,lon);
			var nmarker = new google.maps.Marker(
			{
				position: google_latlon,
				title: "You can park here",
				id: obj[i].space_id
			});
			google.maps.event.addListener(nmarker,'click',function(){showmodal(this);});
			newmarkers.push(nmarker);
			i++;
		}
		return(newmarkers);
	}

function get_markers(result)
{
	if(markers.length<=0)
	{
	markers=just_create_markers_from_view(result);
	for(var i=0;i<markers.length;i++)
	{
		markers[i].setMap(map);
	}
	}
	else {
	buffer=just_create_markers_from_view(result);
	embrace_change();
	}

}

function embrace_change()
{
	marker_len=markers.length;
	buffer_len=buffer.length;
	splice_buffer=[];
	splice_markers=[];
	for(var q=0;q<marker_len;q++)
	{
		stat=false;
		for(var w=0;w<buffer_len;w++)
		{
			var chk=markers[q].getPosition().equals(buffer[w].getPosition());
			stat |=chk;
			// If matched
			if(chk)
			{
				// Save these indices in array to remove at end of the loop
				splice_buffer.push(w);
			}

		}
		// Not matched item obsolete
		if(stat==false | stat==0)
		{
		// Store the indices to remove them from map
		splice_markers.push(q);
		}
	}

	// Splice them accordingly
	// Splicing buffer
	for(var i=0;i<splice_buffer.length;i++)
	{
		buffer.splice(splice_buffer[i],1);
	}

	// Splicing markers
	for(var i=0;i<splice_markers.length;i++)
	{
		markers[splice_markers[i]].setMap(null);
		markers.splice(splice_markers[i],1);
	}

	// Finally Push remainder of buffer to markers
	for(var i=0;i<buffer.length;i++)
	{
		var ind=markers.push(buffer[i])-1;
		markers[ind].setMap(map);
	}
}




// This is executed on pressing
// "Locate me" on the map
function recenter_map()
{
	if(navigator.geolocation){
		var opt={
			enableHighAccuracy: true,
			timeout: Infinity,
			maximumAge: 0
		};
		navigator.geolocation.getCurrentPosition(recentering);
	}
}

function recentering(position){
	cen_lat=position.coords.latitude;
	cen_lon=position.coords.longitude;
	var updated_latlon= new google.maps.LatLng(cen_lat,cen_lon);
	map.setCenter(updated_latlon);
	execute_critical_query();
	// get or post to update view on center change
	//update_center();

}

// Handle Keypress - Enter of Searchbar
$(document).ready(function()
{
	$("#searchtext").keyup(function(event)
	{
	    if(event.keyCode == 13){
				handle_geocoding();
				$("#notify_here").html($("#searchtext").val());

	    }
	})
});

// Set default values for datetimepickers
$(document).ready(function()
	{
		$('#checkinpicker').datetimepicker(
	    {
	      format : "DD/MM/YYYY hh:mm",
	      minDate: new Date(),
	      stepping: 30,
	      widgetPositioning: {
	            horizontal: 'left',
	            vertical: 'bottom'
	        }
	  })
});

$(document).ready(function(){
	$('#checkoutpicker').datetimepicker(
		{
			format : "DD/MM/YYYY hh:mm",
			minDate: new Date(),
			stepping: 30
		}
	)
	initialize_datepickers();
});


function initialize_datepickers(){
  var ap=new Date();
  if(ap.getMinutes()>30)
  {
    ap.setMinutes(0);
    ap.setHours((ap.getHours()+1));
  }
  if(ap.getMinutes()>0 & ap.getMinutes()<30){
    ap.setMinutes(30);
  }
  $('#checkinpicker').data('DateTimePicker').date(ap);
  ap.setHours(ap.getHours()+3);
  $('#checkoutpicker').data('DateTimePicker').date(ap);
	chkin=$('#checkinpicker').data('DateTimePicker').date();
	chkin=new Date(chkin);
	chkout=$('#checkoutpicker').data('DateTimePicker').date();
	chkout=new Date(chkout);
}

// Retrieve and update dateclock picker values
function set_datepicker_values()
{
	chkin=$('#checkinpicker').data('DateTimePicker').date();
	chkin=new Date(chkin);
	chkout=$('#checkoutpicker').data('DateTimePicker').date();
	chkout=new Date(chkout);
}

// Retrieve and update filter values
function grab_filter_setting()
{
	fil_setting=$('#filter').val();
}

// Execute this on click of "Find Parking"
function cmon_find_parking()
{
	set_datepicker_values();
	execute_critical_query();
}

function format_dates()
{
	cint=chkin.getFullYear()+"-"+(chkin.getMonth()+1)+"-"+chkin.getDate()+" "+chkin.getHours()+":"+chkin.getMinutes();
	cout=chkout.getFullYear()+"-"+(chkout.getMonth()+1)+"-"+chkout.getDate()+" "+chkout.getHours()+":"+chkout.getMinutes();
}

// This creates view as per user input
function execute_critical_query()
{
	grab_filter_setting();
	format_dates();
	$.get("critical_query.php",{checkin:cint,checkout:cout,filter:fil_setting,lat:cen_lat,lon:cen_lon},function(data){$("#notify_here").html(data);ping();});
	ping();
}


// Geo coding support

	function handle_geocoding(){
	  var url="https://maps.googleapis.com/maps/api/geocode/json";
		// In tinker search_text is searchtext
	  var inp_address=document.getElementById("searchtext").value;
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
