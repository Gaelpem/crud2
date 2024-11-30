<?php
include 'config.php';

if (isset($_POST['id'])) {
    $id = (int) $_POST['id'];
    $stmt = $pdo->prepare("DELETE FROM tache WHERE id = :id");
    $stmt->execute(['id' => $id]);
    header('Location: index.php');
    exit;
}
?>
