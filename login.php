<?php
session_set_cookie_params(3600 * 24, "/");
session_start();

session_cache_limiter(3600);
require ("db/db_connection.php");
if (empty($_POST['username']) || empty($_POST['password'])) {
    $error = "Username or Password is invalid";
    echo json_encode($error);
} else {
    $_username = mysqli_real_escape_string($_POST['username']);
    $_passwort = mysqli_real_escape_string($_POST['passwort']);
    
    $username = $_POST['username'];
    $password = hash("sha256", $_POST['password']);
    echo $username;
    echo $password;
    
    if (! mysqli_query($db, "select username, passwort from User where passwort='$password' AND username= '$username'")) {
        echo ("Error description: " . mysqli_error($db));
    }
    
    $query = mysqli_query($db, "select username, passwort from User where passwort='$password' AND username= '$username'");
    
    $rows = mysqli_num_rows($query);
    echo $rows;
    if ($rows == 1) {
        $_SESSION['login_user'] = $username;
        $_SESSION['eingeloggt'] = true;
        setcookie("passwortCheck", "true");
        header("location:index.php?user=$username");
    } else {
        $error = "Username or Password is invalid";
        $_SESSION['eingeloggt'] = false;
        setcookie("passwortCheck", "false");
        header("Location: login.html");
    }
}
?>