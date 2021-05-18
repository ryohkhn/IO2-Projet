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