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

if(!accountcheck()){
    echo '<h2>Vous devez posséder un compte pour accéder à cette page</h2>';
    echo '<a href="./register_login/register.php">Inscrivez-vous</a><br>';
    echo '<a href="./register_login/login.php">Connectez-vous</a>';
    exit;
}

unsetregistervalues();

//accueilheader();
publicationcheck();


/*echo '<div>';
echo '<a href="profil.php">Voir mon profil</a>';
echo '</div>';*/

require "./accueil_fonction/leftbar.php";
timelinedisplay();




require_once "./include/footer.inc.php";

?>