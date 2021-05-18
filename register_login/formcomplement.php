<?php

// formulaire pour la description du profil et le nombre d'animaux de l'utilisateur

function formcomplement(){
    echo '<div class="split left">';
    echo '<div class="centeredpageinfo">';
    echo '<h1>Quelques informations supplémentaires</h2>';
    echo '</div>';
    echo '</div>';
    echo '<div class="split right">';
    echo '<div class="centeredform">';
    echo '<form action="./register.php" method="post" class="formloginregister">';
    echo '<textarea name="description" cols="35" rows="8" maxlength="200" class="formcomplement" placeholder="Description de votre profil"></textarea><br>';
    echo '<input type="number" name="quantity" id="quantity" min="0" max="10" class="forminput" placeholder="Combien d\'animaux avez-vous ?"required><br><br>';
    echo '<input type="submit" class="firstformbutton" value="Next">';
    echo '</form>';
    echo '</div>';
    echo '</div>';
}

?>