<?php

function sessionattribute($nickname){
    $connexion=connect();
    $req="SELECT id FROM users WHERE nickname='$nickname'";
    $query=mysqli_query($connexion,$req);
    $fetchquery=mysqli_fetch_assoc($query);
    $id=$fetchquery['id'];
    $_SESSION['id']=$id;
    $_SESSION['nickname']=$nickname;
    $req2="SELECT * FROM profil WHERE profil_id='$id'";
    $query2=mysqli_query($connexion,$req2);
    $_SESSION['profil']=mysqli_fetch_assoc($query2);
}

?>