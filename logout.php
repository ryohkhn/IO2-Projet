<?php
session_start();
$title='Page de deconnexion';
$style='./style/styledisconnected.css';
require_once "./include/header.inc.php";

session_unset();
session_destroy();
echo '<h2>Vous êtes déconnecté</h2>';

require_once "./include/footer.inc.php";
?>