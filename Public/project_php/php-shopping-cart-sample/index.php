<?php
session_start();
include_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tạo giỏ hàng (Shopping Cart) đơn giản với PHP</title>
<link href="vendors/material-icon/css/materialdesignicons.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="icon" href="http://www.thuthuatweb.net/wp-content/themes/HostingSite/favicon.ico" type="image/x-ico"/>
<link href="style/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="shopping-cart-dropdown/css/style.css"> 
</head>

<body>
<div id="products-wrapper">
    <h1>Products</h1>
    <div class="products">
    <?php
    //current URL of the Page. cart_update.php redirects back to this URL
	$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    
	$results = $mysqli->query("SELECT * FROM foods ORDER BY id ASC");
    if ($results) { 
	
        //fetch results set as object and output HTML
        while($obj = $results->fetch_object())
        {
			echo '<div class="product">'; 
            echo '<form method="post" action="cart_update.php">';
			echo '<div class="product-thumb"><img src="images/'.$obj->food_name.'"></div>';
            echo '<div class="product-content"><h3>'.$obj->food_name.'</h3>';
            echo '<div class="product-desc">'.$obj->description.'</div>';
            echo '<div class="product-info">';
			echo 'Price '.$currency.$obj->prices.' | ';
            echo 'Qty <input type="text" name="product_qty" value="1" size="3" />';
			echo '<button class="add_to_cart">Add To Cart</button>';
			echo '</div></div>';
            echo '<input type="hidden" name="product_code" value="'.$obj->food_code.'" />';
            echo '<input type="hidden" name="type" value="add" />';
			echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
            echo '</form>';
            echo '</div>';
        }
    
    }
    ?>
    </div>
    
<?php
    $count = 0;
if(isset($_SESSION["products"]))
{
    $total = 0;
    '<ol>';
    foreach ($_SESSION["products"] as $cart_itm)
    {
        $subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
        $total = ($total + $subtotal);
        $count = $count + $cart_itm["qty"];
    }
    '</ol>';
    '<span class="check-out-txt"><strong>Total : '.$currency.$total.'</strong> <a href="view_cart.php">Check-out!</a></span>';
	'<span class="empty-cart"><a href="cart_update.php?emptycart=1&return_url='.$current_url.'">Empty Cart</a></span>';?> 
    <?php
}else{
    echo 'Your Cart is empty';
    echo $count;
}
?>
    <li><a class="btn btn-primary" data-toggle="modal" href='#modal-id' style="text-align: center;"><i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 35px; margin-top: 5px; color: aqua;"><p style="text-align: center; font-size: 30px; margin-top: -30px; color: Maroon;"><?php echo $count; ?></p></i></a></li>
    <div class="modal fade" id="modal-id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align: center; font-size: 20px;">Your Shopping Cart</h4>
                </div>
                <div class="modal-body">
                    <div class="shopping-cart">
                    <?php  
                        if(isset($_SESSION["products"]))
                        {
                            $total = 0;
                            echo '<ol>';
                            foreach ($_SESSION["products"] as $cart_itm)
                            {
                                echo '<li class="cart-itm">';
                                echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>';
                                echo '<h3>'.$cart_itm["name"].'</h3>';
                                echo '<div class="p-code">P code : '.$cart_itm["code"].'</div>';
                                echo '<div class="p-qty">Qty : '.$cart_itm["qty"].'</div>';
                                echo '<div class="p-price">Price :'.$currency.$cart_itm["price"].'</div>';
                                echo '</li>';
                                $subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
                                $total = ($total + $subtotal);
                                $count = $count + $cart_itm["qty"];
                            }
                            echo '</ol>';
                            echo '<span class="check-out-txt"><strong>Total : '.$currency.$total.'</strong> <a href="view_cart.php">Check-out!</a></span>';
                            echo '<span class="empty-cart"><a href="cart_update.php?emptycart=1&return_url='.$current_url.'">Empty Cart</a></span>';?> 
                            <?php
                        }else{
                            echo 'Your Cart is empty';
                        }
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>