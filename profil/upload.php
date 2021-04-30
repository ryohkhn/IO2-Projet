<?php
require_once "../connexion_db/connexion.php";
$co=connect();
$statusMsg = '';
function upload($a){
    $id=$_SESSION['id'];
    $req="UPDATE profil SET pp_pic= 'test3' WHERE profil_id='$id'";
    mysqli_query($co,$req);
    $targetDir = "./uploads/";
    $targetFilePath = $targetDir . $a;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    $allowTypes = array('jpg','png','jpeg');
    if(in_array($fileType, $allowTypes)){
        if(move_uploaded_file($a, $targetFilePath)){
            $req="UPDATE profil SET pp_pic= '".$targetFilePath."' WHERE profil_id='$id'";
            mysqli_query($co,$req);
        }
    }

}
?>