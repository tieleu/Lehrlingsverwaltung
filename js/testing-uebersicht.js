
function myFunction(value, user) {
	$.ajax({
		type: "POST",
		url: "../phpAction/testingUebersichtAction.php?user="+user,
		data: { chooseTest: value },
		success: function(data) {
				$("#resultDiv").html(data);
		}
	});
}