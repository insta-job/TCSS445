<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Let's Start Your Search Now</title>
    <link rel="stylesheet" href="css/search.css">
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>
<body>
  <div class = "box">
    <div class="wrap">
        <a href = 'index.php'><img src="img/logo.png"/></a>
        <h1>Insta's Job</h1>
    </div>
    <h2>Search</h1>
      <form method ="post" action = "search.php">
          <input type="text" name="description" placeholder="description">
        <input type="text" name="location" placeholder="location">
        <input type="submit" name="search" autocomplete="off">
      </form>
      <div class="container">
        <?php
        session_start();
        $db = mysqli_connect("localhost", "root", "","instajob");
        if (isset($_POST['search'])) {
          $description = mysqli_real_escape_string($db, $_POST['description']);
          $description =  str_replace(' ', '+', $description);

          $location = mysqli_real_escape_string($db, $_POST['location']);
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
          for ($x = 0; $x < $json_length; $x++) {
            $id_array[$x] = $json_data[$x]['id'];
            $type_array[$x] = $json_data[$x]['type'];
            $company_array[$x] = $json_data[$x]['company'];
            $location_array[$x] = $json_data[$x]['location'];
            $title_array[$x] = $json_data[$x]['title'];
            $description_array[$x] = $json_data[$x]['description'];
          }
          for ($x = 0; $x < $json_length; $x++) {
              echo "<form method = 'post' action = 'search.php'>
              <fieldset class='majorpoints'>
                      <legend class='majorpointslegend'>$title_array[$x]</legend>
                      <div class='hiders' style='display:none'>
                        <h3>Job Type: $type_array[$x]</h3>
                        <h3>Company: $company_array[$x]</h3>
                        <h3>Location: $location_array[$x]</h3>
                        <h3>Job Id: $id_array[$x]</h3>
                        <div>Description: $description_array[$x]</div>
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
                  $_SESSION['id_array'] = $id_array;
                  $_SESSION['type_array'] = $type_array;
                  $_SESSION['company_array'] = $company_array;
                  $_SESSION['location_array'] = $location_array;
                  $_SESSION['title_array'] = $title_array;
                  $_SESSION['description_array'] = $description_array;

        }
        if (isset($_POST['add'])) {
          $index = $_POST['add'];
          $id_array = $_SESSION['id_array'];
          $type_array = $_SESSION['type_array'];
          $company_array = $_SESSION['company_array'];
          $location_array =   $_SESSION['location_array'];
          $title_array = $_SESSION['title_array'];
          $description_array = $_SESSION['description_array'];
          $sql = "INSERT INTO COMPANY (Job_Id, CName, Location)
          VALUES('$id_array[$index]', '$company_array[$index]', '$location_array[$index]')";
          mysqli_query($db, $sql);
        }

      ?>
      </div>

  </div>

</body>
</html>
