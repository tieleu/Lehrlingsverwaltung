function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

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
myFunction("gesamtuebersicht", getCookie("username"));
