<?php
	session_start();
	$db=mysqli_connect("localhost","root","","authentication");
	
	if (isset($_POST['register_btn'])){
		
		$username=mysql_real_escape_string($_POST['username']);
		$email=mysql_real_escape_string($_POST['email']);
		$password=mysql_real_escape_string($_POST['password']);
		$password2 =mysql_real_escape_string($_POST['password2']);
		
		if($password==$password2){
			
			$password=md5($password);
			$sql="INSERT INTO users(username,email,password) VALUES('$username','$email','$password')";
			mysqli_query($db,$sql);
			
			$_SESSION['message']="You are now logged in";
			$_SESSION['username']=$username;
			header("location:home.php");
			
		}
		else{
			$_SESSION['message']="Passwords donot match";
		}
		
	}
?>





<!DOCTYPE html>
<html>
<head>
	<title>REGISTER</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<div class="header">
	<h1>REGISTER ACCOUNT</h1>
</div>

<form method="post" action="register.php">
	<table>
		<tr>
			<td>Username:</td>
			<td><input type="text" name="username" class="textinput"></td>
		</tr>
		
		<tr>
			<td>Email:</td>
			<td><input type="email" name="email" class="textinput"></td>
		</tr>
		
		<tr>
			<td>Password:</td>
			<td><input type="password" name="password" class="textinput"></td>
		</tr>
		
		<tr>
			<td>Retype Password:</td>
			<td><input type="password" name="password2" class="textinput"></td>
		</tr>
		
		<tr>
			<td></td>
			<td><input type="submit" name="register_btn" value="REGISTER"></td>
		</tr>
	</table>


</form>
<h3>Already a member? <a href="index.php">LOGIN</a></h3>
</body>
</html>