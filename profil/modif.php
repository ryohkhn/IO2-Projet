<?php
//fonction qui demande a l'utilisateur si il veut modifier son profil
function modif(){
    if(!isset($_POST['modif'])){
        echo '<form action="profil.php" method="POST"><input type="hidden" value="true" name="modif"><input type="submit" value="modifier le profil"></form>';
    }
    if(isset($_POST['modif'])){
        modifpp();
        echo "<br>";
        modifppanimaux();
        validermodif();
    }
   
}

?>