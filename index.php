<?php
include 'session.php';
check_session(); //on vérifie si la personne à le droit d'accéder à cette page
require 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <h1>To do list !</h1>

    <section class = "tache">
        <label for="tache1"></label>
    </section>
    </div>
</body>
</html>
