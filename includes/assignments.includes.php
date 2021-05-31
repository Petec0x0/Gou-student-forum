<?php
// import the database connection
include_once "includes/config.php";

function getUser($userId){
	global $conn;
	$sql = "SELECT * FROM students WHERE id = '$userId'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	return array('firstname'=>$row["firstname"], 'image_path'=>$row["image"], 'level'=>$row["level"]);
}

// for storing error messages
 $erro_mssg = "";
 
 // check if a create-discussion post request have been sent
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-assignment'])) {
    $message = $_POST['message'];
    $title = test_input($_POST['title']);
    $target_level = $_POST['target_level'];
    
    // get the creator_id (The id of the lecturer who created the assignment)
    $creator_id = $_SESSION["s_user_id"];
    
    // make sure the input fields are not empty
    if(($message == "") || ($title == "")){
        // redirect the user to the class_routine page with a error message
        $message = 'You can\'t have an empty field';
        Header("Location: assignments.php?message=".$message."&category=danger");
    }else{
        // store the collected data to the database
        $sql = "INSERT INTO assignment 
                (`creator_id`,`title`,`assignment`,`target_level`) VALUES (?,?,?,?)";
        $stmt = mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt, "ssss", $creator_id,$title,$message,$target_level);
        mysqli_stmt_execute($stmt);
		
		// redirect the user to the class_routine page with a success message
        $message = 'Assignment created sucessfully!';
        Header("Location: assignments.php?message=".$message."&category=success");
    }
    
}