<?php
    $host = 'localhost';
    $dbname = 'shoppinglah';
    $user = "admin"; 
    $password = "shoppinglah"; 
    $mysqli = mysqli_connect($host,$user,$password,$dbname);
    if(mysqli_connect_errno()){
        die("Database connection failed: ".mysqli_connect_error());
    }
    //pls add the user and password in your phpmyadmin owh
?>
