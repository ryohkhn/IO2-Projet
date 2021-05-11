<?php
session_start();

require_once "../connexion_db/connexion.php";
require_once "../administration/isadmin.php";

// fonction supprimant le post et l'entrée de signalement dans la base de donnée

if(isset($_GET['postid'])){
    $postid=$_GET['postid'];
    $connexion=connect();

    // vérification ne supprimant le post que s'il est administrateur

    if(isAdmin()){
        mysqli_query($connexion,"DELETE FROM reports WHERE post_id='$postid'");
        mysqli_query($connexion,"DELETE FROM postlikes WHERE publication_id='$postid'");
        mysqli_query($connexion,"DELETE FROM post WHERE id='$postid'");
    }
}

header('Location: ./adminreports.php');
exit;

?>