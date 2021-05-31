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
				include('includes/discussion-includes.php');

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
           ?>
          <!--##############################-->
         <i class="bi bi-arrow-right-circle-fill" style="font-size: 25px; 
            color: black; margin-left: 150px;">  Discussion</i>
         <div class="container mt-4" style="background-color: white;">
            <div class="board " style="width: 100%; min-height: 450px;">
				<div class="row">
					<div class="col-sm-8">
						
							<?php
								// check if a category is specified in the request
								if(isset($_REQUEST['category_id'])){
									$category = $_REQUEST['category_id'];
									// fetch all discussion from the database using the SELECT statement
								$sql = "SELECT * FROM discussion WHERE category_id = '$category' ORDER BY created_at DESC";
								}else{
									// fetch all discussion from the database using the SELECT statement
									$sql = "SELECT * FROM discussion WHERE true ORDER BY created_at DESC";
								}
								$result = mysqli_query($conn, $sql);
								// iterate through the fetched result and display it
								while($row = mysqli_fetch_array($result)) {
									$discussion_id = $row['id'];
									$created_at = $row['created_at'];
									$date = strtotime($created_at);
									echo '<div class="card mt-2">
											<div class="card-header">
												<a href="disccussion-details.php?discussion='.$row['slug'].'"><b>'.$row['title'].'</b></a>
											</div>
											<div class="card-body">
												<p>'.substr($row['message'], 0, 100).'...</p>
												<small><b>'.getUser($row['author_id'])['firstname'].'</b> on '.date("D/M/Y h:i:s", $date).'</small>
												<small class="float-right">'.getCommentCount($discussion_id).' comments</small>
											</div>
										  </div>';
										  
								}   
							?>
						
					</div>
					
					<div class="col-sm-4">
						<div class="card" style="width: 18rem;">
						  <a href="create_discussion.php" type="button" 
							class="btn mx-2 mt-4 btn-primary" 
							style="color: white; border-radius:50px;">
							Add Discussion
						  </a> 
						  <div class="card-header mt-4">
							Categories
						  </div>
						  <ul class="list-group list-group-flush">
							<?php
								// check if a category is specified in the request
								if(isset($_REQUEST['category_id'])){
									$category = $_REQUEST['category_id'];
								}else{
									$category = "";
								}
								// fetch all categories from the database using the SELECT statement								
								$sql = "SELECT * FROM categories WHERE true";
								$result = mysqli_query($conn, $sql);
								// iterate through the fetched result and display it
								while($row = mysqli_fetch_array($result)) {
									if($row['id'] == $category){
										echo '<li class="list-group-item active">
												<a style="color: white;" href="disccussion.php?category_id='.$row['id'].'">'.$row['name'].
											 '</li>';
									}else{
										echo '<li class="list-group-item">
												<a href="disccussion.php?category_id='.$row['id'].'">'.$row['name'].
											 '</li>';
									}
								}   
							?>
						  </ul>
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