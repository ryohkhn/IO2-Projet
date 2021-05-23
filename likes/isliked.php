<?php

// fonction booléenne vérifiant si un post dont le numéro est en argument est déjà liké par l'utilisateur courant

function isLiked($publicationid){
    $connexion=connect();
    $id=$_SESSION['id'];
    $req="SELECT * FROM postlikes WHERE user_id='$id' AND publication_id='$publicationid'";
    $query=mysqli_query($connexion,$req);
    $rows=mysqli_num_rows($query);
    
    if($rows==1){
        return true;
    }else{
        return false;
    }
}


?>