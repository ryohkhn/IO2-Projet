<?php
session_start();

require_once "../connexion_db/connexion.php";
require_once "./isfollowing.php";

if(isset($_GET['followed_id'])){
    $connexion=connect();
    $follower_id=$_SESSION['id'];
    $followed_id=$_GET['followed_id'];
    if(isFollowing($_SESSION['id'],$_GET['followed_id'])){
        $req="DELETE FROM relationships WHERE follower_id='$follower_id' AND followed_id='$followed_id'";
        mysqli_query($connexion,$req);
    }else{
        $req="INSERT INTO relationships(follower_id,followed_id) VALUES('$follower_id','$followed_id')";
        mysqli_query($connexion,$req);
    }
    $req2="SELECT nickname FROM users WHERE id='$followed_id'";
    $query=mysqli_query($connexion,$req2);
    while($ligne=mysqli_fetch_assoc($query)){
        $nicknamefollowed=$ligne['nickname'];
    }
    header('Location: ../profil.php?nickname='.$nicknamefollowed.'');
    exit;
}else{
    header('Location: ../accueil.php');
    exit;
}


?>