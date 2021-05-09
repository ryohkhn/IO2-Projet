<?php

// fonction retournant le nom de compte correspondant à un id

function idreference($id){
    $connexion=connect();
    $req="SELECT nickname FROM users WHERE id='$id'";
    $query=mysqli_query($connexion,$req);

    while($fetch=mysqli_fetch_assoc($query)){
        return $fetch['nickname'];
    }
}



?>