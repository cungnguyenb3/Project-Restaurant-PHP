<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="img/express-favicon.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>RedCaynne Re</title>

        <!-- Icon css link -->
        <link href="vendors/material-icon/css/materialdesignicons.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="vendors/linears-icon/style.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Extra plugin css -->
        <link href="vendors/bootstrap-selector/bootstrap-select.css" rel="stylesheet">
        <link href="vendors/bootatrap-date-time/bootstrap-datetimepicker.min.css" rel="stylesheet">
        <link href="vendors/owl-carousel/assets/owl.carousel.css" rel="stylesheet">

        <link href="css/style.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <section class="most_popular_item_area menu_list_page">
            <div class="container">
                <div class="popular_filter">
                    <ul>
                        <?php
                        error_reporting(1);
                        $link = mysqli_connect("localhost", "root", "", "restaurant");
                        mysqli_set_charset($link,'utf8');
                        $duongdan = './Admin/image-food/image/';
                        $sql = "SELECT * FROM categories";
                                    // echo $sql;
                        $result = $link->query($sql);
                        if ($result->num_rows > 0) {
                                        // output data of each row
                          while($row = $result->fetch_assoc()) {
                            ?>
                            <li><a href=""><?php echo $row["cate_name"] ?></a></li>
                            <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="p_recype_item_main">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="feature_item">
                                <?php
                                    //URL hiện tại của trang. cart_update.php sẽ chuyển lại trang này.
                                    $current_url = base64_encode($_SERVER['REQUEST_URI']);
                                        
                                        $results = $link->query("SELECT * FROM products ORDER BY product_id ASC");
                                        if ($results) {
                                            //output results from database
                                            while($obj = $results->fetch_object())
                                            {
                                                
                                                echo '<div class="product">';
                                                echo '<form method="post" action="cart/cart_update.php">';
                                                echo '<div class=""><img src="images/'.$obj->image.'" width="100px"></div>';
                                                echo '<div class=""><h3>'.$obj->name.'</h3>';
                                                echo '<div class="">'.$obj->description.'</div>';
                                                echo '<div class="">Giá '.$currency.$obj->price.' <input type="text" size="5" name="product_qty" value="1"><button class="add_to_cart">Thêm vào giỏ hàng</button></div>';
                                                echo '</div>';
                                                echo '<input type="hidden" name="product_id" value="'.$obj->product_id.'" />';
                                                echo '<input type="hidden" name="type" value="add" />';
                                                echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
                                                echo '</form>';
                                                echo '</div>';
                                            }
                                        
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
                </div>
                
            </div>
        </div>
    </div>
    <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Trigger modal</a>
    <div class="modal fade" id="modal-id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
