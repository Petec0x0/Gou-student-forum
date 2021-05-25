<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Discussions</title>
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
            color: black; margin-left: 150px;">  Discussion</i>
         <div class="container mt-4" style="background-color: white;">
            <div class="board " style="width: 100%; height: 450px;">
               <a href="create_discussion.html" type="button" class="btn mx-2 float-right btn-primary" style=" color: white; border-radius:50px; margin-top: 370px;">
               Add Discussion</a> 
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