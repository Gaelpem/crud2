<?php
require_once'config.php';  // Inclusion de la configuration pour la connexion à la base de données

if ($_SERVER['REQUEST_METHOD'] === 'POST') {  // Vérifie si le formulaire a été soumis via POST
    $title = trim($_POST['title']);  // Récupère le titre soumis et enlève les espaces inutiles

    // Vérifie que le champ titre n'est pas vide
    if (!empty($title)) {
        // Prépare la requête SQL pour insérer la nouvelle tâche dans la table 'tache'
        $stmt = $pdo->prepare("INSERT INTO tache (title, is_completed) VALUES (:title, 0)");
        
        // Exécute la requête en passant le titre comme paramètre
        $stmt->execute(['title' => $title]);

        // Redirige l'utilisateur vers la page d'index après l'ajout de la tâche
        header('Location: index.php');
        exit;  // On termine le script ici pour éviter l'exécution d'autres codes après la redirection
    } else {
        // Si le champ titre est vide, on affiche un message d'erreur
        echo "Le champ titre est obligatoire.";
    }
}
?>

<!-- Formulaire HTML pour ajouter une nouvelle tâche -->
<form action="create-tache.php" method="post">
    <input type="text" name="title" placeholder="Nouvelle tâche" required>  <!-- Le champ 'required' rend ce champ obligatoire -->
    <button type="submit">Ajouter</button>
</form>
