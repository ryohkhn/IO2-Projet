<?php

// fonction permettant de vérifier que le premier formulaire a été envoyé pour ne plus montrer le header 

function preregistercheck(){
    if(isset($_POST['nickname']) && isset($_POST['password'])){
        $connexion=connect();
        $nickname=htmlspecialchars($_POST['nickname']);
        $nickname=mysqli_real_escape_string($connexion,$nickname);
        // vérification du nickname dans la db pour vérifier qu'il n'est pas déjà pris 
        if(nicknamecheckdb($nickname)){
            return false;
        }
        return true;
    }
    return false;
}

?>