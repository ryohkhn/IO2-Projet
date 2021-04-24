<?php

// fonction vérifiant la présence d'un nom d'utilisateur dans la base de donnée

function nicknamecheckdb($nickname){
    $connexion=connect();
    $req="SELECT id FROM users WHERE nickname='$nickname'";
    $query=mysqli_query($connexion,$req);
    $rows=mysqli_num_rows($query);
    if($rows==1){
        return true;
    }else{
        return false;
    }
}


?>