<?php
//page de modification des données du profil
//affiche le formulaire de modification + appelle les fonctions pour rentrer les données dans la database et dans l'espace de stockage
session_start();
$title='Profil';
$style='../style/styleaccueil.css';
require_once "../include/header.inc.php";
require_once "../connexion_db/connexion.php";
require_once "../sessionattribute.php";
require_once "upload.php";
require_once "uploadAnimaux.php";
$connexion=connect();
$id=$_SESSION['id'];
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<title></title>";
echo "</head>";
echo "<body>";
echo '<form action="" method="post" enctype="multipart/form-data">';
echo '<input type="hidden" name="MAX_FILE_SIZE" value="100000000" />';
if(!empty($_POST['descProfil'])){
    $newDesc=mysqli_real_escape_string($connexion, htmlspecialchars($_POST['descProfil']));
    $req="UPDATE profil SET description= '$newDesc' WHERE profil_id='$id'";
    mysqli_query($connexion,$req);
    $req="SELECT * FROM profil WHERE profil_id='$id'";
    $query=mysqli_query($connexion,$req);
    $fetchquery=mysqli_fetch_assoc($query);
    echo "description modifiée : ";
    echo $fetchquery['description'];
    echo "<br>";

}else{
    echo '<input type="text" name="descProfil">';
    echo '<label for="descProfil">modifier la description de votre profil</label>';
    echo "<br>";
}
if(!empty($_FILES['pp']['name']) AND $_FILES['pp']['error'] == 0){
    if(!upload($_FILES['pp'])){
        header('Location: ./erreur.html');
    }else{ // affichage de la photo upload
        echo "changement effectués pour la photo de profil suivante ---->";
        echo "<br>";
        $req="SELECT * FROM profil WHERE profil_id='$id'";
        $query=mysqli_query($connexion,$req);
        $fetchquery=mysqli_fetch_assoc($query);
        echo '<img src="./'.$fetchquery['pp_pic'].'" alt="photo de profil">';
        echo "<br>";
    }
    
}else{
    echo '<input type="file" name="pp">';
    echo '<label for="pp">modifier la photo de votre profil</label>';

    
}
    
echo "<br>";
echo "<br>";
$request="SELECT * FROM animal WHERE animal_id='$id'";
$result=mysqli_query($connexion,$request);
while($animaux=mysqli_fetch_assoc($result)){
    $animalid=$animaux['id'];
    if(!empty($_POST['desc'.$animalid.''])){
        $newDesc=mysqli_real_escape_string($connexion, htmlspecialchars($_POST['desc'.$animalid.'']));
        $req="UPDATE animal SET description= '$newDesc' WHERE id='$animalid'";
        mysqli_query($connexion,$req);
        $req="SELECT * FROM animal WHERE id='$animalid'";
        $query=mysqli_query($connexion,$req);
        $fetchquery=mysqli_fetch_assoc($query);
        echo "description modifiée : ";
        echo $fetchquery['description'];
        echo "<br>";
    
    }else{
        echo '<input type="text" name="desc'.$animalid.'">';
        echo '<label for="descProfil">modifier la description de votre profil</label>';
        echo "<br>";
    }
    if(!empty($_FILES[''.$animaux['id'].'']['name']) AND $_FILES[''.$animaux['id'].'']['error'] == 0){
        if(!uploadAnimaux($_FILES[''.$animaux['id'].''], $animaux['id'])){
            header('Location: ./erreur.html');
        }else{ // affichage de la photo upload
            echo "changement effectués pour la photo de profil suivante ---->";
            echo "<br>";
            
            $req="SELECT * FROM animal WHERE id='$animalid'";
            $query=mysqli_query($connexion,$req);
            $fetchquery=mysqli_fetch_assoc($query);
            echo '<img src="./'.$fetchquery['pp_pic'].'" alt="photo de profil">';
            echo "<br>";
        }
    }else{
        echo '<input type="file" name="'.$animaux['id'].'">';
        echo '<label for="'.$animaux['id'].'">modifier la photo de votre '.$animaux['type'].' '.$animaux['description'].'</label>';
        echo "<br>";
        echo "<br>";
    }
}
echo "Modifiez ce que vous souhaitez puis appuyez sur valider --> ";
echo '<input type="submit" name="submit" value="valider">';
echo "</form>";

echo '<a href="../profil.php">retourner au profil</a>';
echo "</body>";
echo "</html>";

?>