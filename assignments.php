<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Assignment</title>
      <!-- media query-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
      <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
   </head>
   <body class="div_color">
      <div class="container-fluid">
         <!--##############################-->
       <?php
            include('includes/header.php');
            include('includes/assignments.includes.php');
            
            // redirect the user to the login page if not authenticated
            if(!(isset($_SESSION["authenticated"]) &&  
                $_SESSION["authenticated"] === true)){
            	// redirect the user to the login page with a success message
                $message = 'Access denied <br> Login to continue.';
                Header("Location: login.php?message=".$message."&category=danger");
            	exit;
            }else if(!(isset($_SESSION["lecturer_authenticated"]))){
                Header("Location: assignments-for-students.php");
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
         <div class="container mt-4">
            <div class="board" style="width: 100%; min-height: 450px; background-color: white;">
               <div class="board2 " style="width: 100%; height: 50px; color: white; background-color: black;  
                  font-size: 20px; padding-left: 20px; padding-top: 10px;">
                  Assignments
               </div>
               <div class="container mt-4" >
                  <form role="form" method="post" action="">
                     <div class="form-group">
                        <div class="row">
                           <div class="col-sm-12">
                              <label for="title">Title</label><span class="text-danger"> *<?php echo $erro_mssg;?></span>
                              <input type="text" class="form-control" id="title" name="title" style="border-radius:12px;" required>
                           </div>
                           <div class="col-sm-12">
							   <label for="message">Type the assignment</label>
							   <textarea name="message" class="form-control" rows="5" id="message" style="width: 80%; height: 500px;"></textarea>
							</div>
							
                           <div class="col-sm-12 mt-4">
                                <label for="target_level">This assignment is for which level?</label>
                                <select class="form-control" id="sel1" name="target_level">
                                   <option value="100">100 Level</option>
                                   <option value="200">200 Level</option>
                                   <option value="300">300 Level</option>
                                   <option value="400">400 Level</option>
                                </select>
                           </div>
                           
                           <div class="col-sm-12">
                               <input type="submit" 
								class="btn mx-2 mt-4 btn-primary float-right" 
								style="color: white; border-radius:50px;" name="create-assignment" value="Continue">
                           </div>
                        </div>
                    </div>
                  </form>
               </div>
               
               <hr>
               <div class="container">
                   <h5>Created Assignment</h5>
                   <div class="container mt-4 table-responsive">
                      <table class="table table-bordered">
                         <tr class="div_color">
                            <td >#</td>
                            <td>Date</td>
                            <td>Title</td>
                            <td>-</td>
                         </tr>
    					 <tbody>
    						<?php
    						    $current_user = $_SESSION["s_user_id"];
    							// fetch all categories from the database using the SELECT statement								
    							$sql = "SELECT * FROM assignment WHERE creator_id = '$current_user'";
    							$result = mysqli_query($conn, $sql);
    							$rowcount = mysqli_num_rows($result);
    							// check if the lecturer have created any assignment
    							if($rowcount > 0){
    							    // iterate through the fetched result and display it
        							$count = 1;
        							while($row = mysqli_fetch_array($result)) {
        							    
        								echo '<tr>
        										<td >'.$count.'</td>
        										<td>'.$row['created_at'].'</td>
        										<td>'.$row['title'].'</td>
        										<td>
        										    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#assignment'.$row['id'].'">
        										        View
        										    </button>
        										</td>
        									</tr>';
        								// increment count or S/N 
        								$count++;
        							}
    							}else{
    							    echo '<tr>
    							            <h4 class="text-center">The Assignments you created Will Appear Here</h4>
    							          </tr>';
    							}
    							   
    						?>
    						
    					 </tbody>
                      </table>
                   </div>
               </div>
               
            </div>
         </div>
      </div>
      
      <?php
	    $current_user = $_SESSION["s_user_id"];
		// fetch all categories from the database using the SELECT statement								
		$sql = "SELECT * FROM assignment WHERE creator_id = '$current_user'";
		$result = mysqli_query($conn, $sql);
	    // iterate through the fetched result and display it
		while($row = mysqli_fetch_array($result)) {
		    echo '<!-- The Modal -->
            	  <div class="modal" id="assignment'.$row['id'].'">
            		<div class="modal-dialog">
            		  <div class="modal-content">
            		  
            			<!-- Modal Header -->
            			<div class="modal-header">
            			  <h4 class="modal-title">'.$row['title'].'</h4>
            			  <button type="button" class="close" data-dismiss="modal">&times;</button>
            			</div>
            			
            			<!-- Modal body -->
            			<div class="modal-body">'.$row['assignment'].'</div>
            				
            			<!-- Modal footer -->
            			<div class="modal-footer">
            			  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            			</div>
            		  </div>
            		</div>
            	  </div>';
		}
		   
	?>
      <script>
         CKEDITOR.replace( 'message' );
	  </script>   
      <!-- jQuery library -->
      <script src="assets/js/jquery.min.js"></script>
      <!-- Popper JS -->
      <script src="assets/js/popper.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="assets/js/bootstrap.min.js"></script>
   </body>
</html>