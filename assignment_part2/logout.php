<?php
session_start();

$old_user = $_SESSION['user_id'];
unset($_SESSION['valid_user']);
unset($_SESSION['logged_in']);
unset($_SESSION['user_name']);
unset($_SESSION['user_email']);

session_destroy();
header("location:index.html")
?>
