<?php

// formulaire de la page d'accueil pour faire une publication

function postform(){
    echo '<div class="postform">';
    echo '<form action="./accueil.php" method="post" enctype="multipart/form-data">';
    echo '<input type="hidden" name="MAX_FILE_SIZE" value="100000000000000" />';
    echo '<textarea name="publication" cols="30" rows="10" maxlength="200" class="formcomplement" placeholder="Quoi de neuf ? Vous pouvez écrire ce que vous voulez ici pour le publier." required></textarea>';
    echo '<div class="postformbuttons">';
    echo '<div>';
    echo '<label for="photoinput">';
    echo '<img src="./images/imagelogo.png" alt="imagelogo" class="imageinput" >';
    echo '<input type="file" name="photo_post" id="photoinput">';
    echo '</label>';
    echo '</div>';
    if(isset($_GET['success']) && $_GET['success']=='true'){
        echo '<div>';
        echo '<p>Publication envoyée</p>';
        echo '</div>';
    }
    echo '<div>';
    echo '<input type="submit" value="Envoyer" class="postformsendbutton">';
    echo '</div>';
    echo '</div>';
    echo '</form>';
    echo '</div>';
}


?>