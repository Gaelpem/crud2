<?php
require_once'config.php'; 

if(isset($_GET["id"])){
$id = (int)$_GET["id"]; 
$stmt = $pdo->prepare("DELETE FROM tache WHERE id = :id ");
$stmt->execute(['id' => $id]); 
header('Location:index.php'); 
exit; 


}
?>
<a href="delete-tache.php?id=<?= $tache['id']; ?>">Supprimer</a>
