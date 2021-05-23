<?php
//page de modification des données du profil
session_start();
$title='Modification profil';
$style='./style/styledark.css';
require_once "../include/header.inc.php";
require_once "../connexion_db/connexion.php";
require_once "../sessionattribute.php";
require_once "upload.php";
require_once "uploadAnimaux.php";
require_once "formModificationProfil.php";
require_once "../register_login/accountcheck.php";

if(!accountcheck()){
    echo '<h2>Vous devez posséder un compte pour accéder à cette page</h2>';
    echo '<a href="./register_login/register.php">Inscrivez-vous</a><br>';
    echo '<a href="./register_login/login.php">Connectez-vous</a>';
    exit;
}

formModificationProfil();

?>