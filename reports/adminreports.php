<?php
session_start();

$title='Page des signalements';
$style='../style/styledark.css';
require_once "../include/header.inc.php";
require_once "../administration/isadmin.php";
require_once "../connexion_db/connexion.php";
require_once "../accueil_fonction/idreference.php";
require_once "../profil/postidreference.php";
require_once "./noreports.php";
require_once "./reportedpostslisting.php";
require_once "./nicknamepostidreference.php";
require_once "../administration/issuperadmin.php";
require_once "../accueil_fonction/accueilheader.php";
require_once "../accueil_fonction/leftbarotherpage.php";
require_once "../register_login/accountcheck.php";

if(!accountcheck()){
    echo '<h2>Vous devez posséder un compte pour accéder à cette page</h2>';
    echo '<a href="./register_login/register.php" class="warningaccountcheck">Inscrivez-vous</a>';
    echo '<a href="./register_login/login.php" class="warningaccountcheck">Connectez-vous</a>';
    exit;
}

if(!isAdmin()){
    header('Location: ../accueil.php');
    exit;
}

// affichage de la barre latérale avec les informations utilisateur et les boutons

leftbarotherpage("../accueil.php","../profil.php","./adminreports.php","../accueil_fonction/logout.php");

// cas ou il n'y a aucun signalements en attente

noReports();

// affichage des signalements et des boutons de traitement

reportedPostListing();

require_once "../include/footer.inc.php";
?>