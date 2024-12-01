<?php
require_once'config.php';  // Inclusion de la configuration pour la connexion à la base de données


if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["title"])){
    $title = trim($_POST["title"]);     

    if(!empty($title)){  
    // preparation d'une nouvelle requete pour insert une nouvelle tache et faire rentrer cette tache à la base de donne
    $stmt = $pdo->prepare("INSERT INTO tache (title, is_completed) VALUE (:title, 1)"); 
    // 
    $stmt->execute(['title'=> $title]); 


    header('Location:index.php'); 
    exit; 
}else{
    echo "champ obligatoire"; 
}
}

?>

<form action="create-tache.php" method="post">
    <input type="text" name="title" placeholder="Nouvelle tache">
    <button type="submit">Ajouter</button>
</form>