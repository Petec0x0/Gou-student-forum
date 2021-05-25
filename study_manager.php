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
           ?>
           <!--##############################-->
         <i class="bi bi-arrow-right-circle-fill" style="font-size: 25px;
            color: black; margin-left: 150px;">  Study Material</i>
         <a href="create_discussion.html" type="button" class="btn float-right btn-primary" style="color: white; border-radius:50px; margin-right: 150px;">
         Add Study Material</a> 
         <div class="container mt-4">
            <div class="board" style="width: 100%; height: 450px; background-color: white;">
               <div class="board2 " style="width: 100%; height: 50px; color: white; background-color: black;  
                  font-size: 20px; padding-left: 20px; padding-top: 10px;">
                  Study Document Manager
               </div>
               <div class="container mt-4" >
                  <table class="table table-bordered">
                     <tr class="div_color">
                        <td >#</td>
                        <td>Date</td>
                        <td>Title</td>
                        <td>Description</td>
                        <td>Class</td>
                        <td>Subject</td>
                        <td>Download</td>
                        <td>Options</td>
                     </tr>
                  </table>
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