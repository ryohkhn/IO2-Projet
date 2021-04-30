<?php
$id=$_SESSION['id'];
$request="SELECT * FROM profil WHERE profil_id='$id'";
$connexion=connect();
$result=mysqli_query($connexion,$request);
$_SESSION['profil']=mysqli_fetch_array($result);
//fonction qui affiche un formulaire pour upload une photo de profil puis qui implemente la base de donnée de cette photo.
function modifpp(){
    echo '<form action="profil.php" method="POST" enctype="multipart/form-data">';
    $pratiq=$_SESSION['profil']['id'];
    if(!isset($_POST[''.$pratiq.''])){
        echo '<input type="file" name="'.$pratiq.'">';
        echo '<label for="'.$pratiq.'">modifier la photo de votre profil</label>';
        echo "<br>";
    }
}

?>