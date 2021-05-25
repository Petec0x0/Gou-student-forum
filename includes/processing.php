<?php
include_once "includes/config.php";
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }


//creating variables for form validation
$firstname_valid = $lastname_valid = $email_valid = $reg_no_valid = $address_valid = $phone_no_valid = 
$program_valid = $level_valid = $gender_valid = $password_valid = $image_valid = false;

//creating error variables for form validation
$firstname_err = $lastname_err = $email_err = $reg_no_err = $address_err = $phone_no_err = 
$program_err = $level_err = $gender_err = $password_err = $image_err = " ";

// check if post request is sent
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $firstname = test_input($_POST['firstname']);
    $lastname = test_input($_POST['lastname']);
    $email = test_input($_POST['email']);
    $reg_no = test_input($_POST['reg_no']);
    $address = test_input($_POST['address']);
    $phone_no = test_input($_POST['phone_no']);
    $program = test_input($_POST['program']);
    $level = test_input($_POST['level']);
    $gender = test_input($_POST['gender']);
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

    //reg_no validation
    if(!($reg_no == "")){
        $reg_no_valid = true;
    }else{
        $reg_no_err = "This field cannot be empty!";
    }

    //address validation
    if(!($address == "")){
        $address_valid = true;
    }else{
        $address_err = "This field cannot be empty!";
    }

    //program validation
    if(!($program == "")){
        $program_valid = true;
    }else{
        $program_err = "This field cannot be empty!";
    }

    //level validation
    if(!($level == "")){
        $level_valid = true;
    }else{
        $level_err = "This field cannot be empty!";
    }

    //gender validation
    if(!($gender == "")){
        $gender_valid = true;
    }else{
        $gender_err = "This field cannot be empty!";
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
    $target_dir = "uploads/";
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
        $image_path = "/assets/image_gou/index.png";
        $image_valid = true;
    }
    
    // check if all form fields are validated before saving any data
    if($firstname_valid && $lastname_valid
        && $email_valid && $reg_no_valid
        && $address_valid && $phone_no_valid
        && $program_valid && $level_valid
        && $gender_valid && $password_valid
        && $image_valid){
        // image upload
        if (move_uploaded_file($_FILES["filename"]["tmp_name"], $target_file)) {
            // Do nothing
            $image_path = $target_file;
        }else{
            $image_err = "Sorry, there was an error uploading your file.";
        }
        
        // sql insert statement to store student's registration data.
        $sql = "INSERT INTO students 
                (`email`,`password`,`firstname`,`lastname`,`reg_no`,`address`,`phone_no`,`level`,`gender`,`image`) 
                VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt, "ssssssssss", $email,$hashed_password,$firstname,$lastname,$reg_no,$address,$phone_no,$level,$gender,$image_path);
        mysqli_stmt_execute($stmt);
        
        // redirect the user to the login page with a success message
        $message = 'Student account created sucessfully! <br> Login to continue.';
        Header("Location: login.php?success=".$message);
    }
    
}elseif($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])){
    // get the value for email POST parameter and sanitize the input
    $email = mysqli_real_escape_string($conn,test_input($_POST["email"]));
    // get the value for password POST parameter and sanitize the input
	$password = mysqli_real_escape_string($conn,test_input($_POST["password"]));
	
	// make sure the user inputs are not empty
	if(empty($email) || empty($password)){
			$reg_no_err = "Input field cannot be empty";
	}else{
	    $sql = "SELECT * FROM students WHERE email = '$email'";
		$result = mysqli_query($conn, $sql);
		$result_check = mysqli_num_rows($result);
		if($result_check < 1){
	    	$reg_no_err = "Invali Username/Password";
		}else{
		    if($row = mysqli_fetch_assoc($result)){
		    	//checking the hashed password
				$hashed_password_check = password_verify($password, $row["password"]);
				if($hashed_password_check == false){
					$reg_no_err = "Invali Username/Password";
				}elseif($hashed_password_check == true){
					// Log in the user here
            	    $_SESSION["s_user_id"] = $row["id"];
            	    $_SESSION["s_email"] = $row["email"];
            	    $_SESSION["s_firstname"] = $row["firstname"];
            	    $_SESSION["s_lastname"] = $row["lastname"];
            	    $_SESSION["s_phone"] = $row["phone_no"];
            	    
            	    // redirect the studen to dashboard page 
                    Header("Location: disccussion.php");
				}
			}
		    
		}
	}

}

$conn->close();
?>