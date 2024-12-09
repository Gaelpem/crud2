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

    public function setNom($nom) : void 
    {
          $nom = strtolower($nom); 
            if(ctype_alpha($nom)){
                if(iconv_strlen($nom)>= 3 && iconv_strlen($nom)<= 20){
                    $this->nom = $nom; 
                }else{
                    echo self::ERROR_NOM ; 
                }
            }else{
                echo self::ERROR_NOM ; 
            }
          }


          public function setPrenom($prenom) : void 
    {
          $prenom = strtolower($prenom); 
            if(ctype_alpha($nom)){
                if(iconv_strlen($prenom)>= 3 && iconv_strlen($prenom)<= 20){
                    $this->prenom = $prenom; 
                }else{
                    echo self::ERROR_PRENOM; 
                }
            }else{
                echo self::ERROR_PRENOM ; 
            }
          }


          public function setEmail($email) : void 
          {
               $email = strtolower($email);
               if(filter_var($email,FILTER_DEFAULT)){
                $this->email = $email;
               }else{
                echo sef::ERROR_EMAIL; 
               }
          }
          
          public function setMdp($mdp) : void 
          {
            $mdp= strtolower($mdp);
            $caractereSpeciaux = "!?:%*$"; 
            $contientCaractereSpecial = false;
            //on decoupe chaque element pour les transformer en tableaux 
            foreach(str_split($caractereSpeciaux) as $caractere){
                //on verifie si le mdp contient au moins un caractere special 
                if(strpos($mdp, $caractere) !== false){
                    $contientCaractereSpecial = true;
                break; // On peut arrêter la boucle dès qu'on trouve un caractère spécial
                }
            }

            $this->mdp = $mdp;
       }
     
       public function getNom() {
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
            $user_name = trim($_POST["user_name"]); 
            $user_prenom = trim($_POST["user_prenom"]); 
            $user_email = trim($_POST["user_email"]); 
            $user_mdp = trim($_POST["user_mdp"]); 


         if(!empty($user_name) && !empty($user_prenom) && !empty($user_email) && !empty($user_mdp)){
            
            $utilisateur = new Utilisateur($user_name,$user_prenom,$user_email,$user_mdp); 
            
            // on sauvegarde les données de l'utilisateurs dans session
            $_SESSION["user_name"] = $utilisateur->getNom(); 
            $_SESSION["user_prenom"] = $utilisateur->getPrenom(); 
            $_SESSION["user_email"] = $utilisateur->getEmail(); 
            $_SESSION["user_mdp"] = $utilisateur->getMdp(); 
            // des que l'utilisateur a reussi à tout remplier le dirige dans une page 
            header("Location: index.php"); 
            exit; 

         }

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
<form action="<?= $_SERVER["PHP_SELF"]; ?>" method="post">
    <label for="">Nom</label>
    <input type="text" name="user_name" id="">

    <label for="">Prenom</label>
    <input type="text" name="user_prenom" id="">

    <label for="">Email</label>
    <input type="text" name="user_email" id="">

    
    <label for="">Mot de passe</label>
    <input type="password" name="user_mdp" id="">

    <button type="submit">Inscription</button>

</form>


    
</body>
</html>