<?php

function successlogin(){
    echo '<h2>Connexion réussie !</h2>';
    if(isset($_SESSION['page'])){
        echo '<a href="../'.$_SESSION['page'].'">Retourner à mes occupations</a>';
    }
    else{
        echo '<a href="../accueil.php">Aller à l\'accueil</a>';
    }
}


?>