$(document).ready(function(){

var createButton = document.getElementById("createUebungBtn"),
	closeButton = document.getElementById("close"),
	popup = document.getElementById("createUebung");
createButton.addEventListener("click", openPopup);
closeButton.addEventListener("click", closePopup);
$(function(){
$("#createUebung").position({my: "center", at: "center", of: "#uebungliste"}).draggable();
});
function openPopup () {
	popup.className = "overlay";
}
function closePopup() {
	popup.className = "overlayHidden";
}

})