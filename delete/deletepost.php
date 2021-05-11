<?php
session_start();

require_once "../connexion_db/connexion.php";
require_once "./ispostowner.php";
require_once "../administration/isadmin.php";

// fonction supprimant le post dont la référence est dans l'adresse en $_GET

if(isset($_GET['postid'])){
    $postid=$_GET['postid'];
    $connexion=connect();

    // vérification ne supprimant le post que s'il est son auteur ou s'il est administrateur

    if(isPostOwner($postid) || isAdmin()){
        mysqli_query($connexion,"DELETE FROM postlikes WHERE publication_id='$postid'");
        mysqli_query($connexion,"DELETE FROM post WHERE id='$postid'");
    }
}

// test renvoyant sur la page du profil si la fonction a été appellée d'un certain profil

if(isset($_GET['profil'])){
    header('Location: ../profil.php?nickname='.$_GET['profil'].'');
}
else{
    header('Location: ../accueil.php');
}

?>