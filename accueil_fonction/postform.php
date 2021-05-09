<?php

// formulaire de la page d'accueil pour faire une publication

function postform(){
    echo '<div id="publication">';
    echo '<form action="./accueil.php" method="post">';
    echo '<textarea name="publication" id="publication" cols="30" rows="10" maxlength="200" required></textarea>';
    echo '<div>';
    echo '<input type="submit" value="Post">';
    echo '</div>';
    echo '</form>';
    if(isset($_GET['success']) && $_GET['success']=='true'){
        echo '<h5>Publication envoyée</h5>';
    }
    echo '</div>';
}


?>