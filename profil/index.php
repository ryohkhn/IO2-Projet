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
$co=connect();
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<title></title>";
echo "</head>";
echo "<body>";
echo '<form action="" method="post" enctype="multipart/form-data">';
echo "Modifiez ce que vous souhaitez puis appuyez sur valider :";
echo "<br>";
echo '<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />';
echo '<input type="file" name="pp">';

echo '<label for="pp">modifier la photo de votre profil</label>';
if(!empty($_FILES['pp']['name']) AND $_FILES['pp']['error'] == 0){
    if(!upload($_FILES['pp'])){
        header('Location: http://localhost/GitHub/IO2-Projet/profil/erreur.html');
    }
}
    
echo "<br>";
echo "<br>";
$id=$_SESSION['id'];
$request="SELECT * FROM animal WHERE animal_id='$id'";
$connexion=connect();
$result=mysqli_query($connexion,$request);
while($animaux=mysqli_fetch_assoc($result)){
    if(!empty($_FILES[''.$animaux['id'].'']['name']) AND $_FILES[''.$animaux['id'].'']['error'] == 0){
        if(!uploadAnimaux($_FILES[''.$animaux['id'].''], $animaux['id'])){
            header('Location: http://localhost/GitHub/IO2-Projet/profil/erreur.html');
        }
    }
    echo '<input type="file" name="'.$animaux['id'].'">';
    echo 'modifier la photo de votre '.$animaux['type'].' '.$animaux['description'].'';
    echo "<br>";
    echo "<br>";
    
}

echo '<input type="submit" name="submit" value="valider">';
echo "</form>";
echo '<a href="http://localhost/GitHub/IO2-Projet/profil.php">retourner au profil</a>';
echo "</body>";
echo "</html>";
?>