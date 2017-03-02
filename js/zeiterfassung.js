$(document).ready(function(){


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
if(getCookie("timer")!="" && getCookie("timer")!=null){
	var timerbutton = document.getElementById("savetimestamp");
	console.log(timerbutton);
	if(getCookie("timer")==="red"){
	timerbutton.innerHTML = "Stop Timer";
	timerbutton.style.background("red");		
	}else{
	timerbutton.innerHTML = "Start Timer";		
	timerbutton.style.background("green");
	}
}
	
})
