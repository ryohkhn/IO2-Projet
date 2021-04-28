<?php

session_start();
$title='Page d\'enregistrement';
$style='./style/styleaccueil.css';
require_once "./include/header.inc.php";
require_once "./register_login/accountcheck.php";
require_once "./accueil_fonction/unsetregistervalues.php";
require_once "./connexion_db/connexion.php";
require_once "./accueil_fonction/publicationcheck.php";
require_once "./accueil_fonction/accueilheader.php";

if(!accountcheck()){
    echo '<h2>Vous devez posséder un compte pour accéder à cette page</h2>';
    echo '<a href="./register_login/register.php">Inscrivez-vous</a><br>';
    echo '<a href="./register_login/login.php">Connectez-vous</a>';
    exit;
}
unsetregistervalues();

accueilheader();
publicationcheck();
?>

<h1>Hello jeune utilisateur !</h1>

<div id="publication">
<form action="./accueil.php" method="post">
<textarea name="publication" id="publication" cols="30" rows="10" maxlength="200" required></textarea>
<input type="submit" value="Post">
</form>
<?php
if(isset($_GET['success']) && $_GET['success']=='true'){
  echo '<h5>Publication envoyée</h5>';
}
?>
</div>

<?php

require_once "./include/footer.inc.php";

?>