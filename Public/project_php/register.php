<?php  
    session_start();
    $link = mysqli_connect("localhost", "root", "", "restaurant");
    if (isset($_POST['btnRegister'])) {
        $username = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $password_2 = $_POST['re_pass'];
        //Kiểm tra email đã có người dùng chưa
        $sql = "SELECT email FROM users WHERE email='$email'";
    if (mysqli_num_rows(mysqli_query($link,$sql)) > 0)
    {
        echo "Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }else if ($password == $password_2 ) {
            $password = md5($password);
            $sql = "INSERT INTO users (user_name, phone, email, password) 
            VALUES ('$username', '$phone', '$email', '$password')";
            mysqli_query($link,$sql);
            //$_SESSION['message'] = 'You are now logged in';
            $_SESSION['username'] = $username;
            //echo $_SESSION['message'];

            ?> 
            <script type="text/javascript">
                alert('You are now logged in');
            </script> 
        <?php 
        }else{
            // $_SESSION['message'] = 'The two password do not match';
            // echo $_SESSION['message'];
            ?> 
            <script type="text/javascript">
                alert('The two password do not match');
            </script> 
            <?php 
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="regform/css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" action="register.php" name="register-form">

                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" required="" />
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-phone"></i></label>
                                <input type="number" name="phone" id="phone" placeholder="Your Phone" required="" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required="" />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" required="" />
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" required="" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required="true" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="btnRegister" id="signup" class="form-submit"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="./login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

    </div>
    
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>