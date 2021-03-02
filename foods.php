<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Food per cuisine</title>
</head>
<body>
<h1>Food</h1>

<?php
$cuisineId = $_POST['cuisineId'];
  //connect 
  $db = new PDO('mysql:host=172.31.22.43;dbname=Adam882094', 'Adam882094', '842ojmV_vQ');
  //set up the query retrieve the selected item using a bound parameter for safety
  $sql = "SELECT * FROM foods WHERE cuisineId = :cuisineId";
  $cmd = $db->prepare($sql);
  $cmd->bindParam(':cuisineId', $cuisineId, PDO::PARAM_INT);
  //exe the query and store the result using fetchall()
  $cmd->execute();
  $cuisines = $cmd->fetchall();
  //display food in table
  echo '<table><thead><th>Name</th></thead>';
  foreach ($cuisines as $c){
  echo '<tr><td>' . $c['name'] . '</td></tr>';
}
  

  $db = null;
?>
</body>
</html>