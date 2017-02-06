$(document).ready(function(){
	$(starttime_input).focus();
	console.log($(starttime_input).is(':focus'));

	  $(function(){
    var intervalID;
    var freqSecs = 1.2;
    intervalID = setInterval (RepeatCall, freqSecs*1000 );

    function RepeatCall() {
      var inout = (freqSecs*1000)/2;
      $("#starttime_input").fadeIn(inout).fadeOut(inout);
    }

    
  });

    while ($(starttime_input).is(':focus')){
    	
    }
});