
  <!DOCTYPE html>
  <html lang="en">

    <head>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">

      <title>Insta Job</title>

      <!-- Bootstrap core CSS -->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

      <!-- Custom fonts for this template -->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
      <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

      <!-- Plugin CSS -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" rel="stylesheet">

      <!-- Custom styles for this template -->
      <link href="css/creative.min.css" rel="stylesheet">

    </head>

    <body id="page-top">
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
          <div class = "row">
            <p class="navbar-brand js-scroll-trigger" href="#page-top">Insta Job</p>
            <a><img src = "img/logo.png" height="42" width="42"></a>
          </div>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#portfolio">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="login.php" id ="login">Login</a>
              </li>
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="signup.php" id ="signup">Sign Up</a>
                </li>
                <?php
                  session_start();
                  $db = mysqli_connect("localhost", "root", "","instajob");
                  error_reporting(0);
                  $userprofile = $_SESSION['email'];
                  $usertype = $_SESSION['user_type'];
                  $_SESSION['user_type'] = $usertype;
                  if ($userprofile == true) {
                    echo '<li class="nav-item">
                          <a class="nav-link js-scroll-trigger" href="logout.php" id>Logout</a>
                        </li>';
                    if ($usertype == 'recruiter') {
                      echo '<li class="nav-item" idea>
                            <a class="nav-link js-scroll-trigger" href="search.php" id>search </a>
                          </li>';
                      echo '<li class="nav-item" idea>
                                <a class="nav-link js-scroll-trigger" href="dashboard.php" id>Dashboard</a>
                              </li>';
                    } else {
                      echo '<li class="nav-item" idea>
                                <a class="nav-link js-scroll-trigger" href="candidatedashboard.php" id>Dashboard</a>
                              </li>';
                              echo '<li class="nav-item" idea>
                                    <a class="nav-link js-scroll-trigger" href="search.php" id>search </a>
                                  </li>';
                    }

                    echo "<li class='nav-item'>
                            <a class='nav-link js-scroll-trigger' href='#' id>Welcome: $userprofile</a>
                          </li>";

                    echo '<script type="text/javascript ">
                            document.getElementById("login").outerHTML = "";
                            document.getElementById("signup").outerHTML = "";
                          </script>';
                  }
                  mysqli_close($db);
                ?>
            </ul>
          </div>
        </div>
      </nav>

      <header class="masthead text-center text-white d-flex">
        <div class="container my-auto">
          <div class="row">
            <div class="col-lg-10 mx-auto">
              <h1 class="text-uppercase">
                <strong>Your Favorite Job Search Enginee</strong>
              </h1>
              <hr>
            </div>
            <div class="col-lg-8 mx-auto">
              <p class="text-faded mb-5">Insta Job can help you find your dream job, just simple search it will yield all possible!</p>
              <a class="btn btn-primary btn-xl js-scroll-trigger" href="about.php">Find Out More About Us</a>
            </div>
          </div>
        </div>
      </header>

      <section class="bg-primary" id="about">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto text-center">
              <h2 class="section-heading text-white">We've got what you need</h2>
                <h2 class="section-heading text-white"> To land your dream job🤩🤩</h2>
              <hr class="light my-4">
              <p class="text-faded mb-4">Tired of limited results from job search enginee. Wish you could have
                more options than 10 or 100 jobs yield from search enginee. Looking to have more options
                so you can nail your dream job. Welcome to Insta Job, 1 click can yield you more jobs than
                you could anticipate, with one click you will have all results put in an organize database
                yield all the information you need such as location, benefit, qualification, salary, reviews, etc...
                Come and use our Insta Job and make it becomes your favorite job search enginee.
              </p>
              <a class="btn btn-light btn-xl js-scroll-trigger" href="signup.php">Get Started!</a>
            </div>
          </div>
        </div>
      </section>
      <!-- Services Section -->
      <section class="page-section" id="services">
        <div class="container">
          <h2 class="text-center mt-0">At Your Service</h2>
          <hr class="divider my-4">
          <div class="row">
            <div class="col-lg-3 col-md-6 text-center">
              <div class="mt-5">
                <i class="fas fa-4x fa-gem text-primary mb-4"></i>
                <h3 class="h4 mb-2">Sturdy Themes</h3>
                <p class="text-muted mb-0">Our themes are updated regularly to keep up with the market</p>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
              <div class="mt-5">
                <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
                <h3 class="h4 mb-2">Up to Date</h3>
                <p class="text-muted mb-0">Our website caught up with all the job that get published.</p>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
              <div class="mt-5">
                <i class="fas fa-4x fa-globe text-primary mb-4"></i>
                <h3 class="h4 mb-2">Ready to Go</h3>
                <p class="text-muted mb-0">You can use this to achieve your dream job!</p>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
              <div class="mt-5">
                <i class="fas fa-4x fa-heart text-primary mb-4"></i>
                <h3 class="h4 mb-2">Made with Love</h3>
                <p class="text-muted mb-0">Is it really helpful services if it's not made with love?</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="p-0" id="portfolio">
        <div class="container-fluid p-0">
          <div class="row no-gutters popup-gallery">
            <div class="col-lg-4 col-sm-6">
              <a class="portfolio-box" href="img/portfolio/fullsize/1.jpg">
                <img class="img-fluid" src="img/portfolio/thumbnails/1.jpg">
                <div class="portfolio-box-caption">
                  <div class="portfolio-box-caption-content">
                    <div class="project-category text-faded">
                      Ambition
                    </div>
                    <div class="project-name">
                      Always open to get hired!
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-4 col-sm-6">
              <a class="portfolio-box" href="img/portfolio/fullsize/2.jpg">
                <img class="img-fluid" src="img/portfolio/thumbnails/2.jpg">
                <div class="portfolio-box-caption">
                  <div class="portfolio-box-caption-content">
                    <div class="project-category text-faded">
                      Empression
                    </div>
                    <div class="project-name">
                      Multiple Resumes sent out but no result!
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-4 col-sm-6">
              <a class="portfolio-box" href="img/portfolio/fullsize/3.jpg">
                <img class="img-fluid" src="img/portfolio/thumbnails/3.jpg">
                <div class="portfolio-box-caption">
                  <div class="portfolio-box-caption-content">
                    <div class="project-category text-faded">
                      Dream Job
                    </div>
                    <div class="project-name">
                      Can't stop thinking about your dream job and stable income!
                    </div>
                  </div>
                </div>
              </a>
            </div>
      </section>

      <section class="page-section bg-dark text-white">
        <div class="container text-center">
          <h2 class="mb-4">Managing your account now</h2>
          <a class="btn btn-light btn-xl" href="login.php">Dashboard</a>
        </div>
      </section>

      <section id="contact">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto text-center">
              <h2 class="section-heading">Let's Get In Touch!</h2>
              <hr class="my-4">
              <p class="mb-5">Give us some feed back, how do you feel about our Insta Job, feel like
                you can help the team to improve it more. Give us a call or email us.
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 ml-auto text-center">
              <i class="fas fa-phone fa-3x mb-3 sr-contact-1"></i>
              <p>123-456-6789</p>
            </div>
            <div class="col-lg-4 mr-auto text-center">
              <i class="fas fa-envelope fa-3x mb-3 sr-contact-2"></i>
              <p>
                <a href="mailto:your-email@your-domain.com">feedback@InstaJob.com</a>
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- Bootstrap core JavaScript -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      <!-- Plugin JavaScript -->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
      <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>


    </body>

  </html>
