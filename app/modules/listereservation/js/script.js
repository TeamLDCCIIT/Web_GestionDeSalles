/**
 * Created by Tristan LE GACQUE on 08/01/2018.
 */

$(function() {
	
	// this will use clndr's default template, which you probably don't want.
$('#calendar').clndr();

// so instead, pass in your template as a string!
$('#calendar').clndr({
  template: $('#calendar-template').html()
});

// there are a lot of options. the rabbit hole is deep.
$('#calendar').clndr({
  template: $('#calendar-template').html(),
  events: [
    { date: '2013-09-09', title: 'CLNDR GitHub Page Finished', url: 'http://github.com/kylestetz/CLNDR' }
  ],
  clickEvents: {
    click: function(target) {
      console.log(target);
    },
    onMonthChange: function(month) {
      console.log('you just went to ' + month.format('MMMM, YYYY'));
    }
  },
  doneRendering: function() {
    console.log('this would be a fine place to attach custom event handlers.');
  }
});
 
});


