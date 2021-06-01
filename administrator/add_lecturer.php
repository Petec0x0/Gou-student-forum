<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin  Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <!--##############################-->
       <?php
            include('processes.include.php');
            
            // redirect the user to the login page if not authenticated
            if(!(isset($_SESSION["admin_authenticated"]) &&  
                $_SESSION["admin_authenticated"] === true)){
            	// redirect the user to the login page with a success message
                $message = 'Access denied <br> Login to continue.';
                Header("Location: index.php?message=".$message."&category=danger");
            	exit;
            }
        ?>
     <!--##############################-->

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">GCSF Admin </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="student.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Student</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="staff.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Staff</span></a>
            </li>
            
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="add_lecturer.php">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Add Staff</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["s_name"];?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Add Lecturer</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class=" container-fluid mt-4 col-sm-12">
                           <form role="form" method="post" action="" enctype="multipart/form-data">
                               <div class="row">
                                   <div class="col-sm-4"></div>
                                   <div class="col-sm-4">
                                       <div class="text-center">
                                          <img id="uploadPreview" src="../assets/image_gou\index.png" class="img-responsive img-thumbnail"
                                             style="max-width: 100px;max-height: 100px;width: 100px; height: 100px;">
                                          <input id="uploadImage" class="form-control" type="file" name="filename" id="filename" onchange="PreviewImage();">
                                          <p><span class="text-danger"> <?php echo $image_err;?></span></p>
                                       </div>
                                   </div>
                                   <div class="col-sm-4"></div>
                               </div>
                              <div class="form-group">
                                 <div class="row">
                                    <div class="col-sm-6">
                                       <label for="firstname">Firstname</label><span class="text-danger"> *<?php echo $firstname_err;?></span>
                                       <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter Firstname" style="border-radius:12px;" required>
                                    </div>
                                    <div class="col-sm-6">
                                       <label for="lastname"></span>Lastname</label><span class="text-danger"> *<?php echo $lastname_err;?></span>
                                       <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Lastname" style="border-radius:12px;" required>
                                    </div>
                                    <br>
                                    <div class="col-sm-12 mt-4">
                                       <label for="email">Email</label><span class="text-danger"> *<?php echo $email_err;?></span>
                                       <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" style="border-radius:12px;" required>
                                    </div>
                                    <br>
                                    <div class="col-sm-6 mt-4">
                                       <label for="phone_no">Phone_No</label><span class="text-danger"> *<?php echo $phone_no_err;?></span>
                                       <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="" style="border-radius:12px;" required>
                                    </div>
                                    <div class="col-sm-6 mt-4">
                                       <label for="password">Password</label><span class="text-danger"> *<?php echo $password_err;?></span>
                                       <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" style="border-radius:12px;" required>
                                    </div>
                                    <div class="col-sm-6 mt-4">
                                       <label for="confirm_password">Comfirm Password</label>
                                       <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Comfirm password" style="border-radius:12px;" required>
                                    </div>
                                    <br><br><br><br>
                                    <div class="col-sm-12 text-center mt-4">
                                       <button type="submit" name="add-lecturer" class="btn btn-primary" style="border-radius:50px;">Add Lecturer</button>
                                    </div>
                                 </div>
                           </div>
                           </form>
                        </div>
                        
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
         function PreviewImage() {
             var oFReader = new FileReader();
             oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
         
             oFReader.onload = function (oFEvent) {
                 document.getElementById("uploadPreview").src = oFEvent.target.result;
             };
         };
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>