<?php

// fonction ajoutant dans la base de donnée la publication de l'utilisateur

function publicationcheck(){
    if(isset($_POST['publication'])){
        $connexion=connect();
        $publication=$_POST['publication'];
        $publication=htmlspecialchars($publication);
        $publication=mysqli_real_escape_string($connexion,$publication);
        $id=$_SESSION['id'];
        $req="INSERT INTO post(publication,post_id) VALUES ('$publication','$id')";
        mysqli_query($connexion,$req);
        header('Location: ./accueil.php?success=true');
    }
}





?>