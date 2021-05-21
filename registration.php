<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Registration |</title>
      <!-- media query-->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="">
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
       ?>
       <!--##############################-->
      <nav class="navbar navbar-expand-sm bak navbar-light justify-content-center ">
         <!-- Brand/logo -->
         <a class="navbar-brand" href="index.html">
         <img src="assets/image_gou\GOUniversity_logo.jpg" alt="logo" style="width:150px;">
         </a>
      </nav>
      <div class="container">
      <div class="row">
         <div class="col-sm-3 .visible-xs, hidden-xs"></div>
         <div class=" col-sm-6 jumbotron">
            <div class="header">
               <h4 class="font-size: 50px; font-weight:bold;">Registration Form</h4>
               <div class="text-center col-xl-4" style="margin-left: 30%;">
                  <img id="uploadPreview" src="assets/image_gou\index.png" class="img-responsive img-thumbnail"
                     style="max-width: 100px;max-height: 100px;width: 100px; height: 100px;">
                  <input id="uploadImage" class="form-control" type="file" name="filename" id="filename" onchange="PreviewImage();">
               </div>
            </div>
            <div class=" container-fluid mt-4">
               <form role="form" method="post" action="processing.php" enctype="multipart/form-data">
                  <div class="form-group">
                     <div class="row">
                        <div class="col-sm-6">
                           <label for="firstname">Firstname</label><span class="text-danger"> *<?php echo $firstname_err;?></span>
                           <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter Firstname" style="border-radius:12px;" required>
                        </div>
                        <div class="col-sm-6">
                           <label for="lastname"></span>Lastname</label><span class="text-danger"> *<?php echo $lastname_err;?></span>
                           <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Lastname" style="border-radius:12px;" required>
                        </div>
                        <br>
                        <div class="col-sm-12 mt-4">
                           <label for="email">Email</label><span class="text-danger"> *<?php echo $email_err;?></span>
                           <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" style="border-radius:12px;" required>
                        </div>
                        <br>
                        <div class="col-sm-6 mt-4">
                           <label for="reg_no">Reg_No</label><span class="text-danger"> *<?php echo $reg_no_err;?></span>
                           <input type="text" class="form-control" id="reg_no" name="reg_no" placeholder="Reg_No" style="border-radius:12px;" required>
                        </div>
                        <div class="col-sm-12 mt-4">
                           <label for="address">Address</label><span class="text-danger"> *<?php echo $address_err;?></span>
                           <input type="text" class="form-control" id="reg_no" name="address" placeholder="" style="border-radius:12px;" required>
                        </div>
                        <div class="col-sm-6 mt-4">
                           <label for="phone_no">Phone_No</label><span class="text-danger"> *<?php echo $phone_no_err;?></span>
                           <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="" style="border-radius:12px;" required>
                        </div>
                        <div class="col-sm-6 mt-4">
                           <label for="program">Program</label><span class="text-danger"> *<?php echo $program_err;?></span>
                           <input type="text" class="form-control" id="program" name="program" placeholder="Enter Program" style="border-radius:12px;" required>
                        </div>
                        <div class="col-sm-6 mt-4">
                           <label for="level">Level</label><span class="text-danger"> *<?php echo $level_err;?></span>
                           <select class="form-control" id="sel1" name="level">
                              <option value="100">100</option>
                              <option value="200">200</option>
                              <option value="300">300</option>
                              <option value="400">400</option>
                           </select>
                        </div>
                        <div class="col-sm-6 mt-4">
                           <label for="gender">Gender</label><span class="text-danger"> *<?php echo $gender_err;?></span>
                           <select class="form-control" id="sel1" name="gender">
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                              <option value="others">Others</option>
                           </select>
                        </div>
                        <div class="col-sm-6 mt-4">
                           <label for="password">Password</label><span class="text-danger"> *<?php echo $password_err;?></span>
                           <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" style="border-radius:12px;" required>
                        </div>
                        <div class="col-sm-6 mt-4">
                           <label for="confirm_password">Comfirm Password</label>
                           <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Comfirm password" style="border-radius:12px;" required>
                        </div>
                        <br><br><br><br>
                        <div class="col-sm-12 text-center mt-4">
                           <button type="submit" name="register" class="btn btn-primary" style="border-radius:50px;">Add Student</button>
                        </div>
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
      
      <script type="text/javascript">
         function PreviewImage() {
             var oFReader = new FileReader();
             oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
         
             oFReader.onload = function (oFEvent) {
                 document.getElementById("uploadPreview").src = oFEvent.target.result;
             };
         };
      </script>
   </body>
</html>

