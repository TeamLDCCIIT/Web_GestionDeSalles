/**
 * Created by Tristan LE GACQUE on 08/01/2018.
 */

$(function() {
   
	$('input[data-provide="daterange"]').daterangepicker({
    "timePicker": true,
    "timePicker24Hour": true,
    "startDate": "01/09/2018",
    "endDate": "01/15/2018"
}, function(start, end, label) {
  console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
});
});


