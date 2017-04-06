

if(getCookie('createUser')===true){
	alert("create User SUCCESSFUL!");
}else if (getCookie('createUser')==="error") {
	alert("create User FAILED! \r\n ERROR!");
}
if(getCookie("chpwStatus")==="1"){
    alert(getCookie("chpwMessage"));
}else if(getCookie("chpwStatus")==="0"){
    alert("ERROR\n Eines der eingegebenen Passwörtert ist nicht korrekt!");
}

$(document).ready(function(){

var deleteButton = document.getElementById("deleteUserButton"),
	closeButton = document.getElementById("no"),
	popup = document.getElementById("commitDelete");
deleteButton.addEventListener("click", openPopup);
closeButton.addEventListener("click", closePopup);

function openPopup () {
	popup.className = "overlay";
}
function closePopup() {
	popup.className = "overlayHidden";
}

})

