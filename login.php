<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Login |</title>
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
   </head>
   <body>
       <!--##############################-->
       <?php
            include('includes/processing.php');
            
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
            
            // redirect the user if already authenticated
            if(isset($_SESSION["authenticated"]) &&  
                $_SESSION["authenticated"] === true){
            	Header("Location: disccussion.php");
            	exit;
            }
       ?>
       <!--##############################-->
       
      <nav class="navbar navbar-expand-sm bak navbar-light justify-content-center ">
         <!-- Brand/logo -->
         <a class="navbar-brand" href="index.php">
         <img src="assets/image_gou\GOUniversity_logo.jpg" alt="logo" style="width:150px;">
         </a>
      </nav>
      <div class="container">
         <div class="row">
            <div class="col-sm-3 .visible-xs, hidden-xs"></div>
            <div class="col-sm-6 jumbotron">
               <div class="header">
                  <h4>Login</h4>
               </div>
               <div class="container">
                  <form role="form" method="post" action="">
                     <div class="form-group">
                        <label class="mt-4" for="email">Username</label><span class="text-danger"> *<?php echo $reg_no_err;?></span>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Enter email or reg no." style="border-radius:12px;" required>
                        <label class="mt-4" for="password">Password</label><span class="text-danger"> *</span>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" style="border-radius:12px;" required>
                        <br><br><br>
                        <p>Don't have an account? <a href="registration.php">Sign up now</a>.</p>
                        <button type="submit" name="login" class="btn btn-primary btn-block" style="border-radius:12px;"><span class="glyphicon glyphicon-off"></span> Login</button>
                     </div>
                  </form>
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

