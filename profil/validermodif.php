<?php
function validermodif(){
    if(!isset($_GET['valider'])){
        echo '<input type="hidden" value="true" name="validation"><input type="submit" value="enregistrer toutes modifications"></form>';
    }else{
        if(isset($_GET[$profil['id']])){
            echo "ça marche";
        }
        echo "test";
        $a=$profil['id'];
        if(!empty($_GET[''.$a.''])){
            $a=$_GET[''.$a.''];
            $insert="INSERT INTO profil(pp_pic) VALUES (''.$a.'')";
            mysqli_query($connexion,$insert);
            
        }
        unset($_GET['valider']);
        unset($_GET['modif']);
        //echo "<script type='text/javascript'>document.location.replace('profil.php');</script>";

    }

}
?>
