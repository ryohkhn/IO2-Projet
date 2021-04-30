<?php
function validermodif(){
    if(!isset($_POST['valider'])){
        echo '<input type="hidden" value="true" name="validation"><input type="submit" value="enregistrer toutes modifications"></form>';
    }  

}
?>
