<?php

function profilheader(){
  echo '<header>';
  echo '<button id="home">Home</button>';
  echo '<script>';
  echo "var btn = document.getElementById('home');";
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