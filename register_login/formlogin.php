<?php

function formlogin(){
    echo '<div>';
    echo '<h1 id="formtitle">S\'identifier</h1>';
    echo '<form action="./login.php" method="post">';
    echo '<label for="nickname">Nom d\'utilisateur </label>';
    echo '<input type="text" name="nickname" id="nickname" required><br><br>';
    echo '<label for="password">Mot de passe </label>';
    echo '<input type="password" name="password" id="password" required><br><br>';
    echo '<input type="submit">';
    echo '</form><br>';
    echo '<a href="./register.php">Créer votre compte</a>';
    echo '</div>';
}

function formloginfail(){
    echo '<div>';
    echo '<h1 id="formtitle">S\'identifier</h1>';
    echo '<form action="./login.php" method="post">';
    echo '<h3>Mauvaise combinaison nom d\'utilisateur/mot de passe</h3>';
    echo '<label for="nickname">Nom d\'utilisateur </label>';
    echo '<input type="text" name="nickname" id="nickname" required><br><br>';
    echo '<label for="password">Mot de passe </label>';
    echo '<input type="password" name="password" id="password" required><br><br>';
    echo '<input type="submit">';
    echo '</form><br>';
    echo '<a href="./register.php">Créer votre compte</a>';
    echo '</div>';
}

?>