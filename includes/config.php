<?php

$server_name = "localhost";
$dbUsername = "trisjtsv_new_user";
$dbPassword = "Thenewuserpassword";
$dbName = "trisjtsv_student_forum_db";

$conn  = mysqli_connect($server_name, $dbUsername, $dbPassword, $dbName);

//check connection
if($conn === false){
	die("ERROE: Could not connect. " .
	   mysqli_connect_error());
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

