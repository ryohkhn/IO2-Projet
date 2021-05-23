<?php

session_start();

$title='Page de connexion';
$style='../style/styledark.css';
require_once '../include/header.inc.php';
require_once "./accountcheck.php";
require_once "./successlogin.php";
require_once "../connexion_db/connexion.php";
require_once "./logincheck.php";
require_once "./formlogin.php";
require_once "../sessionattribute.php";
require_once "./prelogincheck.php";

// page traitant les informations du formulaire de login

// permet de ne pas afficher le header sur la page après avoir passé le premier formulaire

if(!prelogincheck() && !accountcheck()){
    include_once "./headerlogin.html";
}

if(!accountcheck()){
    if(logincheck()){
        successlogin();
    }
}
else{
    successlogin();
}

require_once "../include/footer.inc.php";
?>