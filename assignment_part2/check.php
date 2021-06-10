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

    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember = $_POST['remember'];
    if(isset($_POST['email']) and isset($_POST['password'])){
        function validate($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data ;
        }
        $email = validate($email);
        $password = validate($password);
        if(empty($email)){
            exit();
        }else if(empty($password)){
            exit();
        }else{
            $sql= "SELECT * FROM signup WHERE email='$email' AND password='$password'";
            $result = mysqli_query($db,$sql);
            $rowcount = mysqli_num_rows($result);
            $getresult = $result-> fetch_row();
            if($rowcount>=1){
                if($getresult[3]===$email && $getresult[4]===$password ){
                  if($getresult[5]==="Admin"){
                    echo '<script>alert("Log in as admin successfully")</script>';
                    echo "<script>window.location='home_admin.php';</script>";
                    if(!empty($remember)){
                        setcookie("email",$email,time()+3600);
                        setcookie("password",$password,time()+3600);
                    }else{
                        setcookie("email","");
                        setcookie("password","");
                    }
                  }else {
                    echo '<script>alert("Log in as user successfully")</script>';
                    echo "<script>window.location='home_login.php';</script>";
                  }
                }
            }else{
                echo '<script>alert("Username or Password is invalid")</script>';
                echo "<script>window.location='login.php';</script>";
        }
    }
}else{
    header("Location:login.php");
    exit();
}

?>