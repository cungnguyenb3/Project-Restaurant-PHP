<?php
if(isset($_POST['ok']))
{
    $u=$p="";
    if($_POST['username'] == NULL)
    {
        echo "Please enter your username<br />";
    }
    else
    {
        $u=$_POST['username'];
    }
    if($_POST['password'] == NULL)
    {
        echo "Please enter your password<br />";
    }
    else
    {
        $p=$_POST['password'];
        
    }
    if($u && $p)
    {
        $p = md5($p);
        $link = mysqli_connect("localhost", "root", "", "restaurant");
        $sql="select * from users where email='".$u."' and password='".$p."'";
        $query=mysqli_query($link,$sql);
        // mysql_query($sql);

        if(mysqli_num_rows($query) == 0)
        {
        ?> 
            <script type="text/javascript">
                alert('Username or password is not correct, please try again');
            </script> 
        <?php 
        }
        else
        {
            $row=mysqli_fetch_array($query);
            session_start();
            header("location: index.html");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- Main css -->
    <link rel="stylesheet" href="regform/css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="./register.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" method='post' action="login.php">
                             
                            <div class="form-group">
                                <label><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="username" placeholder="Your email" required="" />

                            </div>
                            <div class="form-group">
                                <label><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" placeholder="Password" required="" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name='ok' class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

<!-- 
    <form action='login.php' method='post'>
        Username: <input type='email' name='username' size='25' /><br />
        Password: <input type='password' name='password' size='25' /><br />
        <input type='submit' name='ok' value='Dang Nhap' />
    </form> -->
</body>
</html>
