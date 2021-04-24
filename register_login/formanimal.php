<?php

// formulaire affichant un nombre demandé de select avec une description pour chaque animaux

function formanimal($quantity){
    echo '<div>';
    echo '<h2>Quel type d\'animaux avez-vous ?</h2>';
    echo '<form action="./register.php" method="post">';
    echo '<input type="hidden" id="quantityanimal" name="quantityanimal" value="'.$quantity.'">';
    while($quantity !=0){
        $animal='animal'.$quantity.'';
        echo '<select name="'.$animal.'" id="'.$animal.'">';
        echo '<option value="chat">Chat</option>';
        echo '<option value="chien">Chien</option>';
        echo '<option value="rongeur">Rongeur</option>';
        echo '<option value="oiseau">Oiseau</option>';
        echo '<option value="poisson">Poisson</option>';
        echo '<option value="reptile">Réptile</option>';
        echo '</select><br><br>';
        echo '<label for="description'.$animal.'">Description de l\'animal (race, couleur, caractéristiques...).</label><br>';
        echo '<input type="text" name="description'.$animal.'" id="description'.$animal.'" maxlength="150"><br><br>';
        $quantity--;
    }
    echo '<input type="submit">';
    echo '</form>';
    echo '</div>';
}

?>