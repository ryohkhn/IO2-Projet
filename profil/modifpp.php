<?php
$test44="salut";
$id=$_SESSION['id'];
$request="SELECT * FROM profil WHERE profil_id='$id'";
$connexion=connect();
$result=mysqli_query($connexion,$request);
$profil=mysqli_fetch_assoc($result);
//fonction qui affiche un formulaire pour upload une photo de profil puis qui implemente la base de donnée de cette photo.
function modifpp(){
    
    echo '<form action="profil.php" method="GET" enctype="multipart/form-data">';
    if(!isset($_GET[$profil['id']])){
        echo '<input type="file" name="'.$profil['id'].'">';
        echo '<label for="'.$profil['id'].'">modifier la photo de votre profil</label>';
        echo "<br>";

    }
}

?>