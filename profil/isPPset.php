<?php
//verification de l'existence de la PP (profile picture / photo de profil)
function isPPset($id){
    $connexion=connect();
    $req='SELECT * from profil where profil_id='.$id.'';
    $query=mysqli_query($connexion,$req);
    $fetchquery=mysqli_fetch_assoc($query);
    if(!empty($fetchquery['pp_pic'])){
        return true;
    }
    return false;

}

function isPPsetAnimaux($id){
    $connexion=connect();
    $req='SELECT * from animal where id='.$id.'';
    $query=mysqli_query($connexion,$req);
    $fetchquery=mysqli_fetch_assoc($query);
    if(!empty($fetchquery['pp_pic'])){
        return true;
    }
    return false;

}

?>