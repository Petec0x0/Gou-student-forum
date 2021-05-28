<?php
// import the database connection
include_once "includes/config.php";

$title_err = $description_err = $upload_err = "";
$title_valid = $description_valid = $upload_valid = false;


// check if post request is sent
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
	$title = test_input($_POST['title']);
    $description = test_input($_POST['description']);
	// uploader's id from the session
	$owner_id = $_SESSION["s_user_id"];
	// a variable to store the document's path
	$document_path = "";
	
	// make sure the title field is not empty
    if(!($title == "")){
        $title_valid = true;
    }else{
        $title_err = "This field cannot be empty!";
    }

    // make sure the description field is not empty
    if(!($description == "")){
        $description_valid = true;
    }else{
        $description_err = "This field cannot be empty!";
    }
	
	///////////////////////////////////////////////////////////
    // Document validation and upload
    $target_dir = "uploads/docs/";
    $target_file = $target_dir . time() . basename($_FILES["filename"]["name"]);
    $documentFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // check if the user uploaded an Document or not
    if(isset($_FILES['filename']) && !empty($_FILES['filename']['name'])) {
        // Allow only valid image file types
        if($documentFileType != "pdf" && $documentFileType != "doc" && $documentFileType != "docx") {
			$upload_err = "Sorry, only PDF, DOC & DOCX files are allowed.";
        }else{
            // file upload
			if (move_uploaded_file($_FILES["filename"]["tmp_name"], $target_file)) {
				// Do nothing
				$document_path = $target_file;
				$upload_valid = true;
			}else{
				$upload_err = "Sorry, there was an error uploading your file.";
			}
        }
    }else{
        // give an error message if a file is not uploaded
        $upload_err = "File upload field cannot be empty";
    }
	
	// check if all form fields are validated before saving any data
	if($title_valid && $description_valid && $upload_valid){
		// sql insert statement to store study-material registration data.
        $sql = "INSERT INTO study_material (`owner_id`,`title`,`description`,`document_path`) VALUES (?,?,?,?)";
        $stmt = mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt, "isss", $owner_id,$title,$description,$document_path);
        mysqli_stmt_execute($stmt);
		
		// redirect the user to the login page with a success message
        $message = 'Study material uploaded sucessfully!';
        Header("Location: study_manager.php?message=".$message."&category=success");
	}else{
		echo 'Free, high quality, open source icon library with over 1,300 icons. Include them anyway you like—SVGs, SVG sprite, or web fonts. Use them with or without Bootstrap in any project.';
	}
}