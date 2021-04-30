<?php
session_start();
require_once "../connexion_db/connexion.php";
require_once "../sessionattribute.php";
require_once "upload.php";
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
if(isset($_POST['pp'])){
    $b=$_POST['pp'];
    echo '<input type="file" name="pp" value="'.$b.'">';
}else{
    echo '<input type="file" name="pp">';
}

echo '<label for="pp">modifier la photo de votre profil</label>';
if(!empty($_POST['pp'])){
    echo "ça marche";
    upload($_POST['pp']);
    
}
echo "<br>";
echo "<br>";
$id=$_SESSION['id'];
$request="SELECT * FROM animal WHERE animal_id='$id'";
$connexion=connect();
$result=mysqli_query($connexion,$request);
while($animaux=mysqli_fetch_assoc($result)){
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