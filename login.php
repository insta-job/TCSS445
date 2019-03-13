<?php
session_start();
$db = mysqli_connect("localhost", "root", "","instajob");
 if (isset($_POST['login_btn'])) {
   $email = $_POST['email'];
   $password = md5($_POST['password']);
   $query = "SELECT * FROM users WHERE Email = '$email' AND Password = '$password'";
   mysqli_query($db , 'SET NAMES utf8');
   $result = mysqli_query($db, $query);
   $count = mysqli_num_rows($result);
   if ($count == 1) {
     $_SESSION['email'] = $email;
     while($row = mysqli_fetch_assoc($result)) {
    if ($row['Email'] == $email && $row['Password'] == $password) {
       $usertype = $row['user_type'];
       break;
    }
       }
      $_SESSION['user_type'] = $usertype;
      $_SESSION['start'] = time(); // Taking now logged in time.
      // Ending a session in 30 minutes from the starting time.
      $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
      header('location: index.php'); //redirect to home page
    } else {
      echo '<script language="javascript">';
      echo 'alert("Password or username is not matching!!")';
     echo '</script>';

   }
 }
 mysqli_close($db);
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login your account</title>
  <link href="css/loginCss.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
  <div class="login">
    <img src="img/user.png" class="user">
    <h2>Login Here</h2>
  <form method ="post" action = "login.php">
     <p>User Name</p>
          <input type="text" name="email" placeholder="Email" id = "email">
          <p>Password</p>
          <input type="password" name="password" placeholder="Password" id = "password">
          <input type="submit" name="login_btn" autocomplete="off" value="Sign in">
          <a href="forget.php">Forget Password</a>
      </form>
  </div>

</body>
</html>
