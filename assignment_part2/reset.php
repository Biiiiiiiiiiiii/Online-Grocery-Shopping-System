<!DOCTYPE html>
<html>
<head>
    <!-- metadata goes in head - Contains information that describes the web page document -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href = "reset.css">
    <title>Shoppinglah</title>
</head>
<body>
  <form action="cpass.php" method="post" style="border:1px solid rgb(145, 160, 226)">

  <nav class="navbar navbar-expand-md navbar-dark fixed-top " style="background-color: #eacefe; ">
    <a href="index.html"> <img src="logo.jpg " alt="logo " width="150 " height="40 "></a>
    <button class="navbar-toggler " type="button " data-toggle="collapse " data-target="#navbarCollapse " aria-controls="navbarCollapse " aria-expanded="false " aria-label="Toggle navigation "></button>
  </nav>
 

     <div class="container">
            <div class="ResetPassword">
                <h2 style="font-family: 'Lucida Sans';">Reset your password?</h2>
            </div>
            <div class="box">
                <hr>
                <label for="password"><b>New password</b></label><br>
                <input type="password" name="newpassword" placeholder="Enter your new Password" id="newpassword" required/><br>
            
                <label for="re-enter password"><b>Re-enter New Password</b></label><br>
                <input type="password" name="reenternewpassword" placeholder="Re-enter your new Password" id="re-enternewpassword" required/><br>
            
                <button type="submit" id="resetpassword" class="resetbutton">Reset</button>
                 </div>
    </div>
    </form>
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
</div>
<script type="text/javascript">
   function checkFill() {
       if( document.getElementById('newpassword').value == "" ) {
          alert("Fill up new password!");
          document.getElementById('newpassword').focus() ;
          return false;
       }
       if( document.getElementById('re-enternewpassword').value == "" || (document.getElementById('re-enternewpassword').value !== document.getElementById('newpassword').value )) {
          document.getElementById('re-enternewpassword').focus() ;
          return false;
       }
       return( true );
      } 
    
      function reset(){
           if (checkFill()){
          }
           else{
          }
         }
         var a = document.getElementById("resetpassword");
         a.addEventListener("click",reset);
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>