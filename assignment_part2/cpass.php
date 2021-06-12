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
    if (isset($_SESSION['setemail']) && $_SESSION['userid'] && $_SESSION['email'] && $_SESSION['setemail']==true ){
        $id = $_SESSION['userid'];
    
    $password = $_POST['newpassword'];
    $reenterpassword= $_POST['reenternewpassword'];
    if(empty($password)){
        exit();
    }else if(empty($reenterpassword)){
        exit();
    }else{
        if($password===$reenterpassword && $_SESSION['userid']){
            $hashedpw = sha1($password);
        //$id = $_SESSION['userid'];
        $sql="UPDATE users 
        SET password = '$hashedpw'
        WHERE userid='$id'";
        //echo $sql;
        $result = mysqli_query($db,$sql);
        echo '<script>alert("New password had been changed")</script>';
        echo "<script>window.location='login.php';</script>";
        //header("location:login.php?action=changed_new_password");
        }else {
           echo '<script>alert("Please re-enter the same password as above!")</script>';
           echo "<script>window.location='reset.php';</script>";
        }
    }}
    //$old_user = $_SESSION['userid'];
unset($_SESSION['valid_user']);
unset($_SESSION['setemail']);
unset($_SESSION['name']);
unset($_SESSION['email']);

session_destroy();
          
?>
