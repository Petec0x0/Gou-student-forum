<?php
// import the database connection
include_once "includes/config.php";

function getUser($userId){
	global $conn;
	$sql = "SELECT id, firstname, image FROM students WHERE id = '$userId' 
	            UNION SELECT id, firstname, image FROM lecturer WHERE id = '$userId'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	return array('firstname'=>$row["firstname"], 'image_path'=>$row["image"]);
}

function getCategory($categoryId){
	global $conn;
	$sql = "SELECT * FROM categories WHERE id = '$categoryId'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	return $row["name"];
}

function getCommentCount($discussion_id){
	global $conn;
	$sql = "SELECT * FROM replies WHERE discussion_id = '$discussion_id'";
	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);
	return $count;
}


// for storing error messages
 $erro_mssg = "";

 
// check if a create-discussion post request have been sent
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post-comment'])) {
    $discussion_id = test_input($_POST['discussion_id']);
	$discussion_slug = test_input($_POST['discussion_slug']);
    $message = $_POST['message'];
	// get the author's id (The id of the user who posted the discussion)
	$author_id = $_SESSION["s_user_id"];
	
	// make sure the input fields are not empty
    if($message == ""){
        $erro_mssg = "This field cannot be empty!";
    }else{
		// store the collected data to the database
        $sql = "INSERT INTO replies 
                (`discussion_id`,`message`,`author_id`) VALUES (?,?,?)";
        $stmt = mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt, "sss", $discussion_id,$message,$author_id);
        mysqli_stmt_execute($stmt);
		
		// redirect the user to the login page with a success message
        $message = 'Comment created sucessfully!';
        Header("Location: disccussion-details.php?discussion=".$discussion_slug."&message=".$message."&category=success");
	}
}