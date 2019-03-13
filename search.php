<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Let's Start Your Search Now</title>
    <link rel="stylesheet" href="css/searchStyle.css">
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>
<body>
  <div id = "particles-js"></div>
  <div class = "box">
    <div class="wrap">
        <a href = 'index.php'><img src="img/logo.png"/></a>
        <h1>Insta's Job</h1>
    </div>
    <h2>Search</h2>
      <h2><a href = "index.php">Home</a></h2>
      <form method ="post" action = "search.php">
          <input type="text" name="description" placeholder="description" id = "description">
        <input type="text" name="location" placeholder="location" id = "location">
        <input type="submit" name="search" autocomplete="off">
      </form>
      <div class="container">
        <?php
        session_start();
        $db = mysqli_connect("localhost", "root", "","instajob");
        $usertype =  $_SESSION['user_type'];

        if (isset($_POST['search'])) {
          $description = mysqli_real_escape_string($db, $_POST['description']);
          $location = mysqli_real_escape_string($db, $_POST['location']);
          echo "<script type = 'text/javascript'>
                 document.getElementById('description').value = '$description';
                 document.getElementById('location').value = '$location';
               </script>";
          $description =  str_replace(' ', '+', $description);
          $location = str_replace(' ', '+', $location);
          $url = "https://jobs.github.com/positions.json?description=".$description."&location=".$location;
          $json = file_get_contents($url);
          $json_data = (array)json_decode($json, true);
          $json_length = count($json_data);
          $id_array = array();
          $type_array = array();
          $company_array = array();
          $location_array = array();
          $title_array = array();
          $description_array = array();
          $howtoapply_array = array();
          $companylogo_array = array();
          for ($x = 0; $x < $json_length; $x++) {
            $id_array[$x] = $json_data[$x]['id'];
            $type_array[$x] = $json_data[$x]['type'];
            $company_array[$x] = $json_data[$x]['company'];
            $location_array[$x] = $json_data[$x]['location'];
            $title_array[$x] = $json_data[$x]['title'];
            $description_array[$x] = $json_data[$x]['description'];
            $howtoapply_array[$x] = $json_data[$x]['how_to_apply'];
            $companylogo_array[$x] = $json_data[$x]['company_logo'];
          }

          for ($x = 0; $x < $json_length; $x++) {
              if($usertype == 'recruiter') {
                echo "<form method = 'post' action = 'search.php'>
                <fieldset class='majorpoints'>
                        <legend class='majorpointslegend' id = 'title'>$title_array[$x]<img src ='$companylogo_array[$x]' id = 'logo'></legend>
                        <div class='hiders' style='display:none'>
                          <h3>Job Type: $type_array[$x]</h3>
                          <h3>Company: $company_array[$x]</h3>
                          <h3>Location: $location_array[$x]</h3>
                          <h3>Job Id: $id_array[$x]</h3>
                          <div>Description: $description_array[$x]</div>
                          <p>$howtoapply_array[$x]</p>
                          </div>
                        <button type='submit' name='add' value = '$x'>Add</button>
                        <br><br>
                      </fieldset>
                    </form>";
              }
              if ($usertype == 'candidate') {
                echo "<form method = 'post' action = 'search.php'>
                <fieldset class='majorpoints'>
                        <legend class='majorpointslegend' id = 'title'>$title_array[$x]<img src ='$companylogo_array[$x]' id = 'logo'></legend>
                        <div class='hiders' style='display:none'>
                          <h3>Job Type: $type_array[$x]</h3>
                          <h3>Company: $company_array[$x]</h3>
                          <h3>Location: $location_array[$x]</h3>
                          <h3>Job Id: $id_array[$x]</h3>
                          <div>Description: $description_array[$x]</div>
                          <p>$howtoapply_array[$x]</p>
                          </div>
                      </fieldset>
                    </form>";
              }
            }
              echo "<script type = 'text/javascript'>
                  $(document).ready(function(){
                      $('.majorpoints').click(function(){
                          $(this).find('.hiders').toggle();
                      });
                  });
                    </script>";
                  $_SESSION['id_array'] = $id_array;
                  $_SESSION['type_array'] = $type_array;
                  $_SESSION['company_array'] = $company_array;
                  $_SESSION['location_array'] = $location_array;
                  $_SESSION['title_array'] = $title_array;
                  $_SESSION['description_array'] = $description_array;
                  $_SESSION['how_to_apply'] = $howtoapply_array;
                  $_SESSION['companylogo_array'] = $companylogo_array;
                  $_SESSION['description'] = $description;
                  $_SESSION['location'] = $location;
        }
        if (isset($_POST['add'])) {
          $index = $_POST['add'];
          $id_array = $_SESSION['id_array'];
          $type_array = $_SESSION['type_array'];
          $company_array = $_SESSION['company_array'];
          $location_array =   $_SESSION['location_array'];
          $title_array = $_SESSION['title_array'];
          $description_array = $_SESSION['description_array'];
          $howtoapply_array = $_SESSION['how_to_apply'];
          $companylogo_array = $_SESSION['companylogo_array'];
          $description = $_SESSION['description'];
          $location = $_SESSION['location'];
          $description = str_replace('+', ' ', $description);
          $location = str_replace('+', ' ', $location);
          $salary = 70000;
          $length = count($id_array);
          $temp_array = array();
          $count = 0;
          echo "<script type = 'text/javascript'>
                 document.getElementById('description').value = '$description';
                 document.getElementById('location').value = '$location';
               </script>";
          for ($x = 0; $x < $length; $x++) {
              echo "<form method = 'post' action = 'search.php'>
              <fieldset class='majorpoints'>
                      <legend class='majorpointslegend' id = 'title'>$title_array[$x]<img src ='$companylogo_array[$x]' id = 'logo'></legend>
                      <div class='hiders' style='display:none'>
                        <h3>Job Type: $type_array[$x]</h3>
                        <h3>Company: $company_array[$x]</h3>
                        <h3>Location: $location_array[$x]</h3>
                        <h3>Job Id: $id_array[$x]</h3>
                        <div>Description: $description_array[$x]</div>
                        <p>$howtoapply_array[$x]</p>
                        </div>
                      <button type='submit' name='add' value = '$x'>Add</button>
                    </fieldset>
                  </form>";

            }
              echo "<script type = 'text/javascript'>
                  $(document).ready(function(){
                      $('.majorpoints').click(function(){
                          $(this).find('.hiders').toggle();
                      });
                  });
                    </script>";
          $count++;
          $_SESSION['description'] = $temp_array;
          $query = "SELECT * FROM recruiter";
          if ($result= mysqli_query($db, $query)) {
            while($row = mysqli_fetch_assoc($result)) {
                $company_name = $row['Company_Name'];
                $_SESSION['Company_Name'] = $company_name;
            }
          }

          $query = "SELECT * FROM recruiter";
          if ($result = mysqli_query($db, $query)) {
            while($row = mysqli_fetch_assoc($result)) {
              $name = $row['Company_Name'];
              $_SESSION['Company_Name'] = $name;
              break;
            }
          }
          $cn = $_SESSION['Company_Name'];
          if ($cn == $company_array[$index]) {
            $sql = "INSERT INTO Company(Job_ID, CName, Location)
            VALUES('$id_array[$index]', '$company_array[$index]', '$location_array[$index]')" ;
            mysqli_query($db, $sql);
            $text = $description_array[$index];
            $text = mysqli_real_escape_string($db, $text);
            $sql1 = "INSERT INTO job(Job_ID, TItle, Description, Salary)
            VALUES('$id_array[$index]', '$title_array[$index]', '$text', '$salary')" ;
            mysqli_query($db, $sql1);
          }
        }
        mysqli_close($db);
      ?>
      </div>

  </div>
  <script type = "text/javascript" src = "particles.js"></script>
  <script type = "text/javascript" src = "test1.js"></script>
</body>
</html>
