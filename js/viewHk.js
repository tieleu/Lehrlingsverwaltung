$(document).ready(function(){
	$('#selbstbeurteilung').draggable().resizable({
		minWidth : 600,
		minHeight : 600
	});
	$('#projects').draggable().resizable({
		minWidth : 400,
		minHeight : 300
	});
	$("#beurteilungBtn").click(function(){
		$("#selbstbeurteilung").show();
	});
	$('#btnNext').click(function(){
		$('#projects').show();
	});
	$('#closeSb').click(function(){
		$('#selbstbeurteilung').hide();
	})
	$('#closeProjects').click(function(){
		$('#projects').hide();
	});
});