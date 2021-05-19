<?php

function profilheader(){
  echo '<header>';
  echo '<a href="./accueil.php">Accueil</a>';
  echo '<form action="./accueil_fonction/searchresult.php" method="post">';
  echo '<input type="search" name="search" required>';
  echo '</form>';
  echo '<a href="./accueil_fonction/logout.php">Déconnexion</a>';
  echo '</header>';
}




?>