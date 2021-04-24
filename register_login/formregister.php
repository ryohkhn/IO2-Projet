<?php

// formulaire d'enregistrement

function formregister(){
    echo '<div>';
    echo '<h1 id="formtitle">Créer un compte</h1>';
    echo '<form action="./register.php" method="post">';
    echo '<label for="nickname">Nom d\'utilisateur </label>';
    echo '<input type="text" name="nickname" id="nickname" required><br><br>';
    echo '<label for="password">Mot de passe </label>';
    echo '<input type="password" name="password" id="password" required><br><br>';
    echo '<input type="submit">';
    echo '</form>';
    echo '<h3>Vous possédez déjà un compte ? </h3>';
    echo '<a href="./login.php">Identifiez-vous</a>';
    echo '</div>';
}

// fonction permettant de vérifier s'il le nom d'utilisateur est déjà pris dans la base de donnée

function formregisterfaildb(){
    echo '<div>';
    echo '<h1 id="formtitle">Créer un compte</h1>';
    echo '<form action="./register.php" method="post">';
    echo '<h3>Votre nom d\'utilisateur est déjà pris</h3>';
    echo '<label for="nickname">Nom d\'utilisateur </label>';
    echo '<input type="text" name="nickname" id="nickname"><br><br>';
    echo '<label for="password">Mot de passe </label>';
    echo '<input type="password" name="password" id="password"><br><br>';
    echo '<input type="submit">';
    echo '</form>';
    echo '<h3>Vous possédez déjà un compte ? </h3>';
    echo '<a href="./login.php">Identifiez-vous</a>';
    echo '</div>';
}


?>