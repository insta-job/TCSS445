<?php
    session_start();
    $db = mysqli_connect("localhost", "root", "","instajob");
    if (isset($_POST['submit'])) {
      $title = $_POST['title'];
      $description = nl2br($_POST['description']);
      $salary = $_POST['salary'];
      $id = $_SESSION['Id'];
      $company_location = $_POST['location'];
      $sql = "SELECT * FROM recruiter WHERE Id = '$id'";
      if ($result = mysqli_query($db, $sql))  {
        while($row = mysqli_fetch_assoc($result)) {
          $company_name = $row['Company_Name'];
          $location = $row['Company_Location'];
          $_SESSION['Company_Name'] = $company_name;
        }
      }
      $name = $_SESSION['Company_Name'];
      $id = md5(uniqid(rand(), true));
      $sql1 = "INSERT INTO  company(Job_ID, CName, Location) VALUES ('$id', '$name', '$company_location')";
      if ($result1 = mysqli_query($db, $sql1)) {
        $sql2 = "SELECT * FROM company WHERE CName = '$name' AND Location = '$company_location'";
        if ($result2 = mysqli_query($db, $sql2)) {
          while($row = mysqli_fetch_assoc($result2)) {
            $job_id = $row['Job_ID'];
            if ($row['CName'] == $name && $row['Location'] == $company_location) {
                $job_id = $row['Job_ID'];
                $_SESSION['Job_ID'] = $job_id;
                break;
            }
          }
        }
        $job_id = $_SESSION['Job_ID'];
        $sql3 = "INSERT INTO job(Job_ID, Title, Description, Salary) VALUES ('$job_id', '$title', '$description', '$salary')";
        if ($result3 = mysqli_query($db, $sql3)) {
          header('location: dashboard.php'); //redirect to home page
        }
      }
    }
    mysqli_close($db);
 ?>
