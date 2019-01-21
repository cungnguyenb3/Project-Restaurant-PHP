<?php
// Include config file
require_once "config.php";
error_reporting(1);

// Define variables and initialize with empty values
$username = $phone = $email = $password = $confirm_password = $role_id = '';
$username_err = $phone_err = $email_err = $password_err = $confirm_password_err = ''; 
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty(trim($_POST['username']))) {
            $username_err = 'Please enter the username';
        }
    else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE user_name = ?";

        if ($stmt = mysqli_prepare($link,$sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        // Close statement
        mysqli_stmt_close($stmt);   
    }

    // Validate phone
    if(empty(trim($_POST["phone"]))){
        $password_err = "Please enter a phone.";     
    } else if(strlen(trim($_POST["phone"])) != 10){
        $password_err = "The length of phone must be 10 number.";
    } else{
        $password = trim($_POST["phone"]);
    }

    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format"; 
        }
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } else if(strlen(trim($_POST["password"])) < 8){
        $password_err = "Password must have atleast 8 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    if (empty($username_err) && empty($phone_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO users (user_name,phone,email,password,role_id) VALUES (?, ?, ?, ?,?)";  
        if ($stmt = mysqli_prepare($link, $sql)) {

            mysqli_stmt_bind_param($stmt,'sissi',$username,$phone,$email,$password,$role_id);
            $username = mysqli_real_escape_string($link,$_REQUEST['username']);
            $phone = mysqli_real_escape_string($link,$_REQUEST['phone']); 
            $email = mysqli_real_escape_string($link,$_REQUEST['email']);
            $password = password_hash(mysqli_real_escape_string($link,$_REQUEST['password']), PASSWORD_DEFAULT);
            $role_id = 1;
            if(mysqli_stmt_execute($stmt)){
                header("location: index.php");
            } else{
                echo "ERROR: Could not execute query: $sql. " . mysqli_error($link);
            }
        }
        mysqli_close($link);    
    }
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
                        <h2>Create User</h2>
                    </div>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label>User Name</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                            <span class="help-block"><?php echo $username_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                            <label>Phone Number</label>
                            <input type="number" name="phone" id="phone" class="form-control" value="<?php echo $phone; ?>">
                            <span class="help-block"><?php echo $phone_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="text" name="email" id="email" class="form-control" value="<?php echo $phone; ?>">
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>Password</label>
                            <input type="password" name="password" id="pass" class="form-control" value="<?php echo $password; ?>">
                            <span class="help-block"><?php echo $password_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password" id="confirm_pass" class="form-control" value="<?php echo $confirm_password; ?>">
                            <span class="help-block"><?php echo $cconfirm_password_err;?></span>
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