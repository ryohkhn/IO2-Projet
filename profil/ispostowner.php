<?php

// fonction retournant true si l'auteur du post en argument est bien l'utilisateur courant

function isPostOwner($postid){
    $connexion=connect();
    $id=$_SESSION['id'];
    $req="SELECT * FROM post WHERE id='$postid' and post_id='$id'";
    $query=mysqli_query($connexion,$req);
    $rows=mysqli_num_rows($query);
    
    if($rows==1){
        return true;
    }else{
        return false;
    }
    
}

?>