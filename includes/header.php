<?php
    //initialize the session
    session_start();
?>

<nav class="navbar navbar-expand-sm bak navbar-light justify-content-left ">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="#" >
        <img src="assets/image_gou\GOUniversity_logo.jpg" alt="logo" style="width:100px; border-radius: 100%; float: left;">
    </a>
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" style="background: rgba(229, 229, 229, 0.6);">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
           <li class="nav-item">
              <a class="navbar-a nav-link" href="index.php">Home</a>
           </li>
           <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
              Academics & Classes
              </a>
              <div class="dropdown-menu">
                 <a class="dropdown-item" href="study_manager.php">Study Material</a>
              </div>
           </li>
           <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
              Chat
              </a>
              <div class="dropdown-menu">
                 <a class="dropdown-item" href="#">Lecturer</a>
                 <hr>
                 <a class="dropdown-item" href="#">Student</a>
              </div>
           </li>
           <li class="nav-item">
              <a class="nav-link" href="disccussion.php">Discussion</a>
           </li>
        </ul>
    </div>
    
    <?php
        if(isset($_SESSION["authenticated"])){
            echo '<div>
                    <a class="mx-2"> Welcome, '.$_SESSION["s_firstname"].'</a>
                    <a href="logout.php" type="button" class="btn btn-outline-danger mx-2">Logout</a>
                  </div>';
        }
    ?>
 </nav>