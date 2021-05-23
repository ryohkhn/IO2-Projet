<?php
session_start();

require_once "../connexion_db/connexion.php";
require_once "../administration/isadmin.php";

// fonction ignorant le signalement dans la base de donnée

if(isset($_GET['postid'])){
    $postid=$_GET['postid'];
    $connexion=connect();

    // vérification ignorant la requête que si l'utilisateur est administrateur

    if(isAdmin()){
        mysqli_query($connexion,"DELETE FROM reports WHERE post_id='$postid'");
    }
}

header('Location: ./adminreports.php');
exit;

?>