<?php

// fonction affichant le header avec un bouton home, une barre de recherche et un bouton de déconnexion

function accueilheader(){
    echo '<header>';
    echo '<div class="divseachbar">';
    echo '<form action="./accueil_fonction/searchresult.php" method="post">';
    //echo '<i class="material-icons searchicon">search</i>';
    echo '<input type="search" name="search" id="searchbar" placeholder="Rechercher un profil" required>';
    echo '</form>';
    echo '</div>';
    echo '</header>';
}
?>