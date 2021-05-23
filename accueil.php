<?php
session_start();

$title='Page d\'enregistrement';
$style='./style/styledark.css';
require_once "./include/header.inc.php";
require_once "./register_login/accountcheck.php";
require_once "./accueil_fonction/unsetregistervalues.php";
require_once "./connexion_db/connexion.php";
require_once "./accueil_fonction/publicationcheck.php";
require_once "./accueil_fonction/accueilheader.php";
require_once "./accueil_fonction/postform.php";
require_once "./accueil_fonction/timelinedisplay.php";
require_once "./accueil_fonction/idreference.php";
require_once "./likes/isliked.php";
require_once "./administration/isadmin.php";
require_once "./administration/issuperadmin.php";
require_once "./reports/isreported.php";

$_SESSION['page']="accueil.php"; // sert a retenir la page ou on etait pour nous renvoyer dessus apres s'être login

// On verifie si l'utilisateur est connecté

if(!accountcheck()){
    echo '<h2>Vous devez posséder un compte pour accéder à cette page</h2>';
    echo '<a href="./register_login/register.php" class="warningaccountcheck">Inscrivez-vous</a>';
    echo '<a href="./register_login/login.php" class="warningaccountcheck">Connectez-vous</a>';
    exit;
}

// fonction pour unset les valeurs créées lors de l'inscription

unsetregistervalues();

// fonction vérifiant si un post a été envoyé via le formulaire

publicationcheck();

// affichage de la barre latérale et des posts

require "./accueil_fonction/leftbar.php";
timelinedisplay();




require_once "./include/footer.inc.php";

?>