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
                    <div class="col-md-3 col-sm-9">
                        <div class="service_item">
                            <p style="color: red;"><?php echo $row["food_name"] ?></p><br>
                            <img style="height: 30%; margin-top: 100px;" src="<?php echo $duongdan.$row["link"] ?>" alt=""><br>
                            <?php echo $row["prices"] ?><br>
                            <?php echo $row["description"] ?><br>
                            <?php echo $row["cate_name"] ?><br>
                            
                            <!-- <?php echo "SELECT link FROM foods WHERE food_id = ".$row['id'] ?><br> -->
                            
              </div>
            </div>
          <?php
              }
            }
          ?>