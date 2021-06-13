<?php 
  include_once("config.php");
  session_start();

  if (isset($_SESSION['logged_in']) && $_SESSION['user_id'] && $_SESSION['user_email'] && $_SESSION['logged_in']==true ){
    $id = $_SESSION['user_id'];

   //update profile name email
    if(isset($_POST['update'])){
      $name=$_POST['name'];
      $email=$_POST['email'];
      
      if(isset($name) && isset($email)){
        $chgtxt = mysqli_query($mysqli, "UPDATE users SET name='$name', email='$email' WHERE userid='$id'");
      }

      header("Location:profile.php?action=update_success");
    }
    
//upload photo
  if(isset($_POST['upload'])){
    if(empty($_FILES['image']['tmp_name'])){
      header("Location:profile.php?action=upload_fail");
    }
    else{
      $img=addslashes (file_get_contents($_FILES['image']['tmp_name']));
      $chgpic = mysqli_query($mysqli, "UPDATE users SET pic='$img' WHERE userid='$id'");
      header("Location:profile.php?action=upload_success");
    }
  }
    
  //delete account
  if(isset($_POST['delete'])){
  
    $delete = mysqli_query($mysqli, "DELETE FROM users WHERE userid='$id'");
 
    header("Location:index.html");
  }
 
?>

<!DOCTYPE html>
<html>
<head>
    <!-- metadata goes in head - Contains information that describes the web page document -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
   
    <title>Shoppinglah</title>
</head>
<?php
 //fetch data from db
 $sql = "SELECT * FROM users WHERE userid='$id'";
 $row = $mysqli->query($sql);

 while($res=mysqli_fetch_array($row)){

?>
<body>
<!-- content goes in the body - contains text and elements that display in the web page document -->
<nav class="navbar navbar-expand-md navbar-dark fixed-top " style="background-color: #eacefe; ">
    <a href="home_login.php "> <img src="logo.jpg " alt="logo " width="150 " height="40 "></a>
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
                        <img <?php echo 'src="data:image/jpeg;base64,' . base64_encode($res['pic']) . '"' ?>  alt="User" class="rounded-circle" width="30"></a></li>
                    </ul>
    </div>
</nav>

<main> 
<!-- Contains the web page document’s main content  -->
<div class="container">
<ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" href="profile.php">User Profile</a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" style="color:black" href="password.php">Password</a>
    </li>
</ul>
</div>

<div class="container"><div><h4 class="text-center">User Profile</h4></div>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">

<?php
//if update success or upload photo success/fail
$action = isset($_GET['action']) ? $_GET['action'] : "";
if($action=='update_success'){
  echo "<h5 style='text align:centre;color:slateblue;padding-left: 0.6em;'>Your profile have been updated.</h5>";
}
elseif($action=='upload_success'){
  echo "<h5 style='text align:centre;color:slateblue;padding-left: 0.6em;'>Your new photo have been uploaded.</h5>";
}
elseif($action=='upload_fail'){
  echo "<h5 style='text align:centre;color:slateblue;padding-left: 0.6em;'>Please select a photo.</h5>";
}
?>

  <div class="row justify-content-center">
  <div class="col-md-3">
  <div class="card mb-3">
  <div class="card-body text-center">
    <div class="profile-img" id="profile-container">
    <img <?php echo 'src="data:image/jpeg;base64,' . base64_encode($res['pic']) . '"' ?>  name='image' id="profileImage"alt="Avatar" class="avatar" style="cursor: pointer;">
        <label for="file" class="file btn-dark">Change Photo</label>
        <button type="submit" name="upload" id="button" class="btn btn-dark btn-sm">Upload</button>
      <input type="file" id="imageUpload" class='avatar'id="profileImage" name='image' placeholder="Photo" accept="image/*" capture  style="display: none;"/></div>
</div></div>
<!-- Button trigger modal -->
<div class="container" style="margin-left: 50px">
 <button type="button" class="btn btn-primary" style="background-color: #541191;" data-toggle="modal" data-target="#staticBackdrop">Delete account</button>
</div>
   <!-- Modal -->
   <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="staticBackdropLabel">Delete Account</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
           Are you sure you want to delete account?
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
           <button type="submit" name="delete" class="btn btn-primary deletebtn" onclick="deletebtn()">Yes</button>
         </div>
       </div>
     </div>
   </div>
</div>

<div class="col-md-7">
  <div class="card mb-3">
  <div class="card-body">

  <div class="row justify-content-center">
    <div class="col-sm-3"><h6 class="mb-0">Username</h6></div>
        <div class="col-sm-9 text-secondary">
        <div class="form-row">
        <div class="form-group col-md-8">
        <input class="form-control" id="myinput" name="name" placeholder="Username" type="text" value="<?php echo $res['name'];?>">
    </div></div></div>
        <hr>
    <div class="col-sm-3"><h6 class="mb-0">Email</h6></div>
    <div class="col-sm-9 text-secondary"> 
    <div class="form-row">
    <div class="form-group col-md-8">
    <input class="form-control" id="myinput" name="email" placeholder="E-mail" type="email" value="<?php echo $res['email'];?>">
    </div></div></div>
  
  </div></div></div>
  
  <div class="container text-center"><button type="submit" name="update" id="button" class="btn btn-dark btn-lg">Save changes</button>
  </div>

</div></div>          
</form></div>

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
   $("#profileImage").click(function(e) {
    $("#imageUpload").click();
});

function fasterPreview( uploader ) {
    if ( uploader.files && uploader.files[0] ){
          $('#profileImage').attr('src', 
             window.URL.createObjectURL(uploader.files[0]) );
    }
}

$("#imageUpload").change(function(){
    fasterPreview( this );
});
    
function deletebtn(){
    alert("You delete your account");
    setTimeout(function(){ window.location="index.html"; },500);
}
</script>

<style>
    .profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.avatar {
  vertical-align: middle;
  width: inherit;
  height: inherit;
  border-radius: 50%;
}
.deletebtn{
    background-color: purple;
}

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
<?php
}//end while fectch data
}
$mysqli->close();
?>
