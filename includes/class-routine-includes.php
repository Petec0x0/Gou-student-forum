<?php
// import the database connection
include_once "includes/config.php";

// for storing error messages
 $erro_mssg = "";
 
// check if a create-discussion post request have been sent
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-routine'])) {
    $purpose = test_input($_POST['purpose']);
    $day_id = $_POST['day_id'];
    $time = $_POST['time'];
    if(isset($_POST['repeat']) && ($_POST['repeat'] == 1)){
        $repeat = 1;
    }else{
        $repeat = 0;
    }
    

    // get the owner_id (The id of the user who created the routine)
	$owner_id = $_SESSION["s_user_id"];
	
	// make sure the input fields are not empty
    if(($time == "") || ($purpose == "")){
        // redirect the user to the class_routine page with a error message
        $message = 'You can\'t have an empty field';
        Header("Location: class_routine.php?message=".$message."&category=danger");
    }else{
        // store the collected data to the database
        $sql = "INSERT INTO routine 
                (`owner_id`,`purpose`,`day_id`,`time`,`repeat_status`) VALUES (?,?,?,?,?)";
        $stmt = mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt, "sssss", $owner_id,$purpose,$day_id,$time,$repeat);
        mysqli_stmt_execute($stmt);
		
		// redirect the user to the class_routine page with a success message
        $message = 'Routine created sucessfully!';
        Header("Location: class_routine.php?message=".$message."&category=success");
    }
}

// check if post request is sent
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['routine-id'])) {
    $routine_id = $_POST['routine-id'];

    // the delete query for deleting study material from the database using the ID
    $sql = "DELETE FROM routine WHERE id = '$routine_id'";
    if(mysqli_query($conn, $sql)){
        // redirect the user to the login page with a success message
        $message = 'Routine was deleted sucessfully!';
        Header("Location: class_routine.php?message=".$message."&category=info");
    }
}