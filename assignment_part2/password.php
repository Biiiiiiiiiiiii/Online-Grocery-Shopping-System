<?php
include_once("config.php");
session_start();  

function checkPassword($pwd1, $pwd2){
	if($pwd1==$pwd2) return true;
	else return false;
}

if (isset($_SESSION['logged_in']) && $_SESSION['user_id'] && $_SESSION['user_email'] && $_SESSION['logged_in']==true ){
    $id = $_SESSION['user_id'];
    $sql = "SELECT * FROM users WHERE userid='$id'";
    $result = $mysqli->query($sql);

    while($res=mysqli_fetch_array($result)){
    
?>

<!DOCTYPE html>
<html>
<head>
    <!-- metadata goes in head - Contains information that describes the web page document -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href = "style.css">
    <title>Shoppinglah</title>
</head>

<body>
<!-- content goes in the body - contains text and elements that display in the web page document -->
<nav class="navbar navbar-expand-md navbar-dark fixed-top " style="background-color: #eacefe; ">
    <a href="home_login.php"> <img src="logo.jpg " alt="logo " width="150 " height="40 "></a>
    <button class="navbar-toggler " type="button " data-toggle="collapse " data-target="#navbarCollapse " aria-controls="navbarCollapse " aria-expanded="false " aria-label="Toggle navigation ">
    <span class="navbar-toggler-icon "></span>
    </button>
        <div class="collapse navbar-collapse " id="navbarCollapse ">
            <ul class="navbar-nav mr-auto ">
            <li class="nav-item ">
                <a class="nav-link " style="color: #541191; " href="home_login.php">Home</a></li>
            <li class="nav-item dropdown ">
                                <div class="btn-group">
                                    <a class="nav-link " style="color: #541191; " href="products.php">Category</a>
                                    <button type="button" class="btn dropdown-toggle dropdown-toggle-split" style="background-color: #eacefe; " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="drinks_page.php">Drinks</a>
                                        <a class="dropdown-item" href="dryfood_page.php">Dry Food</a>
                                        <a class="dropdown-item" href="fresh_page.php">Fresh Food</a>
                                        <a class="dropdown-item" href="frozen_page.php">Frozen Food</a>
                                    </div>
                                </div>
                            </li>
                        <li class="nav-item ">
                            <a class="nav-link " style="color: #541191; " href="shoppinglist.php">My Shopping List</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " style="color: #541191; " href="history.php">History</a>
                        </li>
                    </ul>
                    <ul class="nav ">
                        <li class="nav-item "><a href="logout.php" class="nav-link px-2 " style="color: #541191; ">Logout</a></li>
                        <li class="nav-item "><a href="profile.php" class="nav-link px-2 " style="color: #541191; ">
                            <img <?php echo 'src="data:image/jpeg;base64,' . base64_encode($res['pic']) . '"' ?> alt="Admin" class="rounded-circle" width="30"></a></li>
                    </ul>
    </div>
</nav>
<main> 
<!-- Contains the web page document’s main content  -->
<div class="container">
<ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link" style="color:black" href="profile.php">User Profile</a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link active" href="password.php">Password</a>
    </li>
</ul>
<div class="row justify-content-center">
<div class="col-md-7">
    <div><h4 class="text-center">Change Password</h4></div>
    <div class="card mb-3">
    <div class="card-body">
    
<?php

if (isset($_SESSION['logged_in']) && $_SESSION['user_id'] && $_SESSION['user_email'] && $_SESSION['logged_in']==true ){
  $id = $_SESSION['user_id'];
  
if($_SERVER['REQUEST_METHOD']=='POST'){
if(isset($_POST['current']) && isset($_POST['new']) && isset($_POST['confirm'])){
    $curr = $_POST['current'];
    $new = $_POST['new'];
    $confirm =$_POST['confirm'];
    $hashed = sha1($curr);
        $pw = $res['password'];
        $newhash=sha1($new);
        $samepw = checkPassword($pw, $hashed);//check password from database & password from user input
    }
    
    $samepw2 = checkPassword($new, $confirm);

    if(!$samepw || !$samepw2 ){	
    if(!$samepw){ 
        echo "<font color='red'>Wrong password! Try again.</font><br>"; }
    elseif(!$samepw2) {
        echo "<font color='red'>Passwords did not match! Try again.</font><br>";}
    }else{
        $sql2 = "UPDATE users SET password='$newhash' WHERE userid='$id'";
        $result2= $mysqli->query($sql2);
        echo "<h5 style='text align:centre;color:slateblue'>Your new password have been saved.</h5>";
    }
}    
}   
}//end while loop for fetch data from database to 
}

mysqli_close($mysqli);

?>

    <div class="row">
    <div class="col-sm-3"><h6 class="mb-0">Current Password:</h6></div>
    <div class="col-sm-9 text-secondary">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="form-row justify-content-center">
    <div class="form-group col-md-8">
    <input class="form-control" name='current' id="current" placeholder="Current Password" type="password" required>
    </div></div></div></div>

    <div class="row">
    <div class="col-sm-3"><h6 class="mb-0">New Password:</h6></div>
    <div class="col-sm-9 text-secondary">
    <div class="form-row justify-content-center">
    <div class="form-group col-md-8">
    <input class="form-control" name='new'id="new" placeholder="New Password" type="password" required>
    </div></div></div></div>

    <div class="row">
    <div class="col-sm-3"><h6 class="mb-0">Confirm Password:</h6></div>
    <div class="col-sm-9 text-secondary">
    <div class="form-row justify-content-center">
    <div class="form-group col-md-8">
    <input class="form-control" name='confirm' id="confirm" placeholder="Confirm Password" type="password" required>
    </div></div></div></div>

    <div class="container text-center"><button type="submit" name='update'class="btn btn-dark btn-lg">Save changes</button>
    </div>

    </form></div></div>
</div></div></div>

</main>

 <div class="container-fluid pb-0 mb-0 justify-content-center text-light ">
                <footer>
                <div class="row my-1 justify-content-center py-5">
                <div class="col-11">
                <div class="row ">
                                        <div class="col-xl-8 col-md-4 col-sm-4 col-12 my-auto mx-auto a">
                                            <a href="home_login.php "> <img src="logo.jpg" alt="logo " width="250 " height="70 "></a>
                                            <!-- <h3 class="text-muted mb-md-0 mb-5 bold-text">Shoppinglah</h3> -->
                                        </div>
                                        <div class="col-xl-2 col-md-4 col-sm-4 col-12">
                                            <h6 class="mb-3 mb-lg-4 bold-text "><b>About Us</b></h6>
                                            <p style="padding-right: 30px;text-align: justify;text-justify: inter-word;"><strong>Shoppinglah</strong> helps to organise your shopping list easily. Create your own shopping list in a few clicks!</p>
                                        </div>
                                        <div class="col-xl-2 col-md-4 col-sm-4 col-12">
                                            <h6 class="mb-3 mb-lg-4 text-muted bold-text mt-sm-0 mt-5"><b>ADDRESS</b></h6>
                                            <p class="mb-1">Lot 10 Jalan Kuchai Lama</p>
                                            <p class="mb-1">53400</p>
                                            <p class="mb-1">Kuala Lumpur</p>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-xl-8 col-md-4 col-sm-4 col-auto my-md-0 mt-5 order-sm-1 order-3 align-self-end">
                                            <p class="social text-muted mb-0 pb-0 bold-text"> <span class="mx-2"><i class="fa fa-facebook" aria-hidden="true"></i></span> <span class="mx-2"><i class="fa fa-linkedin-square" aria-hidden="true"></i></span> <span class="mx-2"><i class="fa fa-twitter" aria-hidden="true"></i></span>                                                <span class="mx-2"><i class="fa fa-instagram" aria-hidden="true"></i></span> </p><small class="rights"><span>&#174;</span> Shoppinglah All Rights Reserved.</small>
                                        </div>
                                        <div class="col-xl-2 col-md-4 col-sm-4 col-auto order-1 align-self-end ">
                                            <h6 class="mt-55 mt-2 text-muted bold-text"><b>Contact Us</b></h6><small> <span><i class="fa fa-envelope" aria-hidden="true"></i></span> shoppinglah@gmail.com</small>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </footer>
                    </div>
  
  <!-- Include every Bootstrap JavaScript plugin -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
   <script>
      function popmessage(){
        alert("Your changes have been saved");
}
</script>

<style>
body {
    min-height: 75rem;
    padding-top: 4.5rem;
    padding-bottom: 4.5rem;
  }
  
  @import url('https://fonts.googleapis.com/css?family=Rubik&display=swap');
  body {
    background: linear-gradient(0deg, #fff, 50%, #DEEEFE);
    font-family: 'Rubik', sans-serif;
    background: rgb(255, 255, 255);
    height: 100 !important
  }
  
  .container-fluid {
    overflow: hidden;
    margin-top: 250px;
    background: #eacefe;
    color: #541191 !important;
    margin-bottom: 0;
    padding-bottom: 0
  }
  
  .bold-text {
    color: #541191 !important
  }
  
  .mt-55 {
    margin-top: calc(50px + (60 - 50) * ((100vw - 360px) / (1600 - 360))) !important
  }
  
  .wrapper {
    padding: 30px;
    max-width: 1200px;
    margin: auto
  }
    </style>
    
  </body>
  </html>
