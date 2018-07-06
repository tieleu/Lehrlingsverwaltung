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

myFunction("gesamtuebersicht", getCookie("username"));

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