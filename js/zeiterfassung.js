$(document).ready(function(){
	$(starttime_input).focus();
	console.log($(starttime_input).is(':focus'));

    while ($(starttime_input).is(':active')){
    	console.log('active');
    }
});