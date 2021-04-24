<?php

// formulaire pour la description du profil et le nombre d'animaux de l'utilisateur

function formcomplement(){
    echo '<div>';
    echo '<h2>Quelques informations supplémentaires</h2>';
    echo '<form action="./register.php" method="post">';
    echo '<label for="description">Description de votre profil</label><br>';
    echo '<input type="text" name="description" id="description" maxlength="200"><br>';
    echo '<label for="quantity">Combien d\'animaux avez-vous ?</label><br>';
    echo '<input type="number" name="quantity" id="quantity" min="0" required><br><br>';
    echo '<input type="submit">';
    echo '</form>';
    echo '</div>';
}

?>