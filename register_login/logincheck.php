<?php

// fonction vérifiant les informations reçues en $_POST pour la connexion

function logincheck(){
    if(isset($_POST['nickname']) && isset($_POST['password'])){
        $connexion=connect();
        $nickname=htmlspecialchars($_POST['nickname']);
        $password=htmlspecialchars($_POST['password']);
        $nickname=mysqli_real_escape_string($connexion,$nickname);
        $password=mysqli_real_escape_string($connexion,$password);
        $password=hash('md5',$password);

        $query="SELECT * FROM users WHERE nickname='$nickname' AND password='$password'";
        $result=mysqli_query($connexion,$query);
        $rows=mysqli_num_rows($result);
        
        if($rows==1){
            sessionattribute($nickname);
            return true;
        }else{
            formloginfail();
            return false;
        }
    }
    else{
        formlogin();
        return false;
    }
}


?>