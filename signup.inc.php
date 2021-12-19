<?php

if(!isset($_POST["SubmitSignUp"]))
{
	header("location ../../Sign-Up.php");
}


$name = $_POST['Username'];
$email = $_POST['Email'];
$password = $_POST['Password'];
$passwordConfirm = $_POST['PasswordConfirm'];


require_once 'DBH.inc.php';
require_once 'helper.inc.php';


if (emptyInputSignup($name, $email, $password, $passwordConfirm) !== false)  
{
	header("location: ../../signup.php?error=emptyinput");
	exit();
}

if(invalidName($name) !== false) 
{
	header("location: ../../signup.php?error=invalidUsername");
	exit();
}

if(usernameExists($conn, $name) !== false)
{
	header("location: ../../signup.php?error=usernameAlreadyExists");
	exit();
}

if(emailExists($conn, $email) !== false)
{
	header("location: ../../signup.php?error=emailAlreadyExists");
	exit();
}
if(invalidEmail($email) !== false)
{
	header("Location: ../../signup.php?error=invalidEmail");
	exit();
}

if(invalidPassword($password) !== false)
{
	header("Location: ../../signup.php?error=invalidPassword");
	exit();
}

if(passwordMatch($password, $passwordConfirm) !== true)
{
	header("Location: ../../signup.php?error=passwordMatch");
	exit();
}


if(createUser($conn, $name, $email, $password))
{
	header("Location: ../../index.php?signup=success");
	exit();
}
else
{
	header("Location: ../../signup.php?error=signupFailed");
	exit();
}

