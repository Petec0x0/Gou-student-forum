<?php
//initialize the session
sesssion_start();
//Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) &&
$_SESSION["loggedin"] === true){
	header("location: welcome.php"){
		exit;
	}
	//include config file
	require_once "config.php";
	//Define variables and initialize with empty values
	$username = $password = "";
	$username_err = $password_err = $login_err = "";
	
	//Processing form data when form is submitted
	if(empty(trim($_POST["username"]))){
		$username_err = "Please enter username.";
	}else{
		$username = trim($_POST["username"]);
	}
	//Check if password is empty
	if(empty(trim($_POST["password"]))){
		$password_err = "Please enter your password.";
	}else{
		$password = trim($_POST["password"]);
		
	}
	//Validate credentials
	if(empty($username_err) && empty($password_err)){
		$sql = "SELECT id, username, password FROM user WHERE username = ?";
		if($stmt =mysqli_prepare($link, $sql)){
			//Bind variables to the prepared statement as parameters
			mysqli_stmt_bind_param($stmt, "s", $param_username);
			
			//Set parameters
			$param_username = $username;
			//Attempt to execute the prepared statement
			if(mysqli_stmt_execute($stmt)){
				//store result
				mysql_stmt_num_rows($stmt) ==
					//Bind result variables
					mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
				//password is correct, so start a new session
				session_start();
				//store data in sessin variable
				$_SESSION["loggedin"] = true;
				$_SESSION["id"] = $id;
				$_SESSION["username"] = $username;
				//Redirect user to welcome page
				header("location: welcome.php");
					
			}else{
				//password is not valid, display a generic error message
				$login_err = "Invalid username or password.";
			}
		}
	}else{
		//username doesnot exist, display a generic error message
		$login_err = "Invalid username or password.";
	}
}else{
	echo
		"Oops! Something went wrong. Please try again later.";
}
//close statement
mysqli_close($link);

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>