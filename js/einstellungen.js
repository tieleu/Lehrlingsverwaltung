$(document).ready(function(){

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


})