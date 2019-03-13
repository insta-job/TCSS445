
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
        $_SESSION['email'] = $userprofile;
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
        <a class="nav-link" href="table.php">
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

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Managing Job</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Editing the job that you post</div>
                    </div>
                    <div class="col-auto">
                      <i class="far fa-file-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Credibility</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Help you find the best software engineer</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-code fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Contact Candidate</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">

              <div class="card shadow mb-4">

                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Upload company, department, location you work for</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <form action = "dashboard.php" method = "post">
                    <label><b>Input your Company</b></label>
                    <input type = "text" name = "company">
                    <br>
                    <label><b>Input your Company Location</b></label>
                    <input type = "text" name = "location">
                    <br>
                    <label><b>Input your Department</b></label>
                    <input type = "text" name = "department">
                    <br>
                    <input type = "submit" name = "submit">
                  </form>
                </div>
              </div>
            </div>
            <?php
                $db = mysqli_connect("localhost", "root", "","instajob");
                if (isset($_POST['submit'])) {
                  $company_name = $_POST['company'];
                  $location = $_POST['location'];
                  $department_name = $_POST['department'];
                  $id = $_SESSION['Id'];
                  $sql = "INSERT INTO Recruiter(Id, Company_Name, Company_Location, Department)
                  VALUES('$id', '$company_name', '$location', '$department_name')";
                  mysqli_query($db, $sql);
                }
                mysqli_close($db);
             ?>
            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Upload a new job</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <form action="addnewjob.php" method = "post" name = "input">
                    <label><b>Job Title</b></label>
                    <input type = "text" name = "title">
                    <br>
                    <label><b>Description</b></label>
                    <textarea name="description" cols = "56" rows = "5">
                    </textarea>
                    <label><b>Salary</b></label>
                    <input type = "text" name = "salary">
                    <br>
                    <label><b>Location</b></label>
                    <input type = "text" name = "location">
                    <br>
                      <input type="submit" name = "submit" value = "add">
                    </form>
                </div>
              </div>
            </div>
          </div>




            <div class="col-lg-6 mb-4">

              <!-- Illu strations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Candidate Information</h6>
                </div>
                <div class="card-body">

                  <?php
                      $db = mysqli_connect("localhost", "root", "","instajob");
                      $sql = "SELECT * FROM users WHERE user_type = 'candidate'";
                      if ($result=mysqli_query($db,$sql)) {
                        while($row = mysqli_fetch_assoc($result)) {
                            $id = $row['Id'];
                            $fName = $row['FName'];
                            $lName = $row['LName'];
                            $gender = $row['Gender'];
                            $email = $row['Email'];
                            $phone = $row['Phone'];
                            echo "<div class='table-responsive'>
                            <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                            <thead>
                              <tr>
                                <th>User ID</th>
                                <th>FName</th>
                                <th>LName</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Phone</th>
                              </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>$id</th>
                                <th>$fName</th>
                                <th>$lName</th>
                                  <th>$gender</th>
                                    <th>$email</th>
                                      <th>$phone</th>
                            </tr>
                            </tbody>
                            <tfoot>
                              <tr>
                                <td>User ID</td>
                                <td>FName</td>
                                <td>LName</td>
                                <td>Gender</td>
                                <td>Email</td>
                                <td>Phone</td>
                                </tr>
                                </tfoot>
                            </table>
                            </div>";
                        }
                      }
                   ?>
                </div>
              </div>

              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Candidate Skills and Resume</h6>
                </div>
                <div class="card-body">
                  <?php
                  $db = mysqli_connect("localhost", "root", "","instajob");
                  $id = $_SESSION['id'];
                  $sql = "SELECT * FROM Resume WHERE Id = '$id'";
                  if ($result=mysqli_query($db,$sql)) {
                    while($row = mysqli_fetch_assoc($result)) {
                      $skill = $row['Skills'];
                      $resume = $row['Resume_path'];

                      echo "<div class='table-responsive'>
                      <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                      <thead>
                        <tr>
                          <th>User's Skills</th>
                          <th>Resume (Click the link to download)</th>

                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                          <th>$skill</th>
                          <th><a href = '$resume'>Resume</a></th>
                      </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                          <td>User ID</td>
                          <td>FName</td>
                          </tr>
                          </tfoot>
                      </table>
                      </div>";
                    }
                  }
                   ?>
                </div>
              </div>

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
