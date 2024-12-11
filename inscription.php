<?php
include 'session.php';
check_session(); //on vérifie si la personne a le droit d'accéder à cette page
require_once'config.php'; //accès à la base de données

class Utilisateur{
     
    const ERROR_NAME = "Nom incorrect"; 
    const ERROR_PRENOM  = "Prenom incorrect"; 
    const ERROR_EMAIL= "Incorrect email"; 
    const ERROR_MDP= "Incorrect  mdp"; 
    
    private string $name ="" ; 
    private string $prenom =""; 
    private string $email=""; 
    private string $mdp=""; 

    public function __construct(string $name, string $prenom,string $email,string $mdp){
        if(!empty($name) && !empty($prenom) && !empty($email)  && !empty($mdp)){
            $this->setName($name);
            $this->setPrenom($prenom); 
            $this->setPrenom($email); 
            $this->setEamil($mdp); 
        }
    }

    public function setName($name){
        $name = strtolower($name); 
        
        if(ctype_alpha($name)){
            if(iconv_strlen($name) >= 3 && iconv_strlen($name)<= 20) {
                $this->name = $name; 
            }else{
                throw new Exception(self::ERROR_NOM); 
            }
        }
    }

    public function setPrenom($prenom){
        $prenom = strtolower($prenom); 
        
        if(ctype_alpha($prenom)){
            if(iconv_strlen($prenom) >= 3 && iconv_strlen($prenom)<= 20) {
                $this->prenom  = $prenom; 
            }else{
                throw new Exception(self::ERROR_PRENOM); 
            }
        }
    }


    public function setEmail($email){
        $email = strtolower($email);

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->email = $email ; 
        }else{
            throw new Exception(self::ERROR_EMAIL); 
        }
    }

    public function setMdp($mdp){
        
        $caractereSpaciaux = "?!+%*="; 
        $caractereSpe = false ; 
        
        foreach(str_split($caractereSpaciaux) as $caractere){
            if(strpos($mdp, $caractere) !== false ){
                $caractereSpe = true; 
            }else{
                throw new Exception(self::$mdp); 
            }
        }

        if(strlen($mdp) >= 8 && preg_match('/[A-Za-z]/', $mdp) && preg_match('/[0-9]/', $mdp) && $caractereSpe){
            $this->mdp = password_hash($mdp, PASSWORD_BCRYPT); 
        }else{
            throw new Exception(self::$mdp); 
        }
    }


}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["user_name"], $_POST["user_prenom"],$_POST["user_email"], $_POST["user_mdp"])){
        $user_name = htmlspecialchars(trim($_POST["user_name"])); 
        $user_prenom = htmlspecialchars(trim($_POST["user_prenom"])); 
        $user_email = htmlspecialchars(trim($_POST["user_email"])); 
        $user_mdp = htmlspecialchars(trim($_POST["user_mdp"])); 
     

        if(!empty($user_name) && !empty($user_prenom) && !empty($user_$email) &&  !empty($user_mdp)){
            
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