<?php

session_start();

$title='Page de connexion';
$style='../style/styleformregister.css';
require_once '../include/header.inc.php';
require_once "./accountcheck.php";
require_once "./successlogin.php";
require_once "../connexion_db/connexion.php";
require_once "./logincheck.php";
require_once "./formlogin.php";
require_once "../sessionattribute.php";

if(!accountcheck()){
    if(logincheck()){
        successlogin();
    }
}else{
    successlogin();
}


?>