<?php
session_start();
$db = mysqli_connect("localhost", "root", "","instajob");
 if (isset($_POST['login_btn'])) {
   $email = $_POST['email'];
   $password = $_POST['password'];
   $query = "SELECT *   FROM users WHERE Email = '$email' AND Repassword = '$password'";
   mysqli_query($db , 'SET NAMES utf8');
   $result = mysqli_query($db, $query);
   $count = mysqli_num_rows($result);
   if ($count == 1) {
     echo "successfully login";
     $_SESSION['email'] = $email;
     while($row = mysqli_fetch_assoc($result)) {
          if ($row['Email'] == $email && $row['Repassword'] == $password) {
            $usertype = $row['user_type'];
            break;
          }
       }
      $_SESSION['usertype'] = $usertype;
      header('location: index.php'); //redirect to home page
   } else {
     echo '<script language="javascript">';
     echo 'alert("Password or username is not corrected!")';
    echo '</script>';
   }
 }
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
</head>
<body>
  <div class="login">
    <img src="img/user.png" class="user">
    <h2>Login Here</h2>
  <form method ="post" action = "login.php">
     <p>User Name</p>
          <input type="text" name="email" placeholder="Email">
          <p>Password</p>
          <input type="password" name="password" placeholder="Password">
          <input type="submit" name="login_btn" autocomplete="off" value="Sign in">
          <a href="forget.php">Forget Password</a>
      </form>
  </div>
</body>
</html>
