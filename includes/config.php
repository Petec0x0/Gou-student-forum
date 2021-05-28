<?php

$server_name = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "student_forum_db";

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

