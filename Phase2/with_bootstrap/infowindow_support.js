function format_time(hr,min){
  var amOrPm="PM";
  if(hr<12){
    amOrPm="AM";
  }
  if(hr>12){
    hr=hr-12;
  }
  return(hr+":"+min+amOrPm);
}

function handle_field_time(){
  var dt=new Date;
  time=format_time(dt.getHours(),dt.getMinutes());
  document.getElementById("field1").value=time;
  time2=format_time(dt.getHours()+1,dt.getMinutes());
  document.getElementById("field2").value=time2;
}

var clk1=$('#clock1').clockpicker({
  twelvehour: true,
  donetext: 'Done',
  'default':'now',
  afterDone: function(){
      alert(clk1.data().clockpicker.amOrPm);}

})

var clk2=$('#clock2').clockpicker({
  twelvehour: true,
  donetext: 'Done',
  'default':'now',
  afterDone: function(){
      alert(clk2.data().clockpicker.amOrPm);
  }
})

function getval(){
alert(String($('.clockpicker').val()));
}
