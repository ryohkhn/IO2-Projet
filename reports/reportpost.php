<?php
session_start();

require_once "../connexion_db/connexion.php";
require_once "./isreported.php";
require_once "../register_login/accountcheck.php";

if(!accountcheck()){
    echo '<h2>Vous devez posséder un compte pour accéder à cette page</h2>';
    echo '<a href="./register_login/register.php" class="warningaccountcheck">Inscrivez-vous</a>';
    echo '<a href="./register_login/login.php" class="warningaccountcheck">Connectez-vous</a>';
    exit;
}

// page envoyant le signalement à la base de donnée pour les administrateurs

if(isset($_GET['postid'])){    
    $connexion=connect();
    $id=$_SESSION['id'];
    $publication_id=$_GET['postid'];

    if(!isReported($publication_id)){
        mysqli_query($connexion,"INSERT INTO reports(reports_id,post_id) VALUES('$id','$publication_id')");
    }
}

// renvoi sur la page correspondant à la page d'appel de la fonction

if(isset($_GET['profil'])){
    header('Location: ../profil.php?nickname='.$_GET['profil'].'');
}else{
    header('Location: ../accueil.php');
}


?>