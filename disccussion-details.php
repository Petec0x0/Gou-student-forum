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
      <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
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
            color: black; margin-left: 150px;"> Discussion</i>
         <div class="container mt-4" style="background-color: white;">
            <div class="board " style="width: 100%; min-height: 450px;">
				<div class="row">
					<div class="col-sm-8">
						<?php
							if(isset($_REQUEST['discussion'])){
								$slug = test_input($_REQUEST['discussion']);
								
								$sql = "SELECT * FROM discussion WHERE slug = '$slug'";
								$result = mysqli_query($conn, $sql);
								$row = mysqli_fetch_assoc($result);
								
								$dn_id = $row["id"];
								$dn_title = $row["title"];
								$dn_message = $row["message"];
								$dn_category_id = $row["category_id"];
								$dn_author_id = $row["author_id"];
								$dn_updated_at = $row["updated_at"];
								
								// Breadcrumb
								echo '<nav aria-label="breadcrumb">
									  <ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="disccussion.php">Discussion</a></li>
										<li class="breadcrumb-item"><a href="disccussion.php?category_id='.$dn_category_id.'">'.getCategory($dn_category_id).'</a></li>
										<li class="breadcrumb-item active" aria-current="page"><b>'.$dn_title.'</b></li>
									  </ol>
									</nav>';
								
								// Discussion Details
							}
						?>
						<div class="row">
							<div class="col-sm-2"  style="max-width: 60px;">
								<img src="<?php echo getUser($dn_author_id)['image_path'];?>" class="img-responsive img-thumbnail"
                                     style="max-width: 50px ; max-height: 50px;width: 50px; height: 50px;">
							</div>
							<div class="col-sm-10">
								<small><a href=""><?php echo getUser($dn_author_id)['firstname'];?></a></small><br>
								<small><?php echo date("D/M/Y h:i:s", strtotime($dn_updated_at));?></small>
							</div>
						</div>
						
						<p class="mt-4" style="font-family: charter, Georgia, Cambria, 'Times New Roman', Times, serif;">
							<?php echo $dn_message;?>
						</p>
						<hr><hr>
						<h4>Comments</h4>
						<div class="container">
							<?php
								// fetch all categories from the database using the SELECT statement								
								$sql = "SELECT * FROM replies WHERE discussion_id = '$dn_id'";
								$result = mysqli_query($conn, $sql);
								// iterate through the fetched result and display it
								while($row = mysqli_fetch_array($result)) {
									$_author_img_path = getUser($row['author_id'])['image_path'];
									$_author_firstname = getUser($row['author_id'])['firstname'];
									$_comment_time = $row['created_at'];
									$_comment_message = $row['message'];
									echo '<div class="jumbotron" style="padding: 10px;">
											<div class="row">
												<div class="col-sm-2"  style="max-width: 60px;">
													<img src="'.$_author_img_path.'" class="img-responsive img-thumbnail"
														 style="max-width: 50px ; max-height: 50px;width: 50px; height: 50px;">
												</div>
												<div class="col-sm-10">
													<small><a href="">'.$_author_firstname.'</a></small><br>
													<small>'.date("D/M/Y h:i:s", strtotime($_comment_time)).'</small>
												</div>
												<div class="col-sm-12">
													<p>
														<b>'.$_comment_message.'</b>
													</p>
												</div>
											</div>
										</div>';
								}   
							?>
							
						</div>
						
						<form method="POST" action="">						
							<div class="form-group">
							   <label for="comment">Leave a comment</label><span class="text-danger"> *<?php echo $erro_mssg;?></span>
							   <textarea name="message" class="form-control" rows="5" id="comment" style="width: 80%; height: 500px;"
							   palceholder="Type your message here">
							   </textarea>
							</div>
							
							<input type="hidden" name="discussion_id" value="<?php echo $dn_id;?>">
							<input type="hidden" name="discussion_slug" value="<?php echo $slug;?>">
							
							<input type="submit" 
								class="btn mx-2 mt-4 btn-primary float-right" 
								style="color: white; border-radius:50px;" name="post-comment" value="Post Comment">
							<hr><hr>
						</form>
							
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
	  
	  <script>
         CKEDITOR.replace( 'message' );
	  </script>      
      <!-- jQuery library -->
      <script src="assets/js/jquery.min.js"></script>
      <!-- Popper JS -->
      <script src="assets/js/popper.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="assets/js/bootstrap.min.js"></script>
    </body>
</html>