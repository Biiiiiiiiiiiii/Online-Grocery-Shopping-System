<!DOCTYPE html>

<?php
include_once("config.php");
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['user_id'] && $_SESSION['user_email'] && $_SESSION['logged_in']==true ){
    $id = $_SESSION['user_id'];
?>
<html>
<?php
 //fetch data from db
 $sql = "SELECT * FROM users WHERE userid='$id'";
 $row = $mysqli->query($sql);

 while($res=mysqli_fetch_array($row)){

?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial scale=1, shrink-to-fit=no">
    <title>Shoppinglah</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="bootstrap.css"> -->
    <!-- <link rel="stylesheet" href="font-awesome.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="style.css" rel="stylesheet">
    <style>
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top " style="background-color: #eacefe; ">
        <a href="home_admin.php"> <img src="logo.jpg " alt="logo " width="150 " height="40 "></a>
        <button class="navbar-toggler " type="button " data-toggle="collapse " data-target="#navbarCollapse " aria-controls="navbarCollapse " aria-expanded="false " aria-label="Toggle navigation ">
    <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarCollapse ">
            <ul class="navbar-nav mr-auto ">
                <li class="nav-item ">
                    <a class="nav-link " style="color: #541191; " href="home_admin.php">Home</a>
                </li>
                <li class="nav-item dropdown ">
                    <div class="btn-group">
                        <a class="nav-link " style="color: #541191; " href="admin_products.php">Category</a>
                        <button type="button" class="btn dropdown-toggle dropdown-toggle-split" style="background-color: #eacefe; " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="sr-only">Toggle Dropdown</span>
                                </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="drinks_admin.php">Drinks</a>
                            <a class="dropdown-item" href="dry_admin.php">Dry Food</a>
                            <a class="dropdown-item" href="fresh_admin.php">Fresh Food</a>
                            <a class="dropdown-item" href="frozen_admin.php">Frozen Food</a>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="nav ">
                <li class="nav-item "><a href="logout.php" class="nav-link px-2 " style="color: #541191; ">Logout</a></li>
                <li class="nav-item "><a href="adminprofile.php" class="nav-link px-2 " style="color: #541191; ">
                        <img <?php echo 'src="data:image/jpeg;base64,' . base64_encode($res['pic']) . '"' ?>  alt="User" class="rounded-circle" width="30" height="30" style="object-fit: contain; background-image: url('bg.png');"></a></li>
                    </ul>
        </div>
        <?php } ?>
    </nav>
    <main class="container ">
        <div class="jumbotron">
            <h1>Shopping tips: Shop with Shoppinglah</h1>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="shopping1.jpg" class="d-block w-100" alt="advertisement-1">
                    </div>
                    <div class="carousel-item">
                        <img src="shopping2.jpg" class="d-block w-100" alt="advertisement-2">
                    </div>
                    <div class="carousel-item">
                        <img src="shopping3.jpg" class="d-block w-100" alt="advertisement-3">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div><br><br><br>
            <h1 class="mt-4 mb-4">Featured Categories</h1>
            <div class="card-deck">
                <div class="card">
                    <img src="vegetables-and-fruits.jpg" class="card-img-top" alt="vegetables-and-fruits" width="250 " height="215 ">
                    <div class="card-body">
                        <a class="card-title" style="color: #575555; " href="fresh_admin.php">Fresh Food</a>
                        <!-- <p class="card-text ">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text "><small class="text-muted ">Last updated 3 mins ago</small></p> -->
                    </div>
                </div>
                <div class="card ">
                    <img src="frozenfood.jpg " class="card-img-top " alt="frozenfood " width="250 " height="215 ">
                    <div class="card-body ">
                        <a class="card-title " style="color: #575555; " href="frozen_admin.php">Frozen Food</a>
                        <!-- <p class="card-text ">This card has supporting text below as a natural lead-in to additional content.</p>
                                    <p class="card-text "><small class="text-muted ">Last updated 3 mins ago</small></p> -->
                    </div>
                </div>
                <div class="card ">
                    <img src="dryfood.jpg " class="card-img-top " alt="dryfood " width="250 " height="215 ">
                    <div class="card-body ">
                        <a class="card-title " style="color: #575555; " href="dry_admin.php">Dry Food</a>
                        <!-- <p class="card-text ">This is a wider card with supporting text below as a natural lead-in to additional content. This
                                        card has even longer content than the first to show that equal height action.</p>
                                        <p class="card-text "><small class="text-muted ">Last updated 3 mins ago</small></p> -->
                    </div>
                </div>
            </div><br><br>
        </div>
    </main>
    <!-- Contains the web page document???s footer information  -->
    <div class="container-fluid pb-0 mb-0 justify-content-center text-light ">
        <footer>
            <div class="row my-1 justify-content-center py-5 ">
                <div class="col-11 ">
                    <div class="row ">
                        <div class="col-xl-8 col-md-4 col-sm-4 col-12 my-auto mx-auto a ">
                            <a href="home_admin.php"> <img src="logo.jpg " alt="logo " width="250 " height="70 "></a>
                            <!-- <h3 class="text-muted mb-md-0 mb-5 bold-text ">Shoppinglah</h3> -->
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-4 col-12 ">
                            <h6 class="mb-3 mb-lg-4 bold-text "><b>About Us</b></h6>
                            <p style="padding-right: 30px;text-align: justify;text-justify: inter-word;"><strong>Shoppinglah</strong> helps to organise your shopping list easily. Create your own shopping list in a few clicks!</p>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-4 col-12 ">
                            <h6 class="mb-3 mb-lg-4 text-muted bold-text mt-sm-0 mt-5 "><b>ADDRESS</b></h6>
                            <p class="mb-1 ">Lot 10 Jalan Kuchai Lama</p>
                            <p class="mb-1 ">53400</p>
                            <p class="mb-1 ">Kuala Lumpur</p>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-xl-8 col-md-4 col-sm-4 col-auto my-md-0 mt-5 order-sm-1 order-3 align-self-end ">
                            <p class="social text-muted mb-0 pb-0 bold-text "> <span class="mx-2 "><i class="fa fa-facebook " aria-hidden="true "></i></span> <span class="mx-2 "><i class="fa fa-linkedin-square " aria-hidden="true
                                            "></i></span> <span class="mx-2 "><i class="fa fa-twitter " aria-hidden="true "></i></span> <span class="mx-2 "><i class="fa fa-instagram " aria-hidden="true "></i></span> </p><small class="rights "><span>&#174;</span> Shoppinglah All Rights Reserved.</small>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-4 col-auto order-1 align-self-end ">
                            <h6 class="mt-55 mt-2 text-muted bold-text "><b>Contact Us</b></h6><small> <span><i class="fa fa-envelope " aria-hidden="true "></i></span>shoppinglah@gmail.com</small>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js " integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js " integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns " crossorigin="anonymous "></script>
</body>
</html>
<?php } ?>
