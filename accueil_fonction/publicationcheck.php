<?php

// fonction ajoutant dans la base de donnée la publication de l'utilisateur

function publicationcheck(){
    

    $connexion=connect();
    $id=$_SESSION['id'];


    if(isset($_POST['publication']) and !empty($_FILES['photo_post']['tmp_name'])){
        //cas oui il y a une description et une image
        $publication=$_POST['publication'];
        $publication=htmlspecialchars($publication);
        $publication=mysqli_real_escape_string($connexion,$publication);

        $req="INSERT INTO post(publication,post_id) VALUES ('$publication','$id');";
        mysqli_query($connexion,$req);

        $req="SELECT * FROM post ORDER BY id DESC";
        $query=mysqli_query($connexion,$req);
        $result=mysqli_fetch_assoc($query);

        $idlastpost=$result['id'];

        $name= $idlastpost . "POST" . $_FILES['photo_post']['name']; // pour eviter que deux images aient le même nom et que le nom de l'image soit une commande
        $upload = "accueil_fonction/postimage/";
        $chemin = $upload . $name;
        $fileType = pathinfo($chemin,PATHINFO_EXTENSION);
        $allowTypes = array('jpg','png','jpeg');
        if(in_array($fileType, $allowTypes)){
            if(move_uploaded_file($_FILES['photo_post']['tmp_name'], "$chemin")){ 
                $req="UPDATE post SET image_path='$chemin' WHERE id='$idlastpost';";
                mysqli_query($connexion,$req);
                header('Location: ./accueil.php?success=true');
            }else{
               header('Location: accueil_fonction/erreurPubli.php');
            }
        }else{
            header('Location: accueil_fonction/erreurPubli.php');
        }
    }




    if(isset($_POST['publication']) and empty($_FILES['photo_post']['name'])){
        //cas ou il y a une description sans image
        $publication=$_POST['publication'];
        $publication=htmlspecialchars($publication);
        $publication=mysqli_real_escape_string($connexion,$publication);

        $req="INSERT INTO post(publication,post_id) VALUES ('$publication','$id')";
        mysqli_query($connexion,$req);
        header('Location: ./accueil.php?success=true');
    }
}





?>