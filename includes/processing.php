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
$program_valid = $level_valid = $gender_valid = $password_valid = false;

//creating error variables for form validation
$firstname_err = $lastname_err = $email_err = $reg_no_err = $address_err = $phone_no_err = 
$program_err = $level_err = $gender_err = $password_err = " ";

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
    $image_path = " ";

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
    if(preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $phone_no)) {
        $phone_no_valid = true;
    }else{
        $phone_no_err = "enter a valid phone number";
    }

    //password validation
    if(!($password == "") && !($confirm_password == "")){
        if($password == $confirm_password){
            $password_valid = true;
        }else{
            $password_err = "password doesnot match";
        }
    }else{
        $password_err = "password field cannot be empty";
    }
    // password hashing
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    
    $sql = "INSERT INTO users 
            (`email`,`password_`,`firstname`,`lastname`,`reg_no`,`address_`,`phone_no`,`level`,`gender`,`image`) 
            VALUES (?,?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssss", $email,$hashed_password,$firstname,$lastname,$reg_no,$address,$phone_no,$level,$gender,$image_path);
    $stmt->execute();
}elseif($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])){
    $email =$_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (`email`,`password_`) VALUES (?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email,$password);
    $stmt->execute();

}

$conn->close();
?>