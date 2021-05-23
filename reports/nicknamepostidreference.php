<?php

// fonction retournant le nom de l'utilisateur correspond à la publication en argument

function nicknamePostIdReference($postid){
    $connexion=connect();
    $query=mysqli_query($connexion,"SELECT nickname FROM users WHERE id=(SELECT post_id FROM post WHERE id='$postid')");

    while($ligne=mysqli_fetch_assoc($query)){
        return $ligne['nickname'];
    }
}


?>