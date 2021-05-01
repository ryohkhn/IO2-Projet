<?php
function upload($files){
    $co=connect();
    $id=$_SESSION['id'];
    $upload = "./uploads/";
    $chemin = $upload . $files['name'];
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