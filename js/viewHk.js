$(document).ready(function(){
	if (getCookie("projects")) {
		$('#projects').show();
	}
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
		var a = new Date();
		a = new Date(a.getTime()+3000);
		document.cookie = "projects=true; expires="+a.toUTCString()+"; path=/";
		$('#projects').show();

	});
	$('#closeSb').click(function(){
		$('#selbstbeurteilung').hide();
	})
	$('#closeProjects').click(function(){
		$('#projects').hide();
	});
});