  <?php
    $db = mysqli_connect("localhost", "root", "","instajob");
    session_start();
    session_unset();
    header('location: index.php'); //redirect to home page
  ?>
