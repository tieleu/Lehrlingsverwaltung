<?php
	      session_start();
  session_cache_limiter(3600);
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Username or Password is invalid";	
	}
	else{
		$username=$_POST['username'];
		$password=$_POST['password'];

	    $_username = mysql_real_escape_string($_POST["username"]); 
	    $_passwort = mysql_real_escape_string($_POST["passwort"]); 

        include("db/db_connection.php");

		$query = mysql_query("select username, passwort from User where passwort='$password' AND username='$username'", $conn);

		$rows = mysql_num_rows($query);
		if ($rows == 1) {
			$_SESSION['login_user']=$username; 
         	$_SESSION['eingeloggt'] = true;
			header("location:index.php?user=$username"); 

		} else {
			$error = "Username or Password is invalid";
			$_SESSION['eingeloggt'] = false;
			header("Location: login.html");
		}
			mysql_close($conn);
	}
?>