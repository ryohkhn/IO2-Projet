<?php
//fonction qui affiche un formulaire pour upload une photo de profil d'un animal puis qui implemente la base de donnée de cette photo.
function modifppanimaux(){
    $id=$_SESSION['id'];
    $request="SELECT * FROM animal WHERE animal_id='$id'";
    $connexion=connect();
    $result=mysqli_query($connexion,$request);
    while($animaux=mysqli_fetch_assoc($result)){
        echo '<input type="file" name="'.$animaux['id'].'">';
        echo '<label for="'.$animaux['id'].'">modifier la photo de votre '.$animaux['type'].' '.$animaux['description'].'</label>';
        echo "<br>";
        echo "<br>";
    }
    
}


?>