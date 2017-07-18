<?php
session_start();

// store session data
if (isset($_SESSION['id']))
    $_SESSION['login_user'] = $_SESSION['login_user']; // or if you have any algo.
?>