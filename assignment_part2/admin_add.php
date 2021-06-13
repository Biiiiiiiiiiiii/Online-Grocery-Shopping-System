<!DOCTYPE html>
<?php
include_once("config.php");
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['user_id'] && $_SESSION['user_email'] && $_SESSION['logged_in']==true ){
    $id = $_SESSION['user_id'];
?>
<html>

<head>
    <!-- metadata goes in head - Contains information that describes the web page document -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Add new product</title>
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
                        <img <?php echo 'src="data:image/jpeg;base64,' . base64_encode($res['pic']) . '"' ?>  alt="User" class="rounded-circle" width="30"></a></li>
                    </ul>
        </div>
        <?php } ?>
    </nav>
    <main>
        <!-- Contains the web page document’s main content  -->
        <div class="container">
            <div>
                <h4 class="text-center">Add New Product</h4>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Product Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <form method="POST" action="editproducts.php" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <input class="form-control" id="name" name="pname" placeholder="Product Name" type="text" required>
                                            </div>
                                        </div>
                                </div>
                                <hr>
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Product Description</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <input class="form-control" id="description" name="pdes" placeholder="Product Description" type="text" required>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Product Price</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">RM</span>
                                                    <input class="form-control" id="price" name="pprice" placeholder="Price" type="text" required aria-label="Dollar amount (with dot and two decimal places)">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Category</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <select class="form-control" name="Category" id="category" placeholder="Category">
                                                <option value="select">Select category</option>
                                                <option value="Drinks">Drinks</option>
                                                <option value="Dry food">Dry food</option>
                                                <option value="Fresh food">Fresh Food</option>
                                                <option value="Frozen food">Frozen Food</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Upload product picture</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <p><label for="file" style="cursor: pointer;" class="btn btn-dark">Upload</label></p>
                                            <div class="card mb-3">
                                                <div class="card-body text-center">
                                                    <input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)" style="display: none;">
                                                    <p><img id="picture" width="200"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container text-center"><input class="add-product btn btn-dark btn-lg" id="add" type="submit" name="add" value="Add">
                    </div>
                    </form>
                </div>
            </div>
            </form>
        </div>
    </main>
    <div class="container-fluid pb-0 mb-0 justify-content-center text-light ">
        <footer>
            <div class="row my-1 justify-content-center py-5">
                <div class="col-11">
                    <div class="row ">
                        <div class="col-xl-8 col-md-4 col-sm-4 col-12 my-auto mx-auto a">
                            <a href="home_admin.php"> <img src="logo.jpg" alt="logo " width="250 " height="70 "></a>
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
                            <p class="social text-muted mb-0 pb-0 bold-text"> <span class="mx-2"><i class="fa fa-facebook" aria-hidden="true"></i></span> <span class="mx-2"><i class="fa fa-linkedin-square" aria-hidden="true"></i></span> <span class="mx-2"><i class="fa fa-twitter" aria-hidden="true"></i></span> <span class="mx-2"><i class="fa fa-instagram" aria-hidden="true"></i></span> </p><small class="rights"><span>&#174;</span> Shoppinglah All Rights Reserved.</small>
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
    <script type="text/javascript" src="productscript.js"></script>
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('picture');
            image.src = URL.createObjectURL(event.target.files[0]);
            imgData = getBase64Image(image);
            localStorage.setItem("imgData", imageData);
            function getBase64Image(img) {
                var canvas = document.createElement("canvas");
                canvas.width = img.width;
                canvas.height = img.height;
                var ctx = canvas.getContext("2d");
                ctx.drawImage(img, 0, 0);
                var dataURL = canvas.toDataURL("image/png");
                return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
            }
        };
    </script>
</body>
</html>
<?php } ?>
