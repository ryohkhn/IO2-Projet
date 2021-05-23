<?php

// fonction de connexion à la base de donnée

function connect(){
    $connexion = mysqli_connect ("localhost","root","","io2_projet") ;
     
     if (!$connexion) {
         exit ;
     }

     mysqli_set_charset($connexion, "utf8");
     return $connexion;
}

?>