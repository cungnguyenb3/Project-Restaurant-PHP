<!-- <?php 
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    echo '<a href="#">'.$_SESSION["username"].'</a>';
    echo '<p><a href="regform/logout.php" class="btn btn-primary">Log out</a></p>';
} else{
    echo '<a href="regform/login.php"><button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#login"><i class="fa fa-address-book" aria-hidden="true"></i> Login</button></a>'.'<a href="regform/register.php"><button type="button" class="btn btn-danger btn-lg"><i class="fa fa-address-card" aria-hidden="true"></i> Register</button></a>';
}                    
                  
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'restaurant');
$mysqli = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($mysqli,'utf8');
// Check connection
if($mysqli === false){
  die("ERROR: Could not connect. " . mysqli_connect_error());
}
if (isset($_SESSION['shopping_cart'])) {
// $giohang = $_SESSION['giohang'];
// foreach($giohang as $id =>$ls)
// {
// $row=mysqli_fetch_row(mysqli_query($mysqli,"SELECT * FROM products WHERE id in ('$id')"));

  $id = $_SESSION["username"];
  mysqli_set_charset($mysqli, 'UTF8');
  $sql1= "SELECT * from users where username = ".$_SESSION['username'];
$result = $mysqli->query($sql1);
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $id_user = $row["id"];

        // Prepare an insert statement
    $sql = "INSERT INTO `orders` (user_id,order_date) values (?,?)";

    if($stmt = mysqli_prepare($mysqli, $sql)){
            // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "is", $param_id, $param_time);

            // Set parameters
      $param_id = $id_user;
      $param_time = "date('Y-m-d')";

            // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
        echo "
        <div class='alert alert-success'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b>
        <a href='index.php'>
        <b style='color:red'>[WEBSITE TELEPHONE:]</b>
        </a> Thanh toán thành công. Hẹn gặp lại bạn!
        </b>
        </div><script>alert('[WEBSITE TELEPHONE:] Thanh toán thành công. Hẹn gặp lại bạn!')</script>
        ";
        exit();
      } else{
        echo "Something went wrong. Please try again later.";
      }

        // Close statement
    mysqli_stmt_close($stmt);
    }
}


        

// if($stmt = $mysqli->prepare($sql)){
//    // Bind variables to the prepared statement as parameters
//    $stmt->bind_param("is", $id, $time);
//    $time = "date('Y-m-d')";
//     $stmt->execute();
//     echo "
//    <div class='alert alert-success'>
//        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
//        <b>
//            <a href='index.php'>
//                <b style='color:red'>[WEBSITE TELEPHONE:]</b>
//            </a> Thanh toán thành công. Hẹn gặp lại bạn!
//        </b>
//    </div><script>alert('[WEBSITE TELEPHONE:] Thanh toán thành công. Hẹn gặp lại bạn!')</script>
//    ";
//     // header('location: index.php');
//     // unset($_SESSION['id']);
//     // unset($_SESSION['giohang']);
// }
  $id_order=0;
  $sql1= "SELECT * from orders where username = ".$_SESSION['username']." and order_date = CURDATE()" ;
  $result = $mysqli->query($sql1);
  if($result){
    while($row1 = $result->fetch_array(MYSQLI_ASSOC)){
      echo $id_order;
      $id_order = $row1['id'];
    }

    $giohang = $_SESSION['shopping_cart'];
    foreach($giohang as $id =>$ls)
    {
      $row=mysqli_fetch_row(mysqli_query($mysqli,"SELECT * FROM products WHERE id in ('$id')"));
      echo $ls;
      $sql2 = "INSERT INTO `orders_detail` values ($id,$id_order,$ls)";
      if ($mysqli->query($sql2) === TRUE) {
        echo $sql1;
      }
        else { echo "".$mysqli>error;}
      unset($_SESSION['shopping_cart']);}

    }
  }

?> -->

<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'restaurant');
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($conn,'utf8');
   if(! $conn )
   {
      die('Không thể kết nối: ' . mysql_error());
   }
   
   $sql = 'SELECT * FROM users';
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval )
   {
      die('Không thể lấy dữ liệu: ' . mysql_error());
   }
   
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
   {
      echo "ID :{$row['id']}  <br> ".
         "Tên nhân viên : {$row['user_name']} <br> ".
         "Lương : {$row['phone']} <br> ".
         "--------------------------------<br>";
   }
   
   echo "Lấy dữ liệu thành công\n";
   
   mysql_close($conn);
?>