<?php

// formulaire affichant un nombre demandé de select avec une description pour chaque animal

function formanimal($quantity){
    $heightform=370;
    $quantityheightform=$quantity*$heightform;
    echo '<div class="split left">';
    echo '<div class="centeredpageinfo">';
    echo '<h1>Quel type d\'animaux avez-vous ?</h1>';
    echo '</div>';
    echo '</div>';
    echo '<div class="split right">';
    echo '<div class="centeredform">';
    echo '<form action="./register.php" method="post" class="formloginregisteranimal" style="height:'.$quantityheightform.'px;">';
    echo '<input type="hidden" name="quantityanimal" value="'.$quantity.'">';
    while($quantity !=0){
        $animal='animal'.$quantity.'';
        echo '<select name="'.$animal.'" class="forminputselect">';
        echo '<option value="chat">Chat</option>';
        echo '<option value="chien">Chien</option>';
        echo '<option value="rongeur">Rongeur</option>';
        echo '<option value="oiseau">Oiseau</option>';
        echo '<option value="poisson">Poisson</option>';
        echo '<option value="reptile">Réptile</option>';
        echo '</select><br><br>';
        echo '<textarea name="description'.$animal.'" cols="35" rows="8" maxlength="150" class="formcomplement" placeholder="Description de l\'animal (race,couleur,caractéristiques...)."></textarea><br><br>';
        $quantity--;
    }
    echo '<input type="submit" class="firstformbutton" value="Next">';
    echo '</form>';
    echo '</div>';
    echo '</div>';
}

?>