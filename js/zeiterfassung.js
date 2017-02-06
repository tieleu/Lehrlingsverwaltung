$(document).ready(function(){
    $(starttime_input).focus(function(){
    	$(this).hide();
    });
    while ($(starttime_input).active()){
    	console.log('active');
    }
});