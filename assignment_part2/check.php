<?php
    session_start();
    $host = 'localhost';
    $dbname = 'shoppinglah';
    $user = "admin"; 
    $password = "shoppinglah"; 
    $db = mysqli_connect($host,$user,$password,$dbname);
    //$db = mysqli_connect('localhost','root','','shoppinglah');
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
            $hashedPassword = sha1($password);
            $sql= "SELECT * FROM users WHERE email='$email' AND password='$hashedPassword'";
            $result = mysqli_query($db,$sql);
            //$rowcount = mysqli_num_rows($result);
            
            if($result->num_rows >0){
                while($res=$result->fetch_assoc()){
                  $userid = $res['userid'];
                  $name = $res['name'];
                  $emaill = $res['email'];
                  $pw=$res['password'];
                  $level=$res['level'];
                }
                //register session variable
                
            
                if($emaill===$email && $pw===$hashedPassword ){
                    $_SESSION['logged_in'] = true;
                    $_SESSION['user_id'] = $userid;
                    $_SESSION['user_name'] = $name;
                    $_SESSION['user_email'] = $email;//$getresult = $result-> fetch_row();

                  if($level==="Admin"){
                    echo '<script>alert("Log in as admin successfully")</script>';
                    
                    if(!empty($remember)){
                        setcookie("email",$email,time()+3600);
                        setcookie("password",$password,time()+3600);
                    }else{
                        setcookie("email","");
                        setcookie("password","");
                    }
                    header("Location: home_admin.php?action=login_success");
                  }else {
                    echo '<script>alert("Log in as user successfully")</script>';
                    if(!empty($remember)){
                        setcookie("email",$email,time()+3600);
                        setcookie("password",$password,time()+3600);
                    }else{
                        setcookie("email","");
                        setcookie("password","");
                    }
                    header("Location: home_login.php?action=login_success");
                  }
                }
            }else{
                echo '<script>alert("Username or Password is invalid")</script>';
                header("Location: login.php?action=login_failed");
        }
    }
}else{
    header("Location:login.php");
    exit();
}

?>
