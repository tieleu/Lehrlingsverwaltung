$(document).ready(function(){
	$(starttime_input).focus();
	console.log($(starttime_input).is(':focus'));
	var $test;

	  $(function(){
    var intervalID;
    var freqSecs = 1.2;
    intervalID = setInterval (RepeatCall, freqSecs*1000 );

    function RepeatCall() {
      var inout = (freqSecs*1000)/2;
      $("#starttime_input").fadeIn(inout).fadeOut(inout);
      document.cookie = $(('#starttime_input').valueOf());
      $test = document.cookie;
      console.log($test);

    }

    
  });

    
});