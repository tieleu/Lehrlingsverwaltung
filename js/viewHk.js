$(document).ready(function(){
	$('#selbstbeurteilung').draggable().resizable();
	$("#beurteilungBtn").click(function(){
		$("#selbstbeurteilung").show();
	});
	$('#close').click(function(){
		$('#selbstbeurteilung').hide();
	});
});