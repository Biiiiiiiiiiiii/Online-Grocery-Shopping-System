<?php
session_start();
include_once("config.php");
if (isset($_SESSION['logged_in']) && $_SESSION['user_id'] && $_SESSION['user_email'] && $_SESSION['logged_in'] == true) {
    $id = $_SESSION['user_id'];
}
$lid1=$_GET['ID'];
$lname=$_GET['n'];
$total=0;
?>

<div class="modal-header">
    <h5 class="modal-title" id="cart-popover"><?php echo $lname?></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <?php
    $query = mysqli_query($mysqli, "SELECT shoppinglist.ListID AS listID,shoppinglist.ListName AS listName,product.ProductID AS proID, product.ProductName AS productName,product.ProductPrice AS price,product.ProductPhoto AS photo,listcontent.Quantity AS quantity
                                            FROM ((listcontent
                                            INNER JOIN shoppinglist ON listcontent.ListID = shoppinglist.ListID)
                                            INNER JOIN product ON listcontent.ProductID = product.ProductID) WHERE shoppinglist.Status='Deleted' AND shoppinglist.userid='$id' AND shoppinglist.ListID='$lid1'");
    while ($row = mysqli_fetch_array($query)) {
        $total+=($row['price']*$row['quantity']);
    ?>
        <div data-string="<?php echo $row['productName'] ?>" class="card mb-10 " style="max-width: 8000px;">
            <div class="row no-gutters">
                <div class="col-md-3">
                    <img class="card-img-top" <?php echo 'src="data:image/jpeg;base64,' . base64_encode($row['photo']) . '"' ?> alt=<?php echo $row['productName'] ?> style="padding: 20px;height: 50 ;width: 50;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo $row['productName'] ?></h2>
                        <p class="card-text"><?php echo 'RM' . $row['price'] ?></p>
                        <div class="input-group">

                            <div class="quantity-input">
                                <p class="card-text">Quantity: <?php echo $row['quantity'] ?></p>
                            </div>

                        </div>

                        <!--...............................................Delete.................................................-->
                        <form action="editList.php" method="POST">
                        <input type="hidden" class="conProd" name="yes">
                        <input type="hidden" class="listidd" name="listidd" value="<?php echo $lid1?>">
                        <input type="hidden" class="proidd" name="proidd" value="<?php echo $row['proID']?>">
                        <br><input type="hidden" name="deleteProduct" onclick="popFunction()" class="btn btn-outline-danger" id="ProductID" value="Delete">
                        
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    
    ?>
    <h3><?php echo "Total: RM".number_format($total,2);?></h3>
    <input type="hidden" class="listidd" name="listiddd" value="<?php echo $lid1?>">
    <input type="hidden" class="conList" name="listyes">
    <br><input type="hidden" name="deleteList" class="btn btn-danger btn-block" onclick="yesFunction()" id='listName' value="Delete List">
    </form>


    </ul>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary btn-danger" data-bs-dismiss="modal">Close</button>
</div>

<script>
                function yesFunction() {
                    if (confirm("Are you sure to delete this list?")) {
                        $(".conList").val("Yes")
                    } else {
                        $(".conList").val("")
                    }
                }

                function popFunction() {
                    if (confirm("Are you sure to remove this product?")) {
                        $(".conProd").val("Yes")
                    } else {
                        $(".conProd").val("")
                    }
                }

                function updateFunction() {
                    alert("Your changes have been saved");
                    $(".conEdit").val("Yes");
                }
</script>
