<?php 
	session_start();
	
     unset($_GET['user']);
    session_destroy();
    header("Location: login.html"); 
?>