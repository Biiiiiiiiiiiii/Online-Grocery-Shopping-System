<?php
    session_start();
    $host = 'localhost';
    $dbname = 'shoppinglah';
    $user = "admin"; 
    $password = "shoppinglah"; 
    $db = mysqli_connect($host,$user,$password,$dbname);
    
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
        $sql= "SELECT * FROM users WHERE email='$email' ";
        $result = mysqli_query($db,$sql);
        $rowcount = mysqli_num_rows($result);
        $getresult = $result-> fetch_row();
        if($rowcount>=1){
            if($getresult[2]===$email){
              $_SESSION['setemail']=true;
              $_SESSION['userid'] = $getresult[0];
              $_SESSION['name'] = $getresult[1];
              $_SESSION['email'] = $getresult[2];
              //$_SESSION['level'] = $getresult[5];
                echo '<script>alert("Email address is valid")</script>';
                echo "<script>window.location='reset.php';</script>";
              }
            }else {
              echo '<script>alert("Email address is invalid!")</script>';
              echo "<script>window.location='forgetpassword.php';</script>";
            }
        }
?>
