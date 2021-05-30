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
            
            // redirect the user to the login page if not authenticated
            if(!(isset($_SESSION["authenticated"]) &&  
                $_SESSION["authenticated"] === true)){
            	// redirect the user to the login page with a success message
                $message = 'Access denied <br> Login to continue.';
                Header("Location: login.php?message=".$message."&category=danger");
            	exit;
            }
       ?>
       <!--##############################-->
       
         <div class="bread_crumb">
             <i class="bi bi-arrow-right-circle-fill" style="font-size: 25px; 
            color: black;">  Add Class Routine</i>
         </div>
         <div class="container mt-4">
            <div class="board" style="width: 100%; height: 450px; background-color: white;">
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
                                    <label for="course_title">Class</label>
                                 </div>
                                 <div class="col-sm-6">
                                    <input type="text" class="form-control" id="course_title" name="course_title" style="border-radius:12px;" required>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-12 mt-4">
                              <div class="row">
                                 <div class="col-sm-2 text-center mt-2" style="margin-left: 10px;">
                                    <label for="day">Day</label>
                                 </div>
                                 <div class="col-sm-6">
                                    <select class="form-control" id="sel1" name="day">
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
                                    <input type="time" class="form-control" id="appt" name="appt" style="border-radius:12px;" required>
                                 </div>
                                 <div class="col-sm-2 text-center mt-2" style="margin-left: 10px;">
                                    <label for="course_title">End Time</label>
                                 </div>
                                 <div class="col-sm-2">
                                    <input type="time" class="form-control" id="end" name="end" style="border-radius:12px;" required>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-12 mt-4">
                              <a href="create_discussion.html" type="button" class="btn float-right btn-primary" style="color: white; border-radius:50px; margin-right: 150px;">
                              Add Class Routine</a> 
                           </div>
                    </form>
                  </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- jQuery library -->
      <script src="assets/js/jquery.min.js"></script>
      <!-- Popper JS -->
      <script src="assets/js/popper.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="assets/js/bootstrap.min.js"></script>
   </body>
</html>