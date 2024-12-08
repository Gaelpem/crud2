<?php
include 'session.php';
check_session(); //on vérifie si la personne a le droit d'accéder à cette page
require 'config.php'; //accès à la base de données

// si la personne est deja connectée elle sera dirigé à la page index.php; 
if(isset($_SESSION["user_name"])){
    header("Location: index.php"); 
    exit; 

    //connexion de la base de donne 
    $sql = "SELECT * FROM connexion "; 
    $stmt = $pdo->prepare($sql); 
     $stmt->execute();
}
class Utilisateur{
    const ERROR_NOM = "Nom incorrect";
    const ERROR_PRENOM = "Prenom incorrect";  
    const ERROR_EMAIL = "Email  incorrect"; 
    const ERROR_MDP = "Mot de passe  incorrect"; 

    
    private string $nom =""; 
    private string $prenom =""; 
    private string $email =""; 
    private string $mdp = ""; 

    public function __construct(string $nom, string $prenom, string $email, string $mdp){
        if($nom && $prenom && $email &&  $mdp){
            $this->setNom($nom);
            $this->setPrenom($prenom);  
            $this->setEmail($email); 
            $this->setMdp($mdp); 
        }
    }

    public function setNom($nom)
    {
          $nom = strtolower($nom); 
            if(ctype_alpha($nom)){
                if(iconv_strlen($nom)>= 3 && iconv_strlen($nom)<= 20){
                    $this->nom = $nom; 
                }else{
                    echo sel::ERROR_NOM ; 
                }
            }else{
                echo sel::ERROR_NOM ; 
            }
          }


          public function setPrenom($prenom)
    {
          $prenom = strtolower($prenom); 
            if(ctype_alpha($nom)){
                if(iconv_strlen($prenom)>= 3 && iconv_strlen($prenom)<= 20){
                    $this->prenom = $prenom; 
                }else{
                    echo sel::ERROR_PRENOM; 
                }
            }else{
                echo sel::ERROR_PRENOM ; 
            }
          }


          public function setEmail($email){
               $email = strtolower($email);
               if(filter_var($email,FILTER_DEFAULT)){
                $this->email = $email;
               }else{
                echo sef::ERROR_EMAIL; 
               }
          }
          
          public function setMdp($mdp){
            $mdp= strtolower($mdp);
            $caractereSpeciaux = "!?:%*$"; 
            $contientCaractereSpecial = false;
            //on decoupe chaque element pour les transformer en tableaux 
            foreach(str_split($caractereSpeciaux) as $caractere){
                //on verifie si le mdp contient au moins un caractere special 
                if(strpos($mdp, ) !== false){
                    $contientCaractereSpecial = true;
                break; // On peut arrêter la boucle dès qu'on trouve un caractère spécial
                }
            }

            $this->mdp = $mdp;
       }
     
       public function getNom(){
        return $this->nom ; 
       }
       public function getPrenom(){
        return $this->prenom; 
       }
       public function getEmail(){
        return $this->email ; 
       }
       public function getMdp(){
        return $this->mdp; 
       }


    }


    if($_SERVER["REQUEST_METHOD"] == "POST"){
         
        if (isset($_POST["user_name"], $_POST["user_prenom"], $_POST["user_email"], $_POST["user_mdp"])) {
            // Code à exécuter si les données POST existent
        }
        
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <label for="">Nom</label>
    <input type="text" name="user_name" id="">

    <label for="">Prenom</label>
    <input type="text" name="user_prenom" id="">

    <label for="">Email</label>
    <input type="text" name="user_email" id="">

    
    <label for="">Mot de passe</label>
    <input type="text" name="user_mdp" id="">

    <button type="submit">Inscription</button>

</form>


    
</body>
</html>