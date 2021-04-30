<?php
//fonction qui demande a l'utilisateur si il veut modifier son profil
function modif(){
    if(!isset($_GET['modif'])){
        echo '<form action="profil.php" method="GET"><input type="hidden" value="true" name="modif"><input type="submit" value="modifier le profil"></form>';
    }
    if(isset($_GET['modif'])){
        modifpp();
        echo "<br>";
        modifppanimaux();
        validermodif();
    }
   
}

?>