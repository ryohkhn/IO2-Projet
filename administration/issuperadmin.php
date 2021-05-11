<?php

// fonction retournant true si l'utilisateur courant est un superadmin (l'admin ne pourra pas enlever les droits au superadmin, contrairement au super admin qui a tous les droits)

function isSuperAdmin(){
    $connexion=connect();
    $id=$_SESSION['id'];
    $req="SELECT * FROM administrators WHERE administrators_id='$id' AND super='1'";
    $query=mysqli_query($connexion,$req);
    $rows=mysqli_num_rows($query);
    
    if($rows==1){
        return true;
    }else{
        return false;
    }
}

// fonction retournant true si l'utilisateur en argument est un superadmin (l'admin ne pourra pas enlever les droits au superadmin, contrairement au super admin qui a tous les droits)

function isSuperAdminProfil($id){
    $connexion=connect();
    $req="SELECT * FROM administrators WHERE administrators_id='$id' AND super='1'";
    $query=mysqli_query($connexion,$req);
    $rows=mysqli_num_rows($query);
    
    if($rows==1){
        return true;
    }else{
        return false;
    }
}

?>