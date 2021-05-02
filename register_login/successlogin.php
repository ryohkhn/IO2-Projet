<?php

function successlogin(){
    echo '<h2>Connexion réussie !</h2>';
    echo '<a href="../'.$_SESSION['page'].'">Retourner à mes occupations</a>';
}


?>