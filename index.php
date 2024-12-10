<?php
include "session.php";
 
if(!isset($_SESSION["user_name"])){
    header("Location: login.php");
    exit; 
}

if(isset($_POST["logout"])){
    session_destroy(); 
    header("Location: inscription.php"); 
    exit; 
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenue !</h1>
    <p>
        Vous êtes connectés tant que 
      
    <?php 
     echo $_SESSION["user_name"]; 
    ?>

     </p>
    <form action="" method="post">
    <button type="submit" name="logout">Deconnexion</button>
    </form>
    
</body>
</html>