<?php
// import the database connection
include_once "includes/config.php";

// a funtion for a random string generator
function generateRandomString($length = 5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
 
 // for storing error messages
 $erro_mssg = "";

 
// check if a create-discussion post request have been sent
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sendChat'])) {
    $title = test_input($_POST['title']);
    $category_id = $_POST['category_id'];
    $message = $_POST['message'];
	
	// get the author's id (The id of the user who posted the discussion)
	$author_id = $_SESSION["s_user_id"];
	
	// make sure the input fields are not empty
    if(($title == "") || ($message == "")){
        $erro_mssg = "You can't have an empty";
    }else{
        $slug = 'discussion'.generateRandomString() . time();
		// check if the checked or not
		if(empty($_POST["category_id"])){
			// if category_id is not checked give it a default of 1(General)
			$category_id = 1;
		}
		
		// store the collected data to the database
        $sql = "INSERT INTO discussion 
                (`title`,`slug`,`message`,`category_id`,`author_id`) VALUES (?,?,?,?,?)";
        $stmt = mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt, "sssss", $title,$slug,$message,$category_id,$author_id);
        mysqli_stmt_execute($stmt);
		
		// redirect the user to the login page with a success message
        $message = 'Discussion created sucessfully!';
        Header("Location: disccussion.php?message=".$message."&category=success");
    }
}