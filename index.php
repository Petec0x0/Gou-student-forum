<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Home | </title>
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
      <div class="container-fluid bgimage">
         <!--##############################-->
           <?php
                include('includes/header.php');
           ?>
        <!--##############################-->
         <div class="container text-center" style="padding-top:15%">
            <p style="color: grey; font-size: 50px; font-weight: bold;
               font-family: sans-serif;">Developing <!--Creating--> Student's Connection</p>
            <a href="login.php" type="button" class="btn btn-primary mx-2">Sign In</a> 
            <a href="registration.php" class="btn btn-primary my-2 my-sm-0 mx-2" type="button">Get Started</a>
         </div>
         <div class="container mt-4">
             <diV class="row">
                 <div class="mission-vission col-sm-4 mx-4">
                    <p>VISION</p>
                    The vision of Godfrey Okoye University is to produce graduates who would be outstanding in learning, 
                    balanced in character, personality and ready to pursue epistemic unity in all its ramification.
                 </div>
                 <div class="mission-vission col-sm-4 mx-2">
                    <p>MISSION</p>
                    Godfrey Okoye University dedicates itself to impart quality education aimed at inculcating in
                    students strong personality that will ensure the promotion of religious,
                    cultural and epistemological dialogue.
                 </div>
                 <div class="col-sm-4"></div>
             </diV>
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

