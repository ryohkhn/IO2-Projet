<?php
// upload les documents téléchargés avec l'input de type file dans l'espace de stockage(document uploads)
// et rentre son chemin d'acces dans la database
// return true si reussite, false si echec
// raisons d'échecs possibles : pas le bon type (png,jpeg,jpg), dossier dangereux(ne passe pas le test de move_uploaded_file() )
function uploadAnimaux($files,$idAnimal){
    $co=connect();
    $upload = "./uploads/";
    $name= $idAnimal.$files['name']; // pour eviter que deux images aient le même nom
    $chemin = $upload . $name;
    $fileType = pathinfo($chemin,PATHINFO_EXTENSION);
    $allowTypes = array('jpg','png','jpeg');
    if(in_array($fileType, $allowTypes)){
        if(move_uploaded_file($files['tmp_name'], $chemin)){
            $req="UPDATE animal SET pp_pic= '".$chemin."' WHERE id='$idAnimal'";
            mysqli_query($co,$req);
            return true;
        }
    }
    return false;

}
?>