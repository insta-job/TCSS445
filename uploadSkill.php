<?php
  $db = mysqli_connect("localhost", "root", "","instajob");
  if(isset($_POST['submit'])) {
   $skills  = nl2br($_POST['skills']);
   echo $skills;
   echo "Your skills is : <br>";
   echo "<font color = blue><b>$skills</b></font>";
 }
?>
