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
				include('includes/config.php');
				
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
         <div class="container mt-4" style="background-color: white;">
            <div class="board row" style="width: 100%; min-height: 450px;">
               <div class="col-sm-6 mt-2" style="max-height: 450px; overflow-y: scroll;">
					<?php
					    $current_user = $_SESSION["s_user_id"];
						// fetch all discussion from the database using the SELECT statement
						$sql = "SELECT * FROM lecturer WHERE id <> '$current_user'";
						$result = mysqli_query($conn, $sql);
						// iterate through the fetched result and display it
						while($row = mysqli_fetch_array($result)) {
							echo '<div id="user_'.$row['id'].'" class="row jumbotron mx-2" style="padding: 5px;" 
									onclick="showActiveChat(
											{image_path:\''.$row['image'].'\',name:\''.$row['firstname'].' '.$row['lastname'].'\',user_id:'.$row['id'].'},
											'.$current_user.'
								  )">
									<div class="col-sm-2"  style="max-width: 60px;">
										<img src="'.$row['image'].'" class="img-responsive rounded-circle"
											 style="max-width: 50px ; max-height: 50px;width: 50px; height: 50px;">
									</div>
									<div class="col-sm-8">
										<small><a href="#">'.$row['firstname'].' '.$row['lastname'].'</a></small><br>
										<small><i>Lecturer</i></small>
									</div>
									<div class="col-sm-2">
									    <i class="bi bi-chat-fill fa-2x" style="color: #007bff;"></i>
									</div>
								</div>';
						}   
					?>
					
					
			   </div>
			   <div id="activeChat" class="col-sm-6">
					<div class="container-fluid">
						<div class="card bg-primary text-white">
							<div class="card-body row" style="padding: 3px">
								<div class="col-sm-2"  style="max-width: 60px;">
									<img id="activeChatPic" src="assets/image_gou/index.png" class="img-responsive rounded-circle"
										 style="max-width: 50px ; max-height: 50px;width: 50px; height: 50px;">
								</div>
								<div class="col-sm-8">
									<small id="activeChatName">DuMmY nAmE</small>
								</div>
							</div>
						</div>
						
						<!--The container/element for displaying the message history-->
						<div id="chatHistory" class="msg_history"></div>
						
						<div class="position-bottom">
							<div class="row">
								<div class="col-sm-10" style="padding-right: 0px; padding-bottom: 0px;">
									<!-- Auto-Growing and Expandable Input -->
								   <span id="messageBox" class="textarea" role="textbox" contenteditable></span>
								</div>
								<div class="col-sm-2" style="padding: 0px">
									<i class="btn btn-primary" style="border-radius:12px;" onclick="sendMessage(<?php echo $current_user; ?>)">Send</i>
								</div>
							</div>
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
	  <!-- Chat JS Code -->
      <script src="assets/js/chat.js"></script>
    </body>
</html>