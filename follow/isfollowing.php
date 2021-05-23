<?php

// fonction booléenne vérifiant si un utilisateur suit un autre utilisateur

function isFollowing($follower,$followed){
    $connexion=connect();
    $req="SELECT * FROM relationships WHERE follower_id='$follower' AND followed_id='$followed'";
    $query=mysqli_query($connexion,$req);
    $rows=mysqli_num_rows($query);
    
    if($rows==1){
        return true;
    }else{
        return false;
    }
}


?>