<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Study Material</title>
      <!-- media query-->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/gou_css.css">
      <!-- Boostrap csss-->
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/font/css/fontawesome.min.css">
      <!-- font awesome-->
      <link href="assets/font/css/fontawesome.css" rel="stylesheet">
      <link href="assets/font/css/brands.css" rel="stylesheet">
      <link href="assets/font/css/solid.css" rel="stylesheet">
      <!--linking the bootstrap icon CDN -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
      
   </head>
   <body class="div_color">
      <div class="container-fluid">
         <!--##############################-->
           <?php
                include('includes/header.php');
				include('includes/study-manager-include.php');
                
                // redirect the user to the login page if not authenticated
                if(!(isset($_SESSION["authenticated"]) &&  
                    $_SESSION["authenticated"] === true)){
                	// redirect the user to the login page with a success message
                    $message = 'Access denied <br> Login to continue.';
                    Header("Location: login.php?message=".$message."&category=danger");
                	exit;
                }
				
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
           ?>
           <!--##############################-->
         <i class="bi bi-arrow-right-circle-fill" style="font-size: 25px;
            color: black; margin-left: 150px;">  Study Material</i>
         <a type="button" class="btn float-right btn-primary" 
			style="color: white; border-radius:50px; margin-right: 150px;" 
			data-toggle="modal" data-target="#myModal">
			Add Study Material
		 </a> 
         <div class="container mt-4">
            <div class="board" style="width: 100%; height: 450px; background-color: white;">
               <div class="board2 " style="width: 100%; height: 50px; color: white; background-color: black;  
                  font-size: 20px; padding-left: 20px; padding-top: 10px;">
                  Study Document Manager
               </div>
               <div class="container mt-4 table-responsive">
                  <table class="table table-bordered">
                     <tr class="div_color">
                        <td >#</td>
                        <td>Date</td>
                        <td>Title</td>
                        <td>Description</td>
                        <td>Options</td>
                     </tr>
					 <tbody>
						<?php
						    $current_user = $_SESSION["s_user_id"];
							// fetch all categories from the database using the SELECT statement								
							$sql = "SELECT * FROM study_material WHERE true";
							$result = mysqli_query($conn, $sql);
							// iterate through the fetched result and display it
							$count = 1;
							while($row = mysqli_fetch_array($result)) {
								$uploaded_at = $row['uploaded_at'];
								$date = strtotime($uploaded_at);
								if($current_user == $row['owner_id']){
								    echo '<tr>
										<td >'.$count.'</td>
										<td>'.date("D/M/Y h:i:s", $date).'</td>
										<td>'.$row['title'].'</td>
										<td>'.$row['description'].'</td>
										<td>
											<a href="'.$row['document_path'].'">
											    <i title="Download" class="bi bi-cloud-download-fill" style="color: #007bff"></i>
											</a>
											<form name="formForDocWithId_'.$row['id'].'" method="POST" action="" style="display: inline;">
											    <input type="hidden" name="docs-id" value="'.$row['id'].'">
											    <input type="hidden" name="docs-path" value="'.$row['document_path'].'">
											    <button type="button" name="delete-docs" class="btn" onclick="confrimDocDelete(\'formForDocWithId_'.$row['id'].'\')">
											        <i title="Delete" class="bi bi-trash-fill mx-4" style="color:red"></i>
											    </button>
											</form>
										</td>
									</tr>';
								}else{
								    echo '<tr>
										<td >'.$count.'</td>
										<td>'.date("D/M/Y h:i:s", $date).'</td>
										<td>'.$row['title'].'</td>
										<td>'.$row['description'].'</td>
										<td>
											<a href="'.$row['document_path'].'">
											    <i title="Download" class="bi bi-cloud-download-fill" style="color: #007bff"></i>
											</a>
										</td>
									</tr>';
								}
								// increment count or S/N 
								$count++;
							}   
						?>
						
					 </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
	  
	  <!-- The Modal -->
	  <div class="modal" id="myModal">
		<div class="modal-dialog">
		  <div class="modal-content">
		  
			<!-- Modal Header -->
			<div class="modal-header">
			  <h4 class="modal-title">Add Study Material</h4>
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			
			<form method="POST" action="" enctype="multipart/form-data">
				<!-- Modal body -->
				<div class="modal-body">
					<div class="form-group">
						<div class="col-sm-12">
							<label for="address">Title</label><span class="text-danger"> *<?php echo $title_err;?></span>
							<input type="text" class="form-control" id="title" name="title" 
								placeholder="Enter the material title" style="border-radius:12px;" required>
						</div>
						<div class="col-sm-12">
							<label for="address">Description</label><span class="text-danger"> *<?php echo $description_err;?></span>
							<textarea type="text" class="form-control" id="description" name="description" 
								style="border-radius:12px;" required>
							</textarea>
						</div>
						<div>
							<label for="address">Document</label><span class="text-danger"> *<?php echo $upload_err;?></span>
							<input id="uploadDocs" class="form-control" type="file" name="filename" id="filename">
						</div>
					</div>
				</div>
				
				<!-- Modal footer -->
				<div class="modal-footer">
				  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				  <input type="submit" class="btn btn-primary" name="submit" value="Submit">
				</div>
			</form>
		  </div>
		</div>
	  </div>
      
      <script>
          // this funtion requests user permission to delete the study material
          function confrimDocDelete(formName){
              // pop up a confirmation message
              var confirmation = confirm("Are you sure you want to delete this study material?")
              if(confirmation){
                  // submit the specified form once the confirmation is true
                  document.forms[formName].submit();
              }
          }
          
      </script>
      <!-- jQuery library -->
      <script src="assets/js/jquery.min.js"></script>
      <!-- Popper JS -->
      <script src="assets/js/popper.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="assets/js/bootstrap.min.js"></script>
   </body>
</html>