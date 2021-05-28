<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Chat</title>
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
         <div class="container mt-4" style="background-color: white;">
            <div class="board row" style="width: 100%; height: 450px;">
               <div class="col-sm-10">
                  <input class="mssg-input" type="text" name="message" placeholder="Type your message here" style="border-radius:12px; width: 100%; padding:5px;" required>
               </div>
               <div class="col-sm-2">
                  <a href="create_discussion.html" type="button" class="btn mx-2 float-right btn-primary mssg-btn" style=" color: white; border-radius:50px;">
                  Send</a> 
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