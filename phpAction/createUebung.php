<?php
session_start();
include('../subsites/header.php');
$user = $_GET['user'];

$uebungsname = $_POST['uebungsname'];
$thema = $_POST['thema'];
$voraussetzung = $_POST['voraussetzung'];



#FILE UPLOAD

$target_dir = "../uebung/".$thema."/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
}else{
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		mysql_query("INSERT INTO Uebung (name, Thema, Voraussetzung, Link) VALUES ('$uebungsname', '$thema', '$voraussetzung', '$target_file')");
		header("Location: ../subsites/einstellungen.php?user=$user");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}