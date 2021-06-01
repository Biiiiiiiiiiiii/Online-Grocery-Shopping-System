<?php

include "config.php"; // Using database connection file here

$id = $_POST['pid']; // get id through query string

$confirm = $_POST['yes']; //get confirmation for delete

$category = $_POST['category']; //get product category

$qry = mysqli_query($mysqli,"SELECT * FROM product WHERE ProductID='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['save'])) // when click on Save button
{
    //get the inputs
    $pname = $_POST['pname'];
    $pdes = $_POST['pdes'];
    $pprice = $_POST['pprice'];
	
    //update the data to database
    $edit = mysqli_query($mysqli,"UPDATE product SET ProductName='$pname', ProductDescription='$pdes', ProductPrice='$pprice' where ProductID='$id'");
	
    if($edit)
    {
        mysqli_close($mysqli); // Close connection
        // redirects to respective pages
        if($category=="main"){
            header("location:admin_products.php");
        }
        if($category=="drinks"){
            header("location:drinks_admin.php");
        }
        if($category=="dry"){
            header("location:dry_admin.php");
        }
        if($category=="fresh"){
            header("location:fresh_admin.php");
        }
        if($category=="frozen"){
            header("location:frozen_admin.php");
        }
        exit;
    }
    else
    {
        echo mysqli_error($mysqli);
    }    	
}

// for product deletion
if($confirm=="Yes")
{
	// delete product from database
    $delete = mysqli_query($mysqli,"DELETE FROM product WHERE ProductID='$id'");
	
    if($delete)
    {
        mysqli_close($mysqli); // Close connection
        // redirects to respective pages
        if($category=="main"){
            header("location:admin_products.php");
        }
        if($category=="drinks"){
            header("location:drinks_admin.php");
        }
        if($category=="dry"){
            header("location:dry_admin.php");
        }
        if($category=="fresh"){
            header("location:fresh_admin.php");
        }
        if($category=="frozen"){
            header("location:frozen_admin.php");
        }
        exit;
    }
    else
    {
        echo mysqli_error($mysqli);
    }    	
}
else{ //if cancel delete
    if($category=="main"){
        header("location:admin_products.php");
    }
    if($category=="drinks"){
        header("location:drinks_admin.php");
    }
    if($category=="dry"){
        header("location:dry_admin.php");
    }
    if($category=="fresh"){
        header("location:fresh_admin.php");
    }
    if($category=="frozen"){
        header("location:frozen_admin.php");
    }
}

// add product to database
if(isset($_POST['add'])) 
{
    // get the inputs
    $pname = $_POST['pname'];
    $pdes = $_POST['pdes'];
    $pcate = $_POST['Category'];
    $pprice = $_POST['pprice'];
    $imagetmp = addslashes (file_get_contents($_FILES['image']['tmp_name']));

    // add product to database
	$addp = "INSERT INTO product ( ProductName, ProductDescription, ProductCategory, ProductPrice, ProductPhoto) VALUES ('$pname', '$pdes', '$pcate', '$pprice', '$imagetmp')";
    $edit = mysqli_query($mysqli, $addp);
	
    if($edit)
    {
        mysqli_close($mysqli); // Close connection
        // redirect to main products page
        header("location:admin_products.php");
        exit;
    }
    else
    {
        echo mysqli_error($mysqli);
    }    	
}

?>