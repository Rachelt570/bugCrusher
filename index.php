<!DOCTYPE html>
<html>
<head>
	<title>Bug crusher</title>
	<link rel="stylesheet" type="text/css" href="Styles/main.css">
</head>
<body>
	<?php
		include_once 'php/Header.php';
	?>


	<form id = "Login-Form">
		<label for = "Username"> Username </label>
		<input type="text" name="Username"> 
		<label for = "Password"> Password </label>
		<input type="Password" name = "Password"> 
		<input type = "Button" value = "Sign-In"> 
	</form>
	<p> Don't have any account? </p>
	<a href = "signup.php"> Sign up </a> <br>
	<a href = "testMode.php"> Test Mode </a>
</body>
</html>