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
                include('includes/create-discussion-include.php');
                
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
         <div class="container">
             <form method="POST" action="">
                 <div class="form-group">
                   <label for="text">Discussion Title</label><span class="text-danger"> *<?php echo $erro_mssg;?></span>
                   <input type="text" class="form-control" id="text" name="title" style="width: 90%; height: 100px;">
                   <input type="submit" name="create-discussion" class="btn mx-2 float-right btn-primary" style=" color: white;" value="Add">
                </div>
                
                <div class="form-group">
                   <label for="comment">Type your message here</label>
                   <textarea name="message" class="form-control" rows="5" id="comment" style="width: 80%; height: 500px;" palceholder="Type your message here"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="level"><b>Category : </b></label>
                    <?php
						$sql = "SELECT * FROM categories WHERE true";
						$result = mysqli_query($conn, $sql);
						//$row = mysqli_fetch_assoc($result);
                        while($row = mysqli_fetch_array($result)) {
							echo '<label class="mx-2">
									<input type="checkbox" class="radio" value="'.$row['id'].'" name="category_id" />'.$row['name'].'
								</label>';
                        }   
                    ?>
                        
                </div>
             </form>
         </div>
      </div>
      <script>
         CKEDITOR.replace( 'message' );
         
        // the selector will match all input controls of type :checkbox
        // and attach a click event handler 
        $("input:checkbox").on('click', function() {
          // in the handler, 'this' refers to the box clicked on
          var $box = $(this);
          if ($box.is(":checked")) {
            // the name of the box is retrieved using the .attr() method
            // as it is assumed and expected to be immutable
            var group = "input:checkbox[name='" + $box.attr("name") + "']";
            // the checked state of the group/box on the other hand will change
            // and the current value is retrieved using .prop() method
            $(group).prop("checked", false);
            $box.prop("checked", true);
          } else {
            $box.prop("checked", false);
          }
        });
      </script>
    </body>
</html>