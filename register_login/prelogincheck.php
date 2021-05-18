<?php

// fonction vérifiant que le premier formulaire a été envoyé pour enlever le header

function prelogincheck(){
    if(isset($_POST['nickname']) && isset($_POST['password'])){
        return true;
    }
    else{
        return false;
    }
}

?>