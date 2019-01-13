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
                    <a href="">aaaaaaaaaaaaaaaa</a>
                    <?php
                                    error_reporting(1);
                                    $link = mysqli_connect("localhost", "root", "", "restaurant");
                                    mysqli_set_charset($link,'utf8');
                                    $duongdan = './Admin/image-food/image/';
                                    $sql = "SELECT * FROM foods, image, categories WHERE foods.id = image.food_id 
                                    and categories.id = foods.category_id";
                                    // echo $sql;
                                    $result = $link->query($sql);
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                      while($row = $result->fetch_assoc()) {?>

                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <p style="color: red;"><?php echo $row["food_name"] ?></p><br>
                                        <img style="height: 30%; margin-top: 100px;" src="<?php echo $duongdan.$row["link"] ?>" alt=""><br>
                                        <?php echo $row["prices"] ?><br>
                                        <?php echo $row["description"] ?><br>
                                        <?php echo $row["cate_name"] ?><br>

                                        <?php echo "SELECT link FROM foods WHERE food_id = ".$row['id'] ?><br> 
                                        
                </div>     
                                  <?php
                                      }
                                    }
                                  ?>  
                                  <a href="">aaaaaaaaaaaaaaaa</a>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <div class="feature_item">


                                
                            </div>
                            </div>
                            
                        </div>