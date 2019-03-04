  <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login your account</title>
  <link href="css/forgetCss.css" rel="stylesheet">
</head>
<body>
  <div class="login">
    <img src="img/lock.png" class="user">
    <h2>Forget your password</h2>
  <form method ="post" action = "forget.php">
     <p>Email</p>
          <input type="text" name="email" placeholder="Email">
          <input type="submit" name="submit" autocomplete="off" value="submit">
  </form>
  </div>
  <?php
    require('PHPMailerAutoload.php');
    require('credential.php');
    session_start();
    $db = mysqli_connect("localhost", "root", "","instajob");
    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($db, $_POST['email']);
        echo $email;
        $sql = "SELECT * FROM users WHERE Email = '$email' ";
        $email_check =mysqli_query($db, $sql);
        $count = mysqli_num_rows($email_check);
        if ($count == 1) {
          $random = rand(72891, 92729);
          $new_password = $random;
          $email_password = $new_password;
          echo $email_password;
          mysqli_query($db, "UPDATE users SET Password = '$new_password', Repassword = '$new_password'");
          $mail = new PHPMailer;
          //$mail->SMTPDebug = 3;                               // Enable verbose debug output
          $mail->isSMTP();                                      // Set mailer to use SMTP
          $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
          $mail->SMTPAuth = true;                               // Enable SMTP authentication
          $mail->Username = EMAIL;                 // SMTP username
          $mail->Password = PASS;                           // SMTP password
          $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
          $mail->Port = 587;                                    // TCP port to connect to                          // TCP port to connect to
          $mail->setFrom(EMAIL, 'Instajob');
          $mail->addAddress($email);     // Add a recipient
          $mail->addReplyTo(EMAIL);
          //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = 'Login Information has changed';
          $mail->Body = "Your new password is: <b>'$email_password</b>'";
          $mail->AltBody = 'Your paassword has been successfully updated  ';
          if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
          } else {
            header('location: login.php'); //redirect to home page
          }
        }
    }
    mysqli_close($db);
  ?>
</body>
</html>
