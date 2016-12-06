<html>
  <head>
    <script src="moment.js"></script>

  </head>
  <body>

    <script>
      //moment().format();
      var chkin=new Date();
      var chkout=new Date();
      chkout.setHours(chkin.getHours()+3);
      chkin=moment(chkin);
      chkout=moment(chkout);
      var dateB = moment('2014-11-11');
var dateC = moment('2014-10-11');

console.log('Difference is ', chkout.diff(chkin,'days'), 'hours');
//console.log('Difference is ', dateB.diff(dateC, 'days'), 'days');
//console.log('Difference is ', dateB.diff(dateC, 'months'), 'months');
    </script>
  </body>
</html>
