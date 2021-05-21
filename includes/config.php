<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'trisjtsv_new_user');
define('DB_PASSWORD', 'Thenewuserpassword');
define('DB_NAME', 'trisjtsv_student_forum_db');

$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
//check connection
if($conn === false){
	die("ERROE: Could not connect. " .
	   mysqli_connect_error());
}
