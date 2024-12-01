<?php
require_once'config.php';  // Inclusion de la configuration pour la connexion à la base de données


if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["title"])){
    $title = trim($_POST["title"]);     

    if(!empty($title)){  
    // preparation d'une nouvelle requete pour insert une nouvelle tache et faire rentrer cette tache à la base de donne
    $stmt = $pdo->prepare("INSERT TO tache (title, is_completed) VALUE (:title, 1)"); 
    // 
    $stmt = $pdo->execute(['title'=> $title]); 
    header('Location : index.php'); 
    exit; 
}else{
    echo "champ obligatoire"; 
}
}

?>

<form action="" method="post">
    <input type="text" name="title">
    <button type="submit">Ajouter</button>
</form>