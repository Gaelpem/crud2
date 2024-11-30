<?php

// cette partie permet à ce connecter à la base de donner .
const DB_HOST = 'localhost';
const DB_NAME = 'To-do-list';
const DB_USER = 'root';
const DB_PASS = 'root';


try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

 

?>
