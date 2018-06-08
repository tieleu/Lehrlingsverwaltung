function myFunction(value, user) {
	if (value !== "auswahl") {
		var textOfTest = document.getElementById('chooseTest').options[document.getElementById('chooseTest').selectedIndex].text;
		document.getElementById("title").innerHTML = textOfTest;
	} else {
		document.getElementById("title").innerHTML = "";
	}

	$.ajax({
		type: "POST",
		url: "../phpAction/leaderboardAction.php?user="+user,
		data: { chooseTest: value },
		success: function(data) {
				$("#resultDiv").html(data);
		}
	});
}

