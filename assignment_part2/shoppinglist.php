<!DOCTYPE html>
<?php
session_start();
include("config.php");
if (isset($_SESSION['logged_in']) && $_SESSION['user_id'] && $_SESSION['user_email'] && $_SESSION['logged_in'] == true) {
    $id = $_SESSION['user_id'];
?>
    <html>

    <head>
        <!-- metadata goes in head - Contains information that describes the web page document -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="list_style.css">
        <script type="text/javascript" src="productscript.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

        <title>My Shopping List</title>
    </head>
    <?php
    //fetch data from db
    $getpp = "SELECT * FROM users WHERE userid='$id'";
    $query = $mysqli->query($getpp);

    while ($pp = mysqli_fetch_array($query)) {

    ?>

        <body>

            <div class="container">
                <nav class="navbar navbar-expand-md navbar-dark fixed-top " style="background-color: #eacefe; ">
                    <a href="home_login.php"> <img src="logo.jpg " alt="logo " width="150 " height="40 "></a>
                    <button class="navbar-toggler " type="button " data-toggle="collapse " data-target="#navbarCollapse " aria-controls="navbarCollapse " aria-expanded="false " aria-label="Toggle navigation ">
                        <span class="navbar-toggler-icon "></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarCollapse ">
                        <ul class="navbar-nav mr-auto ">
                            <li class="nav-item ">
                                <a class="nav-link " style="color: #541191; " href="home_login.php">Home</a>
                            </li>
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
                                    <img <?php echo 'src="data:image/jpeg;base64,' . base64_encode($pp['pic']) . '"' ?>  alt="User" class="rounded-circle" width="30" height="30" style="object-fit: contain; background-image: url('bg.png');"></a></li>
                        </ul>
                    <?php } ?>
                    </div>
                </nav>
                <main>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

                    <!--........................List...........................-->
                    <?php
                    $list = mysqli_query($mysqli, "SELECT * FROM shoppinglist WHERE Status='Active' AND userid='$id'");
                    while ($res = mysqli_fetch_array($list)) :
                    ?>

                        <form action="addmodal.php" method="POST">       
                        <div class="d-grid gap-2 col-6 mx-auto">                     
                            <input type="button" data-name="<?php echo $res['ListName'] ?>" data-id="<?php echo $res['ListID'] ?>" name="listNamee" class="listbutton btn btn-lg btn-block font-weight-bold bg-primary text-white" data-bs-toggle="modal" data-bs-target="#modal-<?php echo $res['ListName'] ?>" value="<?php echo $res['ListName'] ?>">
                        </div><br>
                        </form>

                        <form action="editList.php" method="POST">
                            <input type="hidden" class="conList" name="delListYes">
                            <input type="hidden" class="conProd" name="delProdYes">
                            <input type="hidden" class="conEdit" name="editListYes">
                            <input type="hidden" class="conList" name="delListYes">
                            <div class="modal fade" id="modal-<?php echo $res['ListName'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                    <div class="modal-content">

                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php
                    endwhile
                    ?>
                    <br><button onclick="pop()" class="btn mx-auto btn-primary btn-lg d-md-block ">Add New List</button>

                    <script>
                        function pop() {
                            var newList = prompt("New List Name:");
                            if (newList != null && newList != "") {
                                $.post("editList.php", {
                                    newList: newList
                                });
                            }
                        }
                        
                    </script>
                </main>
            </div>


            <script>
                $('.listbutton').click(function(){
                    var ID=$(this).attr('data-id');
                    var LName=$(this).attr('data-name');
                    $.ajax({url:"addmodal.php?ID="+ID+"&n="+LName,cache:false,success:function(result){
                        $(".modal-content").html(result);
                    }});
                });
            </script>

            <div class="container-fluid pb-0 mb-0 justify-content-center text-light ">
                <footer>
                    <div class="row my-1 justify-content-center py-5">
                        <div class="col-11">
                            <div class="row ">
                                <div class="col-xl-8 col-md-4 col-sm-4 col-12 my-auto mx-auto a">
                                    <a href="home_login.php"> <img src="logo.jpg" alt="logo " width="250 " height="70 "></a>
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
                                    <p class="social text-muted mb-0 pb-0 bold-text"> <span class="mx-2"><i class="fa fa-facebook" aria-hidden="true"></i></span> <span class="mx-2"><i class="fa fa-linkedin-square" aria-hidden="true"></i></span> <span class="mx-2"><i class="fa fa-twitter" aria-hidden="true"></i></span>
                                        <span class="mx-2"><i class="fa fa-instagram" aria-hidden="true"></i></span>
                                    </p><small class="rights"><span>&#174;</span> Shoppinglah All Rights Reserved.</small>
                                </div>
                                <div class="col-xl-2 col-md-4 col-sm-4 col-auto order-1 align-self-end ">
                                    <h6 class="mt-55 mt-2 text-muted bold-text"><b>Contact Us</b></h6><small> <span><i class="fa fa-envelope" aria-hidden="true"></i></span> shoppinglah@gmail.com</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--container-->
                </footer>
            </div>

            <script>
                function Function(listName) {
                    if (confirm("Are you sure to delete this list?")) {
                        document.getElementById(listName).style.display = 'none';
                    }
                }

                function popFunction(ProductID) {
                    if (confirm("Are you sure to delete this item?")) {
                        document.getElementById(ProductID).style.display = 'none';
                    }
                }
            </script>
        </body>

    </html>
<?php }
mysqli_close($mysqli);
?>
