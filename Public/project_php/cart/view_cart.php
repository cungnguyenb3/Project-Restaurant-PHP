<?php
session_start();
include_once("config.php");
?>
<html>
<header>
<link href="style.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</header>
<body>
    <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Trigger modal</a>
    <div class="modal fade" id="modal-id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    <?php 
                        if(isset($_SESSION["products"]))
                        {
                            $current_url = base64_encode($_SERVER['REQUEST_URI']);
                            $total = 0;
                            echo '<form method="post" action="PAYMENT-GATEWAY">';
                            echo '<ul>';
                            $cart_items = 0;
                            foreach ($_SESSION["products"] as $cart_itm)
                            {
                               $product_id = $cart_itm["id"];
                               $results = $mysqli->query("SELECT name, description, price FROM products WHERE product_id ='$product_id' LIMIT 1");
                               $obj = $results->fetch_object();
                                ?> <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <a href="cart_update.php?removep='<?php echo $cart_itm["id"] ?>'"></a>
                                            <h3><?php echo $obj->name.' (Mã sản phẩm :'.$product_id.')' ?></h3>
                                            <div><?php echo $obj->description ?></div>
                                            <p><?php echo $currency.$obj->price ?></p>
                                        </div>
                                    </div>
                                </div> <?php
                                echo '<h3>'.$obj->name.' (Mã sản phẩm :'.$product_id.')</h3> ';
                                echo '<div class="p-qty">Số lượng : '.$cart_itm["qty"].'</div>';
                                echo '<div>'.$obj->description.'</div>';
                                $subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
                                $total = ($total + $subtotal);
                     
                                echo '<input type="hidden" name="item_name['.$cart_items.']" value="'.$obj->name.'" />';
                                echo '<input type="hidden" name="item_code['.$cart_items.']" value="'.$product_id.'" />';
                                echo '<input type="hidden" name="item_desc['.$cart_items.']" value="'.$obj->description.'" />';
                                echo '<input type="hidden" name="item_qty['.$cart_items.']" value="'.$cart_itm["qty"].'" />';
                                $cart_items ++;
                                
                            }
                            echo '</ul>';
                            echo '<span class="check-out-txt">';
                            echo '<strong>Tổng : '.$currency.$total.'</strong>  ';
                            echo '</span>';
                            echo '</form>';
                            
                        }else{
                            echo 'Giỏ hàng trống';
                        }
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
<div class="container"><h1>Thanh Toán</h1>
<div id="products-wrapper">
<div class="view-cart">

<a href="index.php" class="btn btn-danger">Come back</a>
</div>
</div>
</div>
</body>
</html>