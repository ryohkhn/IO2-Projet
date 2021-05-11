<?php

// fonction retournant true si l'utilisateur courant est un administrateur

function isAdmin(){
    $connexion=connect();
    $id=$_SESSION['id'];
    $req="SELECT * FROM administrators WHERE administrators_id='$id'";
    $query=mysqli_query($connexion,$req);
    $rows=mysqli_num_rows($query);
    
    if($rows==1){
        return true;
    }else{
        return false;
    }
}

// fonction retournant true si l'utilisateur en argument est un administrateur

function isAdminProfil($id){
    $connexion=connect();
    $req="SELECT * FROM administrators WHERE administrators_id='$id'";
    $query=mysqli_query($connexion,$req);
    $rows=mysqli_num_rows($query);
    
    if($rows==1){
        return true;
    }else{
        return false;
    }
}


?>