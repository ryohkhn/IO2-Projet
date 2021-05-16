<?php
// upload les documents téléchargés avec l'input de type file dans l'espace de stockage(document uploads)
// et rentre son chemin d'acces dans la database
// return true si reussite, false si echec
// raisons d'échecs possibles : pas le bon type (png,jpeg,jpg), dossier dangereux(ne passe pas le test de move_uploaded_file() )
function upload($files){
    $co=connect();
    $id=$_SESSION['id'];
    $name= $id. "PP" . $files['name']; // pour eviter que deux images aient le même nom et que le nom de l'image soit un commande
    $upload = "uploads/";
    $chemin = $upload . $name;
    $fileType = pathinfo($chemin,PATHINFO_EXTENSION);
    $allowTypes = array('jpg','png','jpeg');
    if(in_array($fileType, $allowTypes)){
        if(move_uploaded_file($files['tmp_name'], $chemin)){
            $req="UPDATE profil SET pp_pic= '".$chemin."' WHERE profil_id='$id'";
            mysqli_query($co,$req);
            return true;
        }
    }
    return false;

}
?>