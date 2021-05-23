<?php

$title="cccc";
$style="./style/styledark.css";
require_once "./include/header.inc.php";
require_once "./register_login/accountcheck.php";
require_once "./accueil_fonction/unsetregistervalues.php";
require_once "./connexion_db/connexion.php";
echo '<div>';
echo '<a href="./delete/deletepost.php?postid='.$fetch['id'].'>';
echo '<i class="material-icons md-light">delete</i>';
echo '</a>';
echo '</div>';
?>

<div class="image-upload">
    <a href="">
        <i class="material-icons">delete</i>
    </a>
    <a href="./dele">
        <i class="material-icons md-light">delete</i>
    </a>
</div>

