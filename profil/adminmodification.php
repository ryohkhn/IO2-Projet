<?php
session_start();

require_once "../connexion_db/connexion.php";
require_once "./isadmin.php";
require_once "./issuperadmin.php";

// page traitant le rôle d'administration du compte dont l'id est dans l'adresse

if(isAdmin()){
    if(isset($_GET['id']) && isset($_GET['profil'])){
        $id=$_GET['id'];
        $nickname=$_GET['profil'];
        $connexion=connect();
        if(!isAdminProfil($id)){
            mysqli_query($connexion,"INSERT INTO administrators VALUES('$id','0','1')");
        }else if(isSuperAdminProfil($id)){
            header('Location: ../profil.php?nickname='.$nickname.'&adminerror=true');
            exit;
        }else{
            mysqli_query($connexion,"DELETE FROM administrators WHERE administrators_id='$id'");
        }
        header('Location: ../profil.php?nickname='.$nickname.'');
        exit;
    }
}

// redirection dans le cas de l'accès de la page sans avoir de compte administrateur

else{
    header('Location: ../profil.php');
    exit;
}

?>