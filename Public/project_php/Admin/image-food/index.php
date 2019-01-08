<?php 
	error_reporting(1);
    session_start();
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Foods</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 900px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>

    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3" style="margin-top: 180px;">
                    <a href="../category/index.php" class="btn btn-danger" style="width: 150px;">Category</a>
                    <a href="../foods/index.php" class="btn btn-danger" style="width: 150px;">Food</a>
                    <a href="index.php" class="btn btn-danger" style="width: 150px;">Image</a>
                    <a href="../users/index.php" class="btn btn-danger" style="width: 150px;">User</a>
                </div>
                <div class="col-md-9">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Foods Details</h2>
                        <a href="create.php" class="btn btn-success pull-right" >Add New Image</a>
                        
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM image";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Food ID</th>";
                                        echo "<th>Link</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['food_id'] . "</td>";
                                        echo "<td>" . $row['link'] . "</td>";
                                        
                                        echo "<td>";
                                            // gọi đến file read.ph
                                            //  echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            
                                            //  gọi đến file showImage.php
                                            echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div> 
            <div class="row">
                <?php 
                    $link = "./image/";
                    if ($result->num_rows > 0) {
                    // output data of each row
                        while($row = $result->fetch_assoc()) {
                ?>
                            <div class="col-lg-3 col-md-3 mb-3">
                                <div class="card h-100">
                                    <img src="<?php echo $link.$row['link']; ?>" alt="Image">
                                </div>
                            </div>
                            <p><?php  echo $link.$row['imgData'];?></p>
                x<?php                   
                        }
                    } 
                ?>
            </div>               
        </div>
    </div>
</body>
</html>