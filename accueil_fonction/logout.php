<?php
session_start();
// fichier supprimant les variables de session pour se déconnecter

$title='Page de déconnexion';
$style='../style/styledark.css';
require_once "../include/header.inc.php";

session_unset();
session_destroy();
echo '<h2>Vous êtes déconnecté</h2>';

echo '<div class="button_style"><span><a class="link_style" href="../register_login/login.php">S\'identifier</a></span></div>';
echo '<div class="button_style"><span><a class="link_style" href="../register_login/register.php">S\'enregistrer</a></span></div>';

require_once "../include/footer.inc.php";
?>