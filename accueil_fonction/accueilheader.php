<?php

// fonction affichant le header avec un bouton home, une barre de recherche et un bouton de déconnexion

function accueilheader(){
    echo '<header>';
    echo '<div>';
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
    echo '</div>';
    echo '</header>';
    if(isAdmin()){
      echo '<div id="adminline">';
      if(isSuperAdmin()){
        echo 'Compte super administrateur';
      }else{
        echo 'Compte administrateur';
      }
      $connexion=connect();
      $query=mysqli_query($connexion,"SELECT * FROM reports");
      $rows=mysqli_num_rows($query);
      if($rows!=0){
        echo '<button id="adminreports">Nouveaux signalements</button>';
      }
      else{
        echo '<button id="adminreports">Aucun signalement</button>';
      }
      echo '<script>';
        echo "var btn = document.getElementById('adminreports');";
        echo "btn.addEventListener('click', function() {";
          echo "document.location.href = './reports/adminreports.php';";
        echo '});';
      echo '</script>';
      echo '</div>';
    }
}

?>