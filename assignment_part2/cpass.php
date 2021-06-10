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

    $password = $_POST['newpassword'];
    $reenterpassword= $_POST['reenternewpassword'];
    if(empty($password)){
        exit();
    }else if(empty($reenterpassword)){
        exit();
    }else{
        if($password===$reenterpassword){
        $id = $_SESSION['ID'];
        $sql="UPDATE signup 
        SET password = $password
        WHERE ID=$id";
        echo $sql;
        $result = mysqli_query($db,$sql);
        echo '<script>alert("New password had been changed")</script>';
        echo "<script>window.location='login.php';</script>";
        }else {
           echo '<script>alert("Please re-enter the same password as above!")</script>';
           echo "<script>window.location='reset.php';</script>";
        }
    }
          
?>