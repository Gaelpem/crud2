<?php
session_start(); 
require_once"config.php"; 
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
<form action="" method="post">
    <label for="">Nom</label>
    <input type="text" name="user_name" id="">

    <label for="">Prenom</label>
    <input type="text" name="user_prenom" id="">

    <label for="">Email</label>
    <input type="text" name="user_email" id="">

    
    <label for="">Mot de passe</label>
    <input type="text" name="user_mdp" id="">

    <button type="submit">Inscription</button>

</form>


    
</body>
</html>