<?php
session_start();

// fichier supprimant les variables de session pour se déconnecter

$title='Page de déconnexion';
$style='./style/styledark.css';
require_once "../include/header.inc.php";

session_unset();
session_destroy();
echo '<h2>Vous êtes déconnecté</h2>';

require_once "../include/footer.inc.php";
?>