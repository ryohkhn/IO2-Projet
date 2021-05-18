<?php

// formulaire d'enregistrement

function formregister(){
    echo '<div class="split left">';
    echo '<div class="centeredpageinfo">';
    echo '<p>welcome</p>';
    echo '<h1>Fill the form to join us</h1>';
    echo '</div>';
    echo '</div>';
    echo '<div class="split right">';
    echo '<div class="centeredform">';
    echo '<form action="./register.php" method="post" class="formloginregister">';
    echo '<input type="text" name="nickname" class="forminput" placeholder="Nom d\'utilisateur" required><br>';
    echo '<input type="password" name="password" class="forminput" placeholder="Mot de passe" required><br>';
    echo '<input type="submit" class="firstformbutton" value="Go">';
    echo '</form>';
    echo '</div>';
    echo '</div>';
}

// fonction permettant de vérifier s'il le nom d'utilisateur est déjà pris dans la base de donnée

function formregisterfaildb(){
    echo '<div class="split left">';
    echo '<div class="centeredpageinfo">';
    echo '<p>welcome</p>';
    echo '<h1>Fill the form to join us</h1>';
    echo '</div>';
    echo '</div>';
    echo '<div class="split right">';
    echo '<div class="centeredform">';
    echo '<form action="./register.php" method="post" class="formloginregister">';
    echo '<input type="text" name="nickname" class="forminput" placeholder="Nom d\'utilisateur" required><br>';
    echo '<input type="password" name="password" class="forminput" placeholder="Mot de passe" required><br>';
    echo '<p class="formerror">Votre nom d\'utilisateur est déjà pris</p>';
    echo '<input type="submit" class="firstformbutton" value="Go">';
    echo '</form>';
    echo '</div>';
    echo '</div>';
}


?>