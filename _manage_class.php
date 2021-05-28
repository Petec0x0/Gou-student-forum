<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Manage Class</title>
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
       ?>
       <!--##############################-->
      <i class="bi bi-arrow-right-circle-fill" style="font-size: 25px; 
         color: black; margin-left: 150px;">  Manage Class</i>
      <div class="container mt-4">
         <div class="board" style="width: 100%; height: 450px; background-color: white;">
            <div class="board2 " style="width: 100%; height: 50px; color: black;  
               font-size: 20px; padding-left: 20px; padding-top: 10px; ">
               <i class="bi bi-list"> Class</i>
               <i class="bi bi-plus-circle" style="margin-left: 100px;"> Add Class</i>
            </div>
            <hr>
            <div class="container mt-4" >
               <form role="form" method="post" action="">
                  <div class="form-group">
                     <div class="row">
                        <div class="col-sm-6">
                           <label for="course_title">Course Title</label><span class="text-danger">
                           <input type="text" class="form-control" id="course_title" name="course_title" style="border-radius:12px;" required>
                        </div>
                        <div class="col-sm-6">
                           <label for="course_code">Course Code</label>
                           <input type="text" class="form-control" id="course_code" name="course_code" style="border-radius:12px;" required>
                        </div>
                        <div class="col-sm-6 mt-4">
                           <label for="lecturer">Lecturer</label>
                           <select class="form-control" id="sel1" name="lecturer">
                              <option value="">Mr.Benson</option>
                              <option value="female">Dr.Agu</option>
                              <option value="others">Others</option>
                           </select>
                        </div>
                     </div>
                     <a href="create_discussion.html" type="button" class="btn float-right btn-primary" style="color: white; border-radius:50px; margin-right: 150px;">
                     Add Study Material</a> 
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