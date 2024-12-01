<?php
include 'session.php';
check_session();
require_once 'config.php';


$sql = "SELECT * FROM tache"; 
$stmt = $pdo->prepare($sql); 
$stmt->execute(); 
$taches = $stmt->fetchAll(); 

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
      <?php include 'create-tache.php'?>
    
      <ul class="parent">
      <?php foreach($taches as $tache): ?>
        <li>
            <?= htmlspecialchars($tache['title']);?>
            <?php include 'delete-tache.php'?>
        </li>
        <?php endforeach; ?>
      </ul>
</div> 
</body>
</html>
