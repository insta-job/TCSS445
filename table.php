
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Welcome
          <span   class="text-danger" id = "name"></span>
        </div>
      </a>
      <?php
        session_start();
        $db = mysqli_connect("localhost", "root", "","instajob");
        $userprofile = $_SESSION['email'];
        $query = "SELECT * FROM users WHERE Email = '$userprofile'";
        $result = mysqli_query($db, $query);
        $count = mysqli_num_rows($result);
        $fName;
        $lName;
          if ($count == 1) {
          while($row = mysqli_fetch_assoc($result)) {
               if ($row['Email'] == $userprofile) {
                 $fName = $row['FName'];
                 $lName = $row['LName'];
                 $id = $row['Id'];
                 $_SESSION['Id'] = $id;
                 echo "<script type = 'text/javascript'>
                 document.getElementById('name').innerHTML=' $fName $lName';
                 </script>";
                 break;
               }
            }
        }
        mysqli_close($db);
      ?>
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

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="tables.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>


            <!-- Nav Item - Tables -->
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <i class="fas fa-home"></i>
                <span>Home</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">
                  <i class="fas fa-code"></i>
                  <span>About Us</span></a>
            </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

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

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <span class="mr-2 d-none d-lg-inline text-gray-600 small" id = "welcome"></span>
                <img class="img-profile rounded-circle" src="img/user.png">
              </a>
              <!-- Dropdown - User Information -->

            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>


                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Table for all the job that you have added</h6>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <?php
                              $db = mysqli_connect("localhost", "root", "","instajob");
                              $sql = "SELECT * FROM Job";
                              if ($result=mysqli_query($db,$sql)) {
                                // Return the number of rows in result set
                                  $rowcount=mysqli_num_rows($result);
                                  while($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['Job_ID'];
                                    $title = $row['Title'];
                                    $description = $row['Description'];
                                    $salary = $row['Salary'];
                                    echo "<div class='table-responsive'>
                                    <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                                    <thead>
                                      <tr>
                                        <th>Job_ID</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Salary</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>$id</th>
                                          <th>$title</th>
                                            <th>$description</th>
                                              <th>$salary</th>
                                    </tr>
                                    </tbody>
                                    </table>
                                    </div>";
                                  }
                                }
                           ?>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <script src="js/welcome.js"></script>
</body>

</html>
