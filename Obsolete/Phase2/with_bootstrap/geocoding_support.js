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
}
}
