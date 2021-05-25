<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Start a discussion</title>
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
      <!-- jQuery library -->
      <script src="assets/js/jquery.min.js"></script>
      <!-- Popper JS -->
      <script src="assets/js/popper.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="assets/js/bootstrap.min.js"></script>
      <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
   </head>
   <body class="div_color">
      <div class="container-fluid">
        <!--##############################-->
           <?php
                include('includes/header.php');
           ?>
        <!--##############################-->
         <div class="container">
            <div class="form-group">
               <label for="text">Write down your topic:</label>
               <input type="text" class="form-control" id="text" style="width: 90%; height: 100px;">
               <a href="discussion.html" type="button" class="btn mx-2 float-right btn-primary" style=" color: white;">
               Add </a> 
            </div>
            <div class="form-group">
               <label for="comment">Comment:</label>
               <textarea name="body" class="form-control" rows="5" id="comment" style="width: 80%; height: 500px;"></textarea>
            </div>
         </div>
      </div>
      <script>
         CKEDITOR.replace( 'body' );
      </script>
    </body>
</html>