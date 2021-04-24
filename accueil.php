<?php
session_start();
require_once "./register_login/accountcheck.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<title>Accueil</title>
<meta charset="utf-8"/>
<link rel="./style/styleaccueil.php" href="'.$style.'" type="text/css"/>
</head>
<body>

<?php
if(!accountcheck()){
    echo '<h2>Vous devez posséder un compte pour accéder à cette page</h2>';
    echo '<a href="./register_login/register.php">Inscrivez-vous</a><br>';
    echo '<a href="./register_login/login.php">Connectez-vous</a>';
    exit;
}
?>

<header><a href="./logout.php">Déconnexion</a></header>

<?php

// A FAIRE DANS UNE FONCTION
if(isset($_SESSION['complementcheckdone']) && isset($_SESSION['animalcheckdone'])){
    unset($_SESSION['complementcheckdone']);
    unset($_SESSION['animalcheckdone']);
}


echo '<h1>Hello jeune utilisateur !</h1>';


require_once "./include/footer.inc.php";

?>