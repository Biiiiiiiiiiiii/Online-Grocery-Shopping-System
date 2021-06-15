<?php
session_start();
include_once("config.php");
if (isset($_SESSION['logged_in']) && $_SESSION['user_id'] && $_SESSION['user_email'] && $_SESSION['logged_in']==true ){
    $id = $_SESSION['user_id'];
//add list
if(isset($_POST['newList'])){
    $newList = mysqli_escape_string($mysqli,$_POST['newList']);
    $add = mysqli_query($mysqli,"INSERT INTO shoppinglist (userid,ListName,Status) VALUES('$id','$newList','Active')");
    if($add){
        mysqli_close($mysqli);
        header("Refresh:0");
    }
}

}
$confirm = $_POST['yes'];
$proid = $_POST['proidd'];
$liid = $_POST['listidd'];

if($confirm=="Yes")
{
	// delete product from database
    $delete = mysqli_query($mysqli,"DELETE FROM listcontent WHERE listcontent.ListID='$liid' AND listcontent.ProductID='$proid'");
	
    if($delete)
    {
        mysqli_close($mysqli); // Close connection
        // redirects to respective pages
        header("location:shoppinglist.php");

        exit;
    }
    else
    {
        echo mysqli_error($mysqli);
    }    	
}
else{ //if cancel delete
    header("location:shoppinglist.php");
}

$proid = $_POST['proidd'];
$liid = $_POST['listidd'];
$upconf=$_POST['update'];
$quantity=$_POST['quantity'];
if($upconf=="Yes"&&$quantity!=0){
    // update product quantity
    $update=mysqli_query($mysqli,"UPDATE listcontent SET listcontent.Quantity='$quantity' WHERE listcontent.ListID='$liid' AND listcontent.ProductID='$proid'");
    if($update)
    {
        mysqli_close($mysqli); // Close connection
        // redirects to respective pages
        header("location:shoppinglist.php");

        exit;
    }
    else
    {
        echo mysqli_error($mysqli);
    }
}
$liidd = $_POST['listiddd'];
$listconfirm = $_POST['listyes'];
if($listconfirm=="Yes")
{
	// move list to history
    $delete = mysqli_query($mysqli,"UPDATE shoppinglist SET shoppinglist.Status='Deleted' WHERE shoppinglist.ListID='$liidd'");
	
    if($delete)
    {
        mysqli_close($mysqli); // Close connection
        // redirects to respective pages
        header("location:shoppinglist.php");

        exit;
    }
    else
    {
        echo mysqli_error($mysqli);
    }    	
}
else{ //if cancel delete
    header("location:shoppinglist.php");
}
?>
