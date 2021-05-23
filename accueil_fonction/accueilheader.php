<?php

// fonction affichant la barre de recherche, avec un lien en argument pour pouvoir l'appeler depuis plusieurs pages

function accueilheader($link){
    echo '<header>';
    echo '<div class="divseachbar">';
    echo '<form action="'.$link.'" method="post">';
    echo '<input type="search" name="search" id="searchbar" placeholder="Rechercher un profil" required>';
    echo '</form>';
    echo '</div>';
    echo '</header>';
}
?>