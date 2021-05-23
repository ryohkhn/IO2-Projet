<?php

// formulaire d'identification

function formlogin(){
    echo '<div class="split left">';
    echo '<div class="centeredpageinfo">';
    echo '<p>welcome</p>';
    echo '<h1>Login to your personnal account</h1>';
    echo '</div>';
    echo '</div>';
    echo '<div class="split right">';
    echo '<div class="centeredform">';
    echo '<form action="./login.php" method="post" class="formloginregister">';
    echo '<input type="text" name="nickname" class="forminput" placeholder="Nom d\'utilisateur" required><br>';
    echo '<input type="password" name="password" class="forminput" placeholder="Mot de passe" required><br>';
    echo '<input type="submit" class="firstformbutton" value="Login">';
    echo '</form>';
    echo '</div>';
    echo '</div>';
}

function formloginfail(){
    echo '<div class="split left">';
    echo '<div class="centeredpageinfo">';
    echo '<p>welcome</p>';
    echo '<h1>Login to your personnal account</h1>';
    echo '</div>';
    echo '</div>';
    echo '<div class="split right">';
    echo '<div class="centeredform">';
    echo '<form action="./login.php" method="post" class="formloginregister">';
    echo '<input type="text" name="nickname" class="forminput" placeholder="Nom d\'utilisateur" required><br>';
    echo '<input type="password" name="password" class="forminput" placeholder="Mot de passe" required><br>';
    echo '<p class="formerror">Mauvaise combinaison nom d\'utilisateur/mot de passe</p><br>';
    echo '<input type="submit" class="firstformbutton" value="Go">';
    echo '</form><br>';
    echo '</div>';
    echo '</div>';
}

?>