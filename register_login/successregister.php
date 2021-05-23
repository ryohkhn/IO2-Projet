<?php

// Fonction affichant la page de réussite d'enregistrement

function successregister(){
    echo '<div class="success">';
    echo '<div>';
    echo '<h1>Inscription réussie !</h1>';
    echo '</div>';
    echo '<div class="divregisteranchor">';
    if(isset($_SESSION['page'])){
        echo '<a href="../'.$_SESSION['page'].'" class="successanchor">Retourner à mes occupations</a>';
    }
    else{
        echo '<a href="../accueil.php" class="successanchor">Aller à l\'accueil</a>';
    }
    echo '</div>';
    echo '</div>';
}

?>