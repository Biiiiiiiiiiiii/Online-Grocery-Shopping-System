<?php
    $db = mysqli_connect('localhost','root','','shoppinglah');
    if ($db->connect_errno) {
        printf("Connect failed: %s\n", $db->connect_error);
        exit();
    }
    
    /* check if server is alive */
    if ($db->ping()) {
        printf ("Our connection is ok!\n");
    } else {
        printf ("Error: %s\n", $db->error);
    }

    $profilepic = addslashes(file_get_contents("C:xampp\htdocs\WIF2003MJ\profilepicture.png"));
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $reenterpass = $_POST['reenterpass'];
    if (mysqli_connect_error()){
    die('Connect Error('.mysql_connect_errno().')'.mysql_connect_error());
    }
     else{
        if($email != "" && ($password === $reenterpass)){
           $result = "SELECT * FROM signup where email ='$email' LIMIT 1";
           $limit = mysqli_query($db , $result);
           $num_rows = mysqli_num_rows($limit);
           if($num_rows >=1){
            echo '<script>alert("Email address had been taken! Please re-enter valid email address!")</script>';
            echo "<script>window.location='signup.php';</script>";
           }else{
                 $query = "INSERT INTO `signup` (profilepic,username, email, password) VALUES ('$profilepic','$username','$email','$password')";
                 mysqli_query($db,$query);
                 echo '<script>alert("Sign up successfully!")</script>';
                 echo "<script>window.location='login.php';</script>";
           }
    }else{
        echo "<script>window.location='signup.php';</script>";
    }
}
?>