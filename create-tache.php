<?php
include 'config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    if (!empty($title)) {
        $stmt = $pdo->prepare("INSERT INTO tache (title, is_completed) VALUES (:title, 0)");
        $stmt->execute(['title' => $title]);
        header('Location: index.php');
        exit;
    } else {
        echo "Le champ titre est obligatoire.";
    }
}
?>

<form action="create-tache.php" method="post">
    <input type="text" name="title" placeholder="Nouvelle tâche">
    <button type="submit">Ajouter</button>
</form>

