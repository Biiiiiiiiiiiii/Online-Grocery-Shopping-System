<!DOCTYPE html>
<?php
session_start();
include("config.php");
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Fresh food</title>
</head>

<body>
    <header>

        <div class="container">
            <div class="d-flex bd-highlight mb-3">
                <div class="p-2 bd-highlight">

                    <form class="form col-12 col-lg-auto mb-3 mb-lg-0 ">
                        <input class="filter" type="search" id="search" placeholder="Search... ">
                    </form>

                </div>
            </div>
        </div>
    </header>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top " style="background-color: #eacefe; ">
        <a href="index.html"> <img src="logo.jpg " alt="logo " width="150 " height="40 "></a>
        <button class="navbar-toggler " type="button " data-toggle="collapse " data-target="#navbarCollapse "
            aria-controls="navbarCollapse " aria-expanded="false " aria-label="Toggle navigation ">
            <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarCollapse ">
            <ul class="navbar-nav mr-auto ">
                <li class="nav-item ">
                    <a class="nav-link " style="color: #541191; " href="index.html">Home</a>
                </li>
                <li class="nav-item dropdown ">
                    <div class="btn-group">
                        <a class="nav-link " style="color: #541191; " href="products_unknown.php">Category</a>
                        <button type="button" class="btn dropdown-toggle dropdown-toggle-split"
                            style="background-color: #eacefe; " data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="drinks_unknown.php">Drinks</a>
                            <a class="dropdown-item" href="dryfood_unknown.php">Dry Food</a>
                            <a class="dropdown-item" href="fresh_unknown.php">Fresh Food</a>
                            <a class="dropdown-item" href="frozen_unknown.php">Frozen Food</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " style="color: #541191; " onclick="popUp()" href="login.php">My Shopping
                        List</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " style="color: #541191; " onclick="popUp()" href="login.php">History</a>
                </li>
            </ul>
            <ul class="nav ">
                <li class="nav-item "><a href="login.php" class="nav-link px-2 " style="color: #541191; ">Login</a>
                </li>
                <li class="nav-item "><a href="signup.php" class="nav-link px-2 " style="color: #541191; ">Sign up</a>
                </li>
            </ul>

        </div>
    </nav>

    <div class="wrapper">
        <div class="h1">Fresh food</div>
        <section id="sidebar" style="margin-right: 20px;">
            <div class="py-3">
                <h5 class="font-weight-bold">Categories</h5>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"
                        onclick="document.location='drinks_unknown.php'"> Drinks <span
                            class="badge badge-primary badge-pill">
                            <?php
                            $drinks=mysqli_query($mysqli,"SELECT * FROM product WHERE ProductCategory='Drinks'");
                            $count1=mysqli_num_rows($drinks);
                            echo $count1;
                        ?></span></li>
                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"
                        onclick="document.location='dryfood_unknown.php'"> Dry food <span
                            class="badge badge-primary badge-pill">
                            <?php
                            $dry=mysqli_query($mysqli,"SELECT * FROM product WHERE ProductCategory='Dry food'");
                            $count2=mysqli_num_rows($dry);
                            echo $count2;
                        ?>
                        </span> </li>
                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"
                        onclick="document.location='fresh_unknown.php'"> Fresh food <span
                            class="badge badge-primary badge-pill">
                            <?php
                            $fresh=mysqli_query($mysqli,"SELECT * FROM product WHERE ProductCategory='Fresh food'");
                            $count3=mysqli_num_rows($fresh);
                            echo $count3;
                        ?>
                        </span> </li>
                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"
                        onclick="document.location='frozen_unknown.php'"> Frozen food <span
                            class="badge badge-primary badge-pill">
                            <?php
                            $frozen=mysqli_query($mysqli,"SELECT * FROM product WHERE ProductCategory='Frozen food'");
                            $count4=mysqli_num_rows($frozen);
                            echo $count4;
                        ?>
                        </span> </li>
                </ul>
            </div>
        </section>
        <!--Products section-->
        <section id="products" style="margin-top: 40px;">
            <div class="card-group">
                <div class="container py-3">
                    <div class="row">
                        <?php
                                $query=mysqli_query($mysqli,"SELECT * FROM product WHERE ProductCategory='Fresh food'");
                                while($row=mysqli_fetch_array($query)):
                            ?>

                        <div class="card col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 pt-lg-4 pt-4"
                            data-string="<?php echo $row['ProductName'].' '.$row['ProductDescription']?>">
                            <img class="card-img-top"
                                <?php echo 'src="data:image/jpeg;base64,'.base64_encode($row['ProductPhoto']).'"'?>
                                style="padding: 20px;height: 250px ;width: 250px;" alt=<?php echo $row['ProductName']?>>
                            <div class="card-body">
                                <h5 class="font-weight-bold pt-1"><?php echo $row['ProductName']?></h5>
                                <div class="text-muted description"><?php echo $row['ProductDescription']?></div>
                                <div class="h6 font-weight-bold"><?php echo 'RM'.$row['ProductPrice']?></div>



                                <div class="input-group">

                                    <input type="hidden" id="PID" value="<?php echo $row['ProductID']?>">
                                    <button class="quantity-left-minus btn btn-outline-secondary" type="button"
                                        width="16" height="16" onclick="minus(this)">-</button>
                                    <div class="quantity-input">
                                        <input type="text" id="quantity" class="form-control" value="1" min="1"
                                            max="100" style="max-width:50px">
                                    </div>
                                    <button class="quantity-right-plus btn btn-outline-secondary" type="button"
                                        width="16" height="16" onclick="plus(this)">+</button>

                                    <a class="btn btn-primary" style="margin-left: 10px;" onclick="popUp()"
                                        href="login.php">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z" />
                                        </svg>
                                    </a>


                                </div>

                            </div>


                        </div>
                        <?php
                            endwhile;
                            ?>
                    </div>
                </div>
            </div>

        </section>
    </div>
    <div class="container-fluid pb-0 mb-0 justify-content-center text-light ">
        <footer>
            <div class="row my-1 justify-content-center py-5">
                <div class="col-11">
                    <div class="row ">
                        <div class="col-xl-8 col-md-4 col-sm-4 col-12 my-auto mx-auto a">
                            <a href="index.html"> <img src="logo.jpg" alt="logo " width="250 " height="70 "></a>
                            <!-- <h3 class="text-muted mb-md-0 mb-5 bold-text">Shoppinglah</h3> -->
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-4 col-12">
                            <h6 class="mb-3 mb-lg-4 bold-text "><b>About Us</b></h6>
                            <p style="padding-right: 30px;text-align: justify;text-justify: inter-word;">
                                <strong>Shoppinglah</strong> helps to organise your shopping list easily. Create your
                                own shopping list in a few clicks!
                            </p>
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
                            <p class="social text-muted mb-0 pb-0 bold-text"> <span class="mx-2"><i
                                        class="fa fa-facebook" aria-hidden="true"></i></span> <span class="mx-2"><i
                                        class="fa fa-linkedin-square" aria-hidden="true"></i></span> <span
                                    class="mx-2"><i class="fa fa-twitter" aria-hidden="true"></i></span> <span
                                    class="mx-2"><i class="fa fa-instagram" aria-hidden="true"></i></span> </p><small
                                class="rights"><span>&#174;</span> Shoppinglah All Rights Reserved.</small>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-4 col-auto order-1 align-self-end ">
                            <h6 class="mt-55 mt-2 text-muted bold-text"><b>Contact Us</b></h6><small> <span><i
                                        class="fa fa-envelope" aria-hidden="true"></i></span>
                                shoppinglah@gmail.com</small>
                        </div>

                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="productscript.js"></script>
</body>

</html>
<?php
mysqli_close($mysqli);
?>
