<?php

function accueilheader(){
    echo '<header>';
    echo '<button id="myBtn">Home</button>';
      echo '<script>';
        echo "var btn = document.getElementById('myBtn');";
        echo "btn.addEventListener('click', function() {";
          echo "document.location.href = './accueil.php';";
        echo '});';
      echo '</script>';
    echo '<form action="./accueil_fonction/searchresult.php" method="post">';
    echo '<input type="search" name="search" required>';
    echo '</form>';
    echo '<a href="./accueil_fonction/logout.php">Déconnexion</a>';
    echo '</header>';
}

?>