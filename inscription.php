<?php
include 'session.php';
check_session(); //on vérifie si la personne a le droit d'accéder à cette page
require_once'config.php'; //accès à la base de données

// si la personne est deja connectée elle sera dirigé à la page index.php; 
if(isset($SESSION["user_name"])){
    header("Locaaton: index;php"); 
    exit; 
}
class Utilisateur{

    const ERROR_NOM = "Nom incorrect"; 
    const ERROR_PRENOM = "Prenom  incorrect"; 
    const ERROR_EMAIL = "Email incorrect"; 
    const ERROR_MDP = "Mot de passe incorrect";

    private string  $nom = ""; 
    private string $prenom = "";
    private string $email = ""; 
    private string $mdp =""; 

    public function __construct(string $nom, string $prenom, string $email, string $mdp){
        if(!empty($nom) && !empty($prenom) && !empty($email) && !empty($mdp)){
            $this->setNom($nom); 
            $this->setPrenom($nom); 
            $this->setEmail($nom); 
            $this->setMdp($nom); 
        }

    }

    public function setNom( string $nom) : void {
                  $nom = strtolower($nom); 
                  
                  if(ctype_alpha($nom)){
                    if(iconv_strlen($nom)>=3 &&  iconv_strlen($nom)<=22){
                        $this->nom = $nom; 
                    }else{
                        throw new Exception(self::ERROR_NOM);
                    }
                  }
    }
    public function setPrenom( string $prenom) : void {
        $nom = strtolower($prenom); 
        
        if(ctype_alpha($prenom)){
          if(iconv_strlen($prenom)>=3 &&  iconv_strlen($prenom)<=22){
              $this->prenom = $prenom; 
          }else{
              throw new Exception(self::ERROR_PRENOM);
          }
        }
}
    
        public function setEmail($email){

                $email = strtolower($email);
                if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                      $this->email = $eamil; 
                }else{
                    throw new Exception(self::ERROR_EMAIL); 
                }
        }

        public function setMdp($mdp){
                 
                $caracteresSpeciaux = "?!+$%:="; 
                $caractereSpe = false ; 
                
                foreach(str_slplit($caracteresSpeciaux) as $caractere){
                    if(strpos($mdp, $caractere) !== false){
                        $caractereSpe = true ; 
                    }else{
                        throw new Exception(self::ERROR_MDP);
                    }

                    if(strlen($mdp) > 10 && preg_match('/[A-Za-z]', $mdp) && preg_match('/[0-9]/', $mdp) && $caractereSpe){
                        $this->mdp = password_hash($mdp, PASSWORD_BCRYPT); 
                    }else{
                        throw new Exception(self::ERROR_MDP); 
                    }
                }
              
                $this->mdp = $mdp; 

        }


        public function getNom() : string {
            $this->nom; 
        }
        public function gePrenom() : string {
            $this->prenom; 
        }
        public function getEmail() : string {
            $this->email;  
        }

        public function getMdp() : string {
            $this->mdp; 
        }

}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["user_name"],$_POST["user_prenom"], $_POST["user_email"],  $_POST["user_mdp"])){
        $user_name = htmlspecialchars(trim($_POST["user_name"]));
        $user_prenom = htmlspecialchars(trim($_POST["user_prenom"])); 
        $user_email = htmlspecialchars(trim($_POST["user_email"])); 
        $user_mdp = htmlspecialchars(trim($_POST["user_mdp"]));   
    }
      
    if(!empty($user_name) && !empty($user_prenom) && !empty($user_email) && !empty($user_mdp)){
        try{
            $utilisateur = new Utilisateur($user_name, $user_prenom,  $user_email, $user_mdp); 


            $stmt = $pdp->prepare("SELECT FROM  email FROM utilisateur where email = :email "); 
            $stmt->execute([$utilisateur->getEmail()]);
            if ($stmt->rowCount() > 0) {
                throw new Exception("Cet email est déjà utilisé.");
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

    <?php if (isset($error_message)): ?>
        <p style="color: red;"><?= htmlspecialchars($error_message); ?></p>
    <?php endif; ?>

</form>


    
</body>
</html>