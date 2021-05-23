<?php

session_start();

$title='Page d\'enregistrement';
$style='../style/styledark.css';
require_once '../include/header.inc.php';
require_once './registercheck.php';
require_once './formregister.php';
require_once '../connexion_db/connexion.php';
require_once './formcomplement.php';
require_once './formanimal.php';
require_once './complementcheck.php';
require_once '../sessionattribute.php';
require_once './animalcheck.php';
require_once './successregister.php';
require_once './nicknamecheckdb.php';
require_once './accountcheck.php';
require_once './preregistercheck.php';

// page traitant les informations du formulaire d'enregistrement

// permet de ne pas afficher le header sur la page après avoir passé le premier formulaire

if(!preregistercheck() && !accountcheck()){
    include "./headerregister.html";
}

if(registercheck()){
    if(complementcheck()){
        if(animalcheck()){
            successregister();
        }
    }
}


require_once '../include/footer.inc.php';
?>