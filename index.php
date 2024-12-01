<?php
include 'session.php';
check_session();
require_once 'config.php';


$sql = "SELECT * FROM tache"; 
$stmt = $pdo->prepare($sql); 
$tmt->execute(); 
$taches = $tmt->fetchAll(); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>To do list </h1>
      
</body>
</html>