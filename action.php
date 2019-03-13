<?php
//action.php
$db = mysqli_connect("localhost", "root", "","instajob");

$input = filter_input_array(INPUT_POST);
$title = mysqli_real_escape_string($db, $input["Title"]);
$description = mysqli_real_escape_string($db, $input["Description"]);
$salary = mysqli_real_escape_string($db, $input["Salary"]);
$company = mysqli_real_escape_string($db, $input["CName"]);
$location =  mysqli_real_escape_string($db, $input["Location"]);

if($input["action"] === 'edit')
{
   $query = "
   UPDATE job
   SET Title = '".$title."',
   Description = '".$description."',
   Salary = '".$salary."'
   WHERE Job_ID = '".$input["Job_ID"]."'
   ";
   mysqli_query($db, $query); 
}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM job
 WHERE Job_ID = '".$input["Job_ID"]."'
 ";
 mysqli_query($db, $query);
}

echo json_encode($input);

?>
