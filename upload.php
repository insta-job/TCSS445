<?php
  $db = mysqli_connect("localhost", "root", "","instajob");
  if(isset($_FILES['file'])) {
    $file = $_FILES['file'];
    //FIle KTaglib_MPEG_AudioProperties
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];

    //Work out the file extension
    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));
    $allowed = array('doc', 'docx', 'pdf');
    if (in_array($file_ext, $allowed)) {
      if ($file_error === 0) {
        if ($file_size <= 2097152) {
          $file_name_new = uniqid('',TRUE) . '.' . $file_ext;
          $file_destination =  'upload/' . $file_name_new;
          mysqli_query($db, $query);
          if (move_uploaded_file($file_tmp, $file_destination)) {
              $file_destination = mysqli_real_escape_string($db, $file_destination);
              $id = $_SESSION['id'];
              $sql = "INSERT INTO resume (Id, Resume_path, Skills) VALUES ('$id', '$file_destination', '')";
              mysqli_query($db, $sql);
              echo "<script type = 'text/JavaScript'>
              document.getElementById('date').innerHTML = Date();
              </script>";
          }
        }
      }
    }
  }
  mysqli_close($db);
?>
