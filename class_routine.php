<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Class Routine</title>
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
   </head>
   <body class="div_color">
      <div class="container-fluid">
         <!--##############################-->
       <?php
            include('includes/header.php');
            include('includes/class-routine-includes.php');
            
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
       
         <div class="bread_crumb">
             <i class="bi bi-arrow-right-circle-fill" style="font-size: 25px; 
            color: black;">  Add Class Routine</i>
         </div>
         <div class="container mt-4">
            <div class="board" style="width: 100%; min-height: 450px; background-color: white;">
               <div class="board2 " style="width: 100%; height: 50px; color: white; background-color: black;  
                  font-size: 20px; padding-left: 20px; padding-top: 10px;">
                  Add New Routine
               </div>
               <div class="container mt-4" >
                  <form role="form" method="post" action="">
                     <div class="form-group">
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="row">
                                 <div class="col-sm-2 text-center mt-2" style="margin-left: 10px;">
                                    <label for="course_title">Purpose</label>
                                 </div>
                                 <div class="col-sm-6">
                                    <input type="text" class="form-control" id="purpose" name="purpose" style="border-radius:12px;" required>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-12 mt-4">
                              <div class="row">
                                 <div class="col-sm-2 text-center mt-2" style="margin-left: 10px;">
                                    <label for="day">Day</label>
                                 </div>
                                 <div class="col-sm-6">
                                    <select class="form-control" id="sel1" name="day_id">
                                       <option value="1">Monday</option>
                                       <option value="2">Tuesday</option>
                                       <option value="3">Wednesday</option>
                                       <option value="4">Thursday</option>
                                       <option value="5">Friday</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-12 mt-4">
                              <div class="row">
                                 <div class="col-sm-2 text-center mt-2" style="margin-left: 10px;">
                                    <label for="course_title">Start Time</label>
                                 </div>
                                 <div class="col-sm-2">
                                    <input type="time" class="form-control" id="time" name="time" style="border-radius:12px;" required>
                                 </div>
                                 <div class="col-sm-2 text-center mt-2" style="margin-left: 10px;">
                                    <label for="course_title">Repeat :</label>
                                 </div>
                                 <div class="col-sm-2">
                                    <input type="checkbox" class="form-control" id="repeat" name="repeat" value="1" style="border-radius:12px;">
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-12 mt-4">
                              <input name="add-routine" type="submit" class="btn float-right btn-primary" style="color: white; border-radius:50px; margin-right: 150px;" value="Add Class Routine">
                           </div>
                    </form>
                  </div>
                  </div>
               </div>
               
               <hr>
               <div class="container">
                   <h5>My Routines</h5>
                   <div class="container mt-4 table-responsive">
                      <table class="table table-bordered">
                         <tr class="div_color">
                            <td >#</td>
                            <td>Purpose</td>
                            <td>Day</td>
                            <td>Time</td>
                            <td>Repeat</td>
                            <td>Status</td>
                            <td>Delete</td>
                         </tr>
    					 <tbody>
    						<?php
    						    $current_user = $_SESSION["s_user_id"];
    							// fetch all categories from the database using the SELECT statement								
    							$sql = "SELECT * FROM routine WHERE owner_id = '$current_user'";
    							$result = mysqli_query($conn, $sql);
    							$rowcount = mysqli_num_rows($result);
    							// check is the user have created any outine
    							if($rowcount > 0){
    							    // iterate through the fetched result and display it
        							$count = 1;
        							while($row = mysqli_fetch_array($result)) {
        							    // use switch case to get the day based on the day_id
        							    switch ($row['day_id']) {
                                          case 1:
                                            $day = 'Monday';
                                            break;
                                          case 2:
                                            $day = 'Tuesday';
                                            break;
                                          case 3:
                                            $day = 'Wednesday';
                                            break;
                                          case 4:
                                            $day = 'Thursday';
                                            break;
                                          default:
                                            $day = 'Friday';
                                        }
                                        
                                        // use the switch case to check if the repeat is checked or not
                                        switch ($row['repeat_status']) {
                                          case 1:
                                            $repeat_status = 'Yes';
                                            break;
                                          default:
                                            $repeat_status = 'No';
                                        }
                                        
                                        // use the switch case to check if the active state
                                        switch ($row['status']) {
                                          case 1:
                                            $status = 'Active';
                                            break;
                                          default:
                                            $status = 'Inactive';
                                        }
                                        
        								echo '<tr>
        										<td >'.$count.'</td>
        										<td>'.$row['purpose'].'</td>
        										<td>'.$day.'</td>
        										<td>'.$row['time'].'</td>
        										<td>'.$repeat_status.'</td>
        										<td>'.$status.'</td>
        										<td>
        											<form name="formForRoutineWithId_'.$row['id'].'" method="POST" action="" style="display: inline;">
        											    <input type="hidden" name="routine-id" value="'.$row['id'].'">
        											    <button type="button" name="delete-routine" class="btn" onclick="confrimDocDelete(\'formForRoutineWithId_'.$row['id'].'\')">
        											        <i title="Delete" class="bi bi-trash-fill mx-4" style="color:red"></i>
        											    </button>
        											</form>
        										</td>
        									</tr>';
        								// increment count or S/N 
        								$count++;
        							}
    							}else{
    							    echo '<tr>
    							            <h4 class="text-center">Your Personal Routine Will Appear Here</h4>
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
      
      <script>
          // this funtion requests user permission to delete the routine
          function confrimDocDelete(formName){
              // pop up a confirmation message
              var confirmation = confirm("Are you sure you want to delete this routine?")
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