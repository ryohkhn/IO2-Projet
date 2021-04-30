<?php
function validermodif(){
    if(!isset($_GET['valider'])){
        echo '<input type="hidden" value="true" name="validation"><input type="submit" value="enregistrer toutes modifications"></form>';
    }  

}
?>
