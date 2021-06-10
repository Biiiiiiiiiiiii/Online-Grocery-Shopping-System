<?php
    session_start();
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

    $email = $_POST['checking'];
    if(empty($email)){
        exit();
    }else{
        $sql= "SELECT * FROM signup WHERE email='$email' ";
        $result = mysqli_query($db,$sql);
        $rowcount = mysqli_num_rows($result);
        $getresult = $result-> fetch_row();
        if($rowcount>=1){
            if($getresult[3]===$email){
              $_SESSION['ID'] = $getresult[0];
              $_SESSION['username'] = $getresult[2];
              $_SESSION['email'] = $getresult[3];
              $_SESSION['level'] = $getresult[5];
                echo '<script>alert("Email address is valid")</script>';
                echo "<script>window.location='reset.php';</script>";
              }
            }else {
              echo '<script>alert("Email address is invalid!")</script>';
              echo "<script>window.location='forgetpassword.php';</script>";
            }
        }
?>