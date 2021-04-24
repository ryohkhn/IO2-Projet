<?php

function registercheck(){
    // permet de ne pas envoyer les données du formulaire plusieurs fois lors d'un rechargement
    if(!isset($_SESSION['nickname'])){
        // vérification des valeurs
        if(isset($_POST['nickname']) && isset($_POST['password'])){
            $connexion=connect();
            $nickname=htmlspecialchars($_POST['nickname']);
            $password=htmlspecialchars($_POST['password']);
            $nickname=mysqli_real_escape_string($connexion,$nickname);
            // vérification du nickname dans la db pour vérifier qu'il n'est pas déjà pris 
            if(nicknamecheckdb($nickname)){
                formregisterfaildb();
                return false;
            }
            $password=hash('md5',$password);
            $req="INSERT INTO users(nickname,password) VALUES ('$nickname','$password')";
            mysqli_query($connexion,$req);
            sessionattribute($nickname);
            return true;
        }else{
            formregister();
            return false;
        }
    }
    else{
        return true;
    }
}

?>