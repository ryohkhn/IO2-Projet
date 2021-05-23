<?php

// fonction de connexion à la base de donnée

function connect(){
    $connexion = mysqli_connect ("localhost","root","","IO2_PROJET_GROUPE_1") ;
     
     if (!$connexion) {
         exit ;
     }

     mysqli_set_charset($connexion, "utf8");
     return $connexion;
}

?>