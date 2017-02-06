$(document).ready(function(){
	$(starttime_input).focus();
	console.log($(starttime_input).is(':focus'));

	var $cookietime; 

    while ($(starttime_input).is(':focus')){
    	$(function(){
	    var intervalID;
	    var freqSecs = 1.2;
	    intervalID = setInterval (RepeatCall, freqSecs*1000 );

	    function RepeatCall() {
	      document.cookie = valueOf($('#starttime_input'));
	      $cookietime = document.cookie;
	      console.log($cookietime);
	    }

	    
	  });
	    	
	    }
});