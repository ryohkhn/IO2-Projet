<?php

session_start();
$title='Profil';
$style='./style/styleprofil.css';
require_once "./include/header.inc.php";
require_once "./register_login/accountcheck.php";
require_once "./sessionattribute.php";
require_once "./connexion_db/connexion.php";
require_once "./profil/modif.php";
require_once "./profil/usersprofil.php";
require_once "./profil/isfollowing.php";
require_once "./profil/profilheader.php";
require_once "./profil/isadmin.php";
require_once "./profil/issuperadmin.php";

// sert a retenir la page ou on etait pour nous renvoyer dessus apres s'être login

$_SESSION['page']="profil.php"; 

// On verifie si l'utilisateur est connecté

if(!accountcheck()){
    echo '<h2>Vous devez posséder un compte pour accéder à cette page</h2>';
    echo '<a href="./register_login/register.php">Inscrivez-vous</a><br>';
    echo '<a href="./register_login/login.php">Connectez-vous</a>';
    exit;
}

profilheader();

// Page de profil d'un utilisateur recherché

if(isset($_GET['nickname'])){
    usersprofilsearched($_GET['nickname']);
} else{
    usersprofil();
}


require_once "./include/footer.inc.php";

?>
