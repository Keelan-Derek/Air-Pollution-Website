<?php

    require_once('includes/database-connect.php');
    $connection = db_connect();

    $query = "SELECT * FROM shop_items ORDER BY item_id ASC";
    $ret1 = mysqli_query($connection, $query);


    if(isset($_POST["checkout"]))
    { 
        $message = "";

        $item = $_POST["checkout"];
        $quantity = mysqli_real_escape_string($connection, $_POST["quantity"]);
        $totalPrice = ($_POST["hidden_price"] * $_POST["quantity"]);

        if(isset($_SESSION["userid"])){
            $userid = $_SESSION["userid"];

            $purchaseQuery = "INSERT INTO purchases (item_id, quantity, totalPrice, purchased_at, member_id) 
            VALUES ('$item', '$quantity', '$totalPrice', NOW(), '$userid') ";
            
            $ret = mysqli_query($connection, $purchaseQuery);
        }
        else
        {
            $purchaseQuery = "INSERT INTO purchases (item_id, quantity, totalPrice, purchased_at) 
            VALUES ('$item', '$quantity', '$totalPrice', NOW()) ";
            
            $ret = mysqli_query($connection, $purchaseQuery);
        }


        if($ret){
            $message="<div class='alert alert-success mt-3' role='alert'>Purchase successfully made! You can expect your package soon!</div>";
            echo $message;
            if(isset($_SESSION["customerCounter"])){
                $_SESSION["customerCounter"] += 1;
            }
        }else{
            $message="<div class='alert alert-danger' role='alert'>There happens to have been an error: " . mysqli_error($connection) . "</div>";
            echo $message;
            echo $item;            
        }

    }

?>


<!--Start of Store Checkout Page-->

<head>
    <title>Checkout | Air Pollution</title>
</head>


<div id="checkout-page">

    <br><br>
    <div class="jumbotron" id="checkout-head">
        <h3 class="display-3 text-center" style="font-weight: 380;">Store Checkout</h3>
        <p class="lead text-center jumbo-content">Finalize your purchase of a Home Pollution Testing Kit(s). </p>
    </div>
    <div class="container">
        <div class="row">
        <?php

            if(mysqli_num_rows($ret1) > 0)
            {
                while($row = mysqli_fetch_array($ret1))
                {
                    $itemImage = 'src="data:image/jpeg;base64,'.base64_encode($row['item_image']).'"';
            ?>
        
            <div class="col-sm-12 col-md-4">
                <form method="POST" action="">
                    <div class="card border-dark m-1" style="border-width: 2px; border-radius: 5px;">
                        <div class="card-body">
                            <div class="text-center"><img <?php echo $itemImage; ?> width="300" height="230" class="card-img-top img-fluid p-4"></div>
                            <h4 class="text-info text-center"><?php echo $row["item_name"]; ?></h4>
                            <h4 class="text-danger pr-4 pl-4"> &pound; <?php echo $row["item_price"]; ?></h4> 
                            <div class="form-group pr-3 pl-3">
                                <label for="qty">Quantity</label>
                                <input type="number" name="quantity" id="qty" class="form-control" min="1" value="1" required>
                                <!-- Hidden Values for Future reference-->
                                <input type="hidden" name="hidden_name" value="<?php echo $row["item_name"];?>" />
                                <input type="hidden" name="hidden_price" value="<?php echo $row["item_price"]; ?>" />
                            </div>
                            <div class="form-group text-center mt-0">
                                <button type="submit" name="checkout" value="<?php echo $row["item_id"]; ?>" class="mt-1 btn btn-success">Checkout</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        
            <? echo $row["item_id"]; ?>
        <?php        
            }
        }
        ?>
        </div>

    </div>

    <div class="card bg-light mt-3 mr-5 ml-5 p-3 text-center h3 font-italic" >
        <div class="card-body">
            <div class="card-title">
                <?php
                   if(isset($_SESSION["customerCounter"])){ echo " <p> You are customer number ". $_SESSION["customerCounter"] ."</p>"; } else { echo "Please make a purchase."; }
                ?> 
            </div>
        </div>
    </div> 
    <br></br>

</div> <!--End Tag-->

<!-- End of Store Checkout Page -->