<?php
include 'session.php';
check_session();
include 'config.php';

// Récupération des tâches
$sql = "SELECT * FROM tache "; // la requete 
$stmt = $pdo->prepare($sql); // on  prepare la requete pour qu'elle s'excute
$stmt->execute(); // on execute la requete
$taches = $stmt->fetchAll(); // on affiche toute la requete fetchAll()

echo "<pre>"; 
print_r($taches); 
echo "</pre>"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>To-Do List</h1>

    <!-- Formulaire pour ajouter une tâche -->
    <form action="create-tache.php" method="post">
        <input type="text" name="title" placeholder="Ajouter une tâche">
        <button type="submit">Ajouter</button>
    </form>

    <!-- Liste des tâches -->
    <ul>
        <?php foreach ($taches as $tache): ?>
            <li>
                <?= htmlspecialchars($tache['title']); ?>
                <a href="delete-tache.php?id=<?= $tache['id']; ?>">Supprimer</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
