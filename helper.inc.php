<?php



function emptyInputSignup($name, $email, $password, $passwordConfirm)
{
	return (empty($name) || empty($email) || empty($password) || empty($passwordConfirm));
}
function invalidName($name) 
{
	return (!preg_match("/^[a-zA-Z0-9]*$/", $name));
}

function invalidEmail($email)
{
	return (!filter_var($email, FILTER_VALIDATE_EMAIL));

}
function passwordMatch($password, $passwordConfirm)
{
	return ($password === $passwordConfirm);
}

function invalidPassword($password)
{
	return false;	
}
function usernameExists($conn, $username)
{
	$sql = "SELECT * FROM users WHERE Username = ?;";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql))
	{
		header("location: ../../signup.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $username);
	mysqli_stmt_execute($stmt);
	$resultData = mysqli_stmt_get_result($stmt);

	if(mysqli_fetch_assoc($resultData))
	{
		return true;
	}
	else 
	{
		return false;
	}
	mysqli_stmt_close($stmt);
}	
	
function emailExists($conn, $email)
{
	$sql = "SELECT * FROM users WHERE Email = ?;";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql))
	{
		header("location: ../../signup.php?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "s", $email);
	mysqli_stmt_execute($stmt);
	$resultData = mysqli_stmt_get_result($stmt);

	if(mysqli_fetch_assoc($resultData))
	{
		return true;
	}
	else 
	{
		return false;
	}
	mysqli_stmt_close($stmt);
}
function createUser($conn, $user, $email, $password)
{
	$sql = "INSERT INTO users(Username, Email, Password) VALUES  (?,?,?);";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql))
	{
		header("location: ../../signup.php?error=stmtfailed");
		exit();
	} 
	$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
	mysqli_stmt_bind_param($stmt, "sss", $user , $email, $hashedPassword);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	return true;

}