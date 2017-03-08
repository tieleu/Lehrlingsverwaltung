$(document).ready(function(){

var createButton = document.getElementById("createUebungBtn"),
	closeButton = document.getElementById("close"),
	popup = document.getElementById("createUebung");
createButton.addEventListener("click", openPopup);
closeButton.addEventListener("click", closePopup);
$(function(){
$("#createUebung").draggable().resizable({
      maxHeight: 500,
      maxWidth: 1712,
      minHeight: 400,
      minWidth: 320
    });
});
function openPopup () {
	popup.className = "overlay";
}
function closePopup() {
	popup.className = "overlayHidden";
}

})