<?php
// Include config file
require_once "config.php";
error_reporting(1);
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $caption = '';
    $msg = "";
    $target_file = "./image/".basename($_FILES["FileImage"]["name"]);
    $image = $_FILES["FileImage"]["name"];   

    // Check input errors before inserting in database
        $sql = "INSERT INTO images (product_id,caption, status, link) VALUES (?, ?, ?, ?)";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "isis", $param_product_id, $caption, $status, $param_image);
            
            // Set parameters
            $param_product_id = $_POST['product_id'];
            $caption = trim($_POST['caption']);
            $status = trim($_POST['status']);
            $param_image = $image;

            if (move_uploaded_file($_FILES['FileImage']['tmp_name'],$target_file)) {
                $msg = 'successfully';
            }
            else{
                $msg = 'lost';
            }
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }  
        // Close statement
        mysqli_stmt_close($stmt);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label> Danh mục sản phẩm</label>
                            <select class="form-control" name="product_id">
                            <?php
                                $sql = "SELECT * FROM products";
                                $result = mysqli_query($link,$sql);
                                if($result)
                                {
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                            ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['product_name']; ?></option>   
                            <?php
                                    }
                                }
                           ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tải ảnh lên </label>
                            <input type="File" name="FileImage" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Caption</label>
                            <input type="text" name="caption" class="form-control" value="<?php echo $caption; ?>">
                        </div>
                        <div class="form-group ">
                            <label>Status</label>
                            <input type="number" name="status" class="form-control" value="<?php echo $status; ?>">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>  

                  
        </div>
    </div>
</body>
</html>