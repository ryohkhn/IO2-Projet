<?php

// fonction la publication correspondant à l'id en argument

function postIdReference($postid){
    $connexion=connect();
    $query=mysqli_query($connexion,"SELECT publication FROM post WHERE id='$postid'");

    while($ligne=mysqli_fetch_assoc($query)){
        return $ligne['publication'];
    }
}


?>