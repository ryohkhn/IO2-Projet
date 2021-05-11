<?php
session_start();

require_once "../administration/isadmin.php";
require_once "../connexion_db/connexion.php";
require_once "../accueil_fonction/idreference.php";
require_once "../profil/postidreference.php";
require_once "./noreports.php";
require_once "./reportedpostslisting.php";
require_once "./nicknamepostidreference.php";

if(!isAdmin()){
    header('Location: ../accueil.php');
    exit;
}

noReports();

reportedPostListing();

?>