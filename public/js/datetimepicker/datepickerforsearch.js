var pickerFrom = new MaterialDatetimePicker({})
  .on('submit', function(fromdate) {
	
	afrom.value = fromdate;
  });

var el = document.querySelector('.homework_from');
el.addEventListener('click', function() {
  pickerFrom.open();
}, false);

var pickerTo = new MaterialDatetimePicker({})
  .on('submit', function(todate) {
	ato.value = todate;
  });

var el = document.querySelector('.homework_to');
el.addEventListener('click', function() {
  pickerTo.open();
}, false);

function getMonthFromString(mon){
   var d = Date.parse(mon + "1, 2017");
   if(!isNaN(d)){
	  return new Date(d).getMonth() + 1;
   }
   return -1;
}