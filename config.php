<?php

const DB_HOST = "localhost"; 
const DB_NAME = "formulaire_contact"; 
const DB_USER = "root"; 
const DB_PASS = "root" ; 

try{
  $pdo = new PDO("mysql:host=". DB_HOST . ";dbname=".DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ; 
  }catch(Exception $e){
    die("Erreur de connexionavec la base de donne" . $e->getMessage()); 
}



?> 