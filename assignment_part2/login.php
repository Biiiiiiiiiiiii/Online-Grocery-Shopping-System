<!DOCTYPE html>
<html>
<head>
    <!-- metadata goes in head - Contains information that describes the web page document -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href = "login.css">
    <title>Shoppinglah</title>
</head>
<body>
  <form action="check.php" method="post" style="border:1px solid rgb(145, 160, 226)">

  <nav class="navbar navbar-expand-md navbar-dark fixed-top " style="background-color: #eacefe; ">
    <a href="index.html"> <img src="logo.jpg " alt="logo " width="150 " height="40 "></a>
    <button class="navbar-toggler " type="button " data-toggle="collapse " data-target="#navbarCollapse " aria-controls="navbarCollapse " aria-expanded="false " aria-label="Toggle navigation "></button>
  </nav>
 

    <div class="container">
    <?php
        $action=isset($_GET['action']) ? $_GET['action'] : NULL;
        if($action=="login_failed"){
            echo "<h5 style='text align:centre;color:slateblue'> Email or Password is invalid. </h5>";
        }
        ?>
      <h1 style="font-family: cursive;">Login</h1>
      <p style="font-family: cursive;">Login to explore more in Shoppinglah !</p>
      <hr>
            
      <label for="LoginUser"><b>Email Address</b></label>
      <input type="text" name = "email" placeholder="Enter your email address" id="LoginUser" value ="<?php if (isset($_COOKIE["email"])) {echo $_COOKIE["email"];} ?> " required/><br>
      
      <label for="password"><b>Password</b></label>
      <input type="password" name = "password" placeholder="Enter your Password" id="password" value ="<?php if (isset($_COOKIE["password"])) {echo $_COOKIE["password"];} ?> "required/><a href="forgetpassword.php" style="color:rgb(194, 77, 230);font-family: sans-serif">Forget password?</a><br>
      
    <br>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me<br>
      
          <button name = login type="submit" id="loginbutton" class="loginbutton">Login</button>
        
        <hr>    
        <p>Don't have an existing account? <a href="signup.php" style="color:rgb(223, 35, 182);font-family: sans-serif;">Sign up</a> now !</p>
  </form>
    </div> 
    </div>  
  <div class="container-fluid pb-0 mb-0 justify-content-center text-light ">
    <footer>
        <div class="row my-1 justify-content-center py-5">
            <div class="col-11">
                <div class="row ">
                    <div class="col-xl-8 col-md-4 col-sm-4 col-12 my-auto mx-auto a">
                        <a href="index.html "> <img src="logo.jpg" alt="logo " width="250 " height="70 "></a>
                        <!-- <h3 class="text-muted mb-md-0 mb-5 bold-text">Shoppinglah</h3> -->
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-4 col-12">
                        <h6 class="mb-3 mb-lg-4 bold-text "><b>About Us</b></h6>
                        <ul class="list-unstyled">
                            <li>Our team</li>
                            <li>What we do</li>
                            <li>Portfolio</li>
                        </ul>
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
                        <h6 class="mt-55 mt-2 text-muted bold-text"><b>Contact Us</b></h6><small> <span><i class="fa fa-envelope" aria-hidden="true"></i></span>shoppinglah@gmail.com</small>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    <script type="text/javascript">
        
           function validate() {
            var loginuser = document.getElementById('LoginUser').value;
            a = loginuser.indexOf("@");
            b = loginuser.lastIndexOf(".");
            if( loginuser == ""  || a < 1 || ( b - a < 2 )) {
               alert( "Please enter your email address correctly!" );
               document.getElementById('LoginUser').focus() ;
               return false;
            }
            if( document.getElementById('password').value == "" ) {
               alert( "Please enter the password of your account!" );
               document.getElementById('password').focus() ;
               return false;
            }
            return( true );
        } 
         
         function login(){
           if (validate()){
          }
           else{
               alert("Please enter your information according to your registered account!");
          }
         }
         var c = document.getElementById("loginbutton");
         c.addEventListener("click",login);
    </script>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>
