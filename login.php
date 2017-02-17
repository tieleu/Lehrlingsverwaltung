<?php
	      session_start();
  session_cache_limiter(3600);

	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Username or Password is invalid";	

	}
	else{
	    
	    $_username = $_POST["username"]; 
	    $_passwort =$_POST["passwort"]; 

	    $_username = mysql_real_escape_string($_POST["username"]); 
	    $_passwort = mysql_real_escape_string($_POST["passwort"]); 

$servername = "172.16.44.5";
$username = "lehrling";
$password = "sec1.01";

$conn =mysql_connect($servername, $username, $password)
	or die("Fehler im System");

mysql_select_db("Lehrverwaltung");
mysql_query("SET NAMES 'utf8'",$conn);

		$query = mysql_query("select username, passwort from User where passwort='$password' AND username='$username'",$conn);
		$rows = mysql_num_rows($query);

		if ($rows == 1) {
			$_SESSION['login_user']=$username; 
         	$_SESSION['eingeloggt'] = true;
			header("location:index.php?user=$username"); 

		} else {
			echo "Username or Password is invalid";
			$_SESSION['eingeloggt'] = false;
			header("Location: login.html");
		}
	}
?>