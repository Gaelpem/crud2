<?php
include 'session.php';
check_session(); //on vérifie si la personne à le droit d'accéder à cette page
require 'config.php';


// Connexion à la base de données
$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);

// Récupérer les tâches
$stmt = $pdo->query("SELECT id,title,is_completed FROM tache");
$tache = $stmt->fetchAll(PDO::FETCH_ASSOC);







?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="title">
    <h1>To do list !</h1>
    </div>
<form action="">
<section class="tache">
   <label for="tache-1">Rangez la chambre.<input type="checkbox" name ="tache1" id="tache-1"></label>
   <label for="tache-2">Faire la vaisselle. <input type="checkbox" name ="tache2" id="tache-2"></label>
    <label for="tache-3">Sortir la poubelle. <input type="checkbox" name ="tache3" id="tache-3"></label>
    <button type="submit">Enregistrer</button>
</form>
</section>
    </div>
</body>
</html>
