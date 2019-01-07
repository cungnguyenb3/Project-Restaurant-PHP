<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM image WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters   
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                

// lấy ảnh mặc định trong 1 folder
$link = "./image/";
$imageresult1 = mysql_query($sqlimage);

while($rows = mysql_fetch_assoc($imageresult1))
{       
    $image = $rows['link'];    
    print $image;
}


                // Retrieve individual field value
                $food_name = $row["link"];
                $prices = $row["prices"];
                $description = $row["description"];
                $category_id = $row["category_id"];
                $status = $row["status"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    // Close statement
    mysqli_stmt_close($stmt);
    
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Food</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Food</h1>
                    </div>
                    <div class="form-group">
                        <label>Food name</label>
                        <p class="form-control-static"><?php echo $row["food_name"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Prices</label>
                        <p class="form-control-static"><?php echo $row["prices"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <p class="form-control-static"><?php echo $row["description"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Category id</label>
                        <p class="form-control-static"><?php echo $row["category_id"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <p class="form-control-static"><?php echo $row["status"]; ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>


<!-- <?php
error_reporting(1);
// $connection = mysqli_connect("localhost", "root", "", "restaurant");

require_once "config.php";

//$sql="SELECT * FROM foods ORDER BY id";

//$sql="SELECT * FROM foods where id = 2";


//ID của file ảnh  
$imgID = 1;  

// show ra 1 ảnh
// $sql = "SELECT * FROM image where id = ". $imgID;  

// show ra hết ảnh trong db
$sql = "SELECT * FROM image";
$result = $link->query($sql);
// lấy ảnh mặc định trong 1 folder
$link = "./image/";
if ($result->num_rows > 0) {
                // output data of each row
  while($row = $result->fetch_assoc()) {?>
    <div class="col-lg-3 col-md-3 mb-3">
      <div class="card h-100">
        <img src="<?php echo $link.$row['link']; ?>" alt="Image">
      </div>
    </div>
    <p><?php  echo $link.$row['link']; ?></p>
    <?php 

  }
}
?>  -->