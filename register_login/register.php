<?php

session_start();

$title='Page d\'enregistrement';
$style='../style/styleformregister.css';
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


if(registercheck()){
    if(complementcheck()){
        if(animalcheck()){
            successregister();
        }
    }
}


require_once '../include/footer.inc.php';
?>