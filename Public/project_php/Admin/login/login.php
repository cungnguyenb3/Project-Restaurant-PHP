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
		$sql="select * from users where user_name='".$u."' and password='".$p."'";
		$query=mysqli_query($link,$sql);
		// mysql_query($sql);

		if(mysqli_num_rows($query) == 0)
		{
			echo "Username or password is not correct, please try again";
		}
		else
		{
			$row=mysqli_fetch_array($query);
			session_start();
			header("location: ./Admin.php");
		}
	}
}
?>
<form action='login.php' method='post'>
	Username: <input type='text' name='username' size='25' /><br />
	Password: <input type='password' name='password' size='25' /><br />
	<input type='submit' name='ok' value='Dang Nhap' />
</form>