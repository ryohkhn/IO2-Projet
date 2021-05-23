<?php

// fonction booléenne de vérification de connexion via les variables de session

function accountcheck(){
    if(isset($_SESSION['nickname']) && isset($_SESSION['id'])){
        return true;
    }else{
        return false;
    }
}

?>