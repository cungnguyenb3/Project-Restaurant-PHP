<?php 
    session_start();
    error_reporting(1);
    include("shopping_cart.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('head.php'); ?>
    </head>
    <body>
        <?php include('first_header.php'); ?>
        <?php include('header.php'); ?>
        <?php include('section.php'); ?>

        <!--================End Our feature Area =================-->
        <section class="most_popular_item_area">
            <div class="container">
                <div class="s_white_title">
                    <h3>Most Popular</h3>
                    <h2>Today's Menu</h2>
                </div>
                <div class="popular_filter">
                    <ul>
                        <li class="active" data-filter="*"><a href="">All</a></li>
                        <?php 
                            require('config.php');
                            for ($i=1; $i < 99; $i++) { 
                                $sql = "SELECT * FROM categories WHERE parentID = 1 and id = ".$i;
                                // echo $sql;
                                $result = $link->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) { ?>
                                        <li data-filter=".<?php echo convert_number_to_words($i); ?>"><a href=""><?php echo $row["cate_name"] ?></a></li>
                                    <?php
                                    }
                                }
                            }
                         ?>
                        
                    </ul>
                </div>

                <div class="p_recype_item_main" >
                    <div class="row p_recype_item_active">
                        <?php
                            error_reporting(1);
                            $link = mysqli_connect("localhost", "root", "", "restaurant");
                            mysqli_set_charset($link,'utf8');
                            $duongdan = './Admin/image-food/image/';
                            for ($i=0; $i <= 99; $i++) { 
                                $sql = "SELECT * FROM products, images, categories WHERE products.id = images.product_id and categories.id = products.category_id and categories.parentID = 1 and products.category_id = ".$i;
                                // echo $sql;
                                $result = $link->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {?>
                                        <div class="col-md-6 <?php echo convert_number_to_words($i) ?>">
                                            <form method="post" action="index.php?action=add&codes=<?php echo $row["codes"]; ?>">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <img style="height: 120px; width: 130px;" src="<?php echo $duongdan.$row["link"] ?>" alt="">
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="detail.php?id=<?php echo $row["id"] ?>"><h3 name="hidden_name"><?php echo $row["product_name"] ?></h3></a>
                                                        <h4 name="hidden_price"><?php echo $row["prices"] ?></h4>
                                                        <p><?php echo $row["description"] ?></p>
                                                    
                                                       
                                                        <input type="hidden" name="quantity" value="1" />
                                                        <input type="hidden" name="hidden_name" value="<?php echo $row["product_name"]; ?>"/>
                                                        <input type="hidden" name="hidden_price" value="<?php echo $row["prices"]; ?>" />
                                                         <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart"/>

                                                        <ul>
                                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Our feature Area =================-->
        
        <!--================Our Chefs Area =================-->
        <section class="our_chefs_area">
            <div class="container">
                <div class="s_black_title">
                    <h3>Meet</h3>
                    <h2>OUR CHEFS</h2>
                </div>
                <div class="chefs_slider_active">
                    <div class="item">
                        <div class="chef_item_inner">
                            <div class="chef_img">
                                <img src="img/chef/chef-1.jpg" alt="">
                                <div class="chef_hover">
                                    <a href="#"><h4>Thomas Keller</h4></a>
                                    <h5>Chef</h5>
                                    <p>Lorem ipsum dolor sit amet et consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                                </div>
                            </div>
                            <div class="chef_name">
                                <div class="name_chef_text">
                                    <h3>Suzanne Goin</h3>
                                    <h4>Chef</h4>
                                </div>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="chef_item_inner">
                            <div class="chef_img">
                                <img src="img/chef/chef-2.jpg" alt="">
                                <div class="chef_hover">
                                    <a href="#"><h4>Thomas Keller</h4></a>
                                    <h5>Chef</h5>
                                    <p>Lorem ipsum dolor sit amet et consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                                </div>
                            </div>
                            <div class="chef_name">
                                <div class="name_chef_text">
                                    <h3>Suzanne Goin</h3>
                                    <h4>Chef</h4>
                                </div>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="chef_item_inner">
                            <div class="chef_img">
                                <img src="img/chef/chef-3.jpg" alt="">
                                <div class="chef_hover">
                                    <a href="#"><h4>Thomas Keller</h4></a>
                                    <h5>Chef</h5>
                                    <p>Lorem ipsum dolor sit amet et consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                                </div>
                            </div>
                            <div class="chef_name">
                                <div class="name_chef_text">
                                    <h3>Paul Bocuse</h3>
                                    <h4>Chef</h4>
                                </div>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="chef_item_inner">
                            <div class="chef_img">
                                <img src="img/chef/chef-4.jpg" alt="">
                                <div class="chef_hover">
                                    <a href="#"><h4>Thomas Keller</h4></a>
                                    <h5>Chef</h5>
                                    <p>Lorem ipsum dolor sit amet et consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                                </div>
                            </div>
                            <div class="chef_name">
                                <div class="name_chef_text">
                                    <h3>Giada Deen</h3>
                                    <h4>Chef</h4>
                                </div>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="chef_item_inner">
                            <div class="chef_img">
                                <img src="img/chef/chef-1.jpg" alt="">
                                <div class="chef_hover">
                                    <a href="#"><h4>Thomas Keller</h4></a>
                                    <h5>Chef</h5>
                                    <p>Lorem ipsum dolor sit amet et consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                                </div>
                            </div>
                            <div class="chef_name">
                                <div class="name_chef_text">
                                    <h3>Suzanne Goin</h3>
                                    <h4>Chef</h4>
                                </div>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Our Chefs Area =================-->
        
        <!--================End Our Chefs Area =================-->
        <section class="next_event_area">
            <div class="container">
                <div class="s_white_red_title">
                    <h3>Events</h3>
                    <h2>Next Event</h2>
                </div>
                <div class="next_event_slider">
                    <div class="item">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="left_event_img">
                                    <img src="img/next-event/next-event-1.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="right_event_text">
                                    <a href="#"><h3>Opening Party - themeXart IT Farm</h3></a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusqs enm tempor incididunt ut labore et dolore magna aliqua. Ut enim advastmi sunt veniam, quis nostrud exercitation... <a href="#">View Detail</a></p>
                                    <div class="event_shedule">
                                        <time datetime="P65DT05H16M22S"></time>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="left_event_img">
                                    <img src="img/next-event/next-event-1.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="right_event_text">
                                    <a href="#"><h3>Opening Party - themeXart IT Farm</h3></a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusqs enm tempor incididunt ut labore et dolore magna aliqua. Ut enim advastmi sunt veniam, quis nostrud exercitation... <a href="#">View Detail</a></p>
                                    <div class="event_shedule">
                                        <time datetime="P65DT05H16M22S"></time>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="left_event_img">
                                    <img src="img/next-event/next-event-1.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="right_event_text">
                                    <a href="#"><h3>Opening Party - themeXart IT Farm</h3></a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusqs enm tempor incididunt ut labore et dolore magna aliqua. Ut enim advastmi sunt veniam, quis nostrud exercitation... <a href="#">View Detail</a></p>
                                    <div class="event_shedule">
                                        <time datetime="P65DT05H16M22S"></time>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Our Chefs Area =================-->
        
        <!--================Recent Blog Area =================-->
        <section class="recent_bloger_area">
            <div class="container">
                <div class="s_black_title">
                    <h3>News</h3>
                    <h2>Recent Blog</h2>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="recent_blog_item">
                            <div class="blog_img">
                                <img src="img/blog/recent-blog/recent-blog-1.jpg" alt="">
                            </div>
                            <div class="recent_blog_text">
                                <div class="recent_blog_text_inner">
                                    <h6><a href="#">Articles</a></h6>
                                    <a href="blog-details.html"><h5>Restaurant Industry & News</h5></a>
                                    <p>Lorem Ipsum is simpily dummy texts printing and typesetting industry.</p>
                                    <a href="#">Feb 11,ac 2017 <span>/</span></a>
                                    <a href="#">No Comments</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="recent_blog_item">
                            <div class="blog_img">
                                <img src="img/blog/recent-blog/recent-blog-2.jpg" alt="">
                            </div>
                            <div class="recent_blog_text">
                                <div class="recent_blog_text_inner">
                                    <h6><a href="#">Articles</a></h6>
                                    <a href="blog-details.html"><h5>Restaurant Industry & News</h5></a>
                                    <p>Lorem Ipsum is simpily dummy texts printing and typesetting industry.</p>
                                    <a href="#">Feb 11,ac 2017 <span>/</span></a>
                                    <a href="#">No Comments</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="recent_blog_item">
                            <div class="blog_img">
                                <img src="img/blog/recent-blog/recent-blog-3.jpg" alt="">
                            </div>
                            <div class="recent_blog_text">
                                <div class="recent_blog_text_inner">
                                    <h6><a href="#">Articles</a></h6>
                                    <a href="blog-details.html"><h5>Restaurant Industry & News</h5></a>
                                    <p>Lorem Ipsum is simpily dummy texts printing and typesetting industry.</p>
                                    <a href="#">Feb 11,ac 2017 <span>/</span></a>
                                    <a href="#">No Comments</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Recent Blog Area =================-->
        <?php include('footer.php'); ?>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-2.1.4.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Rev slider js -->
        <script src="vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
        <!-- Extra plugin js -->
        <script src="vendors/bootstrap-selector/bootstrap-select.js"></script>
        <script src="vendors/bootatrap-date-time/bootstrap-datetimepicker.min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="vendors/countdown/jquery.countdown.js"></script>
        <script src="vendors/js-calender/zabuto_calendar.min.js"></script>
        <!--gmaps Js-->
        <!--        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>-->
        <!--        <script src="js/gmaps.min.js"></script>-->
        <!--        <script src="js/video_player.js"></script>-->
        <script src="js/theme.js"></script>
    </body>
</html>