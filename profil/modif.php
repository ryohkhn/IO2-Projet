<?php
//fonction qui demande a l'utilisateur si il veut modifier son profil
function modif(){
    echo '<form action="./profil" method="POST"><input type="hidden" value="true" name="modif"><input type="submit" value="modifier le profil"></form>';
}

?>