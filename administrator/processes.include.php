<?php
//initialize the session
session_start();
include('../includes/config.php');

// check if user was redirected with a message
if(isset($_REQUEST['message'])){
    $message = $_REQUEST['message'];
    $category = $_REQUEST['category'];
    // dislay the message
    echo '<div class="alert alert-'.$category.' alert-dismissible text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
          '.$message.'
        </div>';
}

//creating variables for form validation
$firstname_valid = $lastname_valid = $email_valid = $phone_no_valid = $password_valid = $image_valid = false;

//creating error variables for form validation
$firstname_err = $lastname_err = $email_err = $phone_no_err = $password_err = $image_err = " ";
$reg_no_err = "";
            
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])){
    // get the value for email POST parameter and sanitize the input
    $email = mysqli_real_escape_string($conn,test_input($_POST["email"]));
    // get the value for password POST parameter and sanitize the input
    $password = mysqli_real_escape_string($conn,test_input($_POST["password"]));
    
    // make sure the user inputs are not empty
    if(empty($email) || empty($password)){
    		$reg_no_err = "Input field cannot be empty";
    }else{
        $sql = "SELECT * FROM administrator WHERE email = '$email'";
    	$result = mysqli_query($conn, $sql);
    	$result_check = mysqli_num_rows($result);
    	if($result_check < 1){
        	$reg_no_err = "Invali Username/Password";
    	}else{
    	    if($row = mysqli_fetch_assoc($result)){
    	    	//checking the hashed password
    			$hashed_password_check = password_verify($password, $row["password"]);
    			if($hashed_password_check == false){
    				$reg_no_err = "Invalid Username/Password";
    			}elseif($hashed_password_check == true){
    				// Log in the user here
            	    $_SESSION["s_user_id"] = $row["id"];
            	    $_SESSION["s_email"] = $row["email"];
            	    $_SESSION["s_name"] = $row["name"];
            	    $_SESSION["authenticated"] = true;
            	    $_SESSION["admin_authenticated"] = true;
            	    
            	    // redirect the studen to dashboard page 
                    Header("Location: dashboard.php");
    			}
    		}
    	}
    }

}


// check if post request is sent
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-lecturer'])) {
    $firstname = test_input($_POST['firstname']);
    $lastname = test_input($_POST['lastname']);
    $email = test_input($_POST['email']);
    $phone_no = test_input($_POST['phone_no']);
    $password = test_input($_POST['password']);
    $confirm_password = test_input($_POST['confirm_password']);
    
    //firstname and lastname validation
    if(preg_match('/^[a-z]*$/i', $firstname)){
        $firstname_valid = true;
    }else{
        $firstname_err = "Please enter a valid name.";
    }
    if(preg_match('/^[a-z]*$/i', $lastname)){
        $lastname_valid = true;
    }else{
        $lastname_err = "Please enter a valid name.";
    }

    //email validation
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_valid = true;
    }else{
        $email_err = "plese enter a valid email";
    }
    
    //phone number validation
    // use a regular expression to match phone number patterns
    if(preg_match("'^(([\+]([\d]{2,}))([0-9\.\-\/\s]{5,})|([0-9\.\-\/\s]{5,}))*$'", $phone_no)) {
        $phone_no_valid = true;
    }else{
        $phone_no_err = "Enter a valid phone number";
    }

    //password validation
    if(!($password == "") && !($confirm_password == "")){
        if($password == $confirm_password){
            $password_valid = true;
        }else{
            $password_err = "Password doesnot match";
        }
    }else{
        $password_err = "Password field cannot be empty";
    }
    // password hashing
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    
    ///////////////////////////////////////////////////////////
    // Image validation and upload
    $target_dir = "../uploads/";
    $target_file = $target_dir . time() . basename($_FILES["filename"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // check if the user uploaded an image or not
    if(isset($_FILES['filename']) && !empty($_FILES['filename']['name'])) {
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["filename"]["tmp_name"]);
        if($check !== false) {
            // Check file size
            if ($_FILES["filename"]["size"] <= 500000) {
                // Allow only valid image file types
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                  $image_err = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                }else{
                    $image_valid = true;
                }
            }else{
                $image_err = "Sorry, your file is too large.";
            }
        }else{
            $image_err = "Error : Please upload a valid image";
        }
    }else{
        // give a default file path for the image
        $image_path = "assets/image_gou/index.png";
        $image_valid = true;
    }
    
    // check if all form fields are validated before saving any data
    if($firstname_valid && $lastname_valid
        && $email_valid && $phone_no_valid
        && $password_valid && $image_valid){
        // image upload
        if (move_uploaded_file($_FILES["filename"]["tmp_name"], $target_file)) {
            // Do nothing
            $image_path = trim($target_file,'../');
        }else{
            $image_err = "Sorry, there was an error uploading your file.";
        }
        // create lecturer id using timestamp
        $lecturer_id = "".time();
        
        // sql insert statement to store student's registration data.
        $sql = "INSERT INTO lecturer 
                (`id`,`image`,`firstname`,`lastname`,`email`,`phone`,`password`) 
                VALUES (?,?,?,?,?,?,?)";
        $stmt = mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt, "sssssss", $lecturer_id,$image_path,$firstname,$lastname,$email,$phone_no,$hashed_password);
        mysqli_stmt_execute($stmt);
        
        // redirect the user to the login page with a success message
        $message = 'Lecturer account created sucessfully!';
        Header("Location: add_lecturer.php?message=".$message."&category=success");
    }
}