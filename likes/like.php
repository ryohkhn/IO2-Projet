<?php
session_start();

require_once "../connexion_db/connexion.php";
require_once "./isliked.php";

// fonction augmentant/reduisant le nombre de likes

if(isset($_GET['postid'])){    
    $connexion=connect();
    $id=$_SESSION['id'];
    $publication_id=$_GET['postid'];

    // récupération du nombre de likes du post
    
    $req="SELECT likescount FROM post WHERE id='$publication_id'";
    $query=mysqli_query($connexion,$req);
    $row=mysqli_fetch_array($query);
    $likescount=$row['likescount'];
    $likescountadd=$likescount+1;
    $likescountremove=$likescount-1;

    if(isLiked($publication_id)){
        mysqli_query($connexion,"DELETE FROM postlikes WHERE user_id='$id' AND publication_id='$publication_id'");
        mysqli_query($connexion,"UPDATE post SET likescount='$likescountremove' WHERE id='$publication_id'");
    }
    else{
        mysqli_query($connexion,"INSERT INTO postlikes(user_id,publication_id) VALUES ('$id','$publication_id')");
        mysqli_query($connexion,"UPDATE post SET likescount='$likescountadd' WHERE id='$publication_id'");
    }
}

// renvoi sur la page correspondant à la page d'appel de la fonction

if(isset($_GET['profil'])){
    header('Location: ../profil.php?nickname='.$_GET['profil'].'');
}else{
    header('Location: ../accueil.php');
}

?>