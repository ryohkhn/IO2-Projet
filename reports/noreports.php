<?php

// fonction affichant un message dans le cas ou il n'y a aucun signalement à traiter

function noReports(){
    $connexion=connect();
    $query=mysqli_query($connexion,"SELECT * FROM reports");
    $rows=mysqli_num_rows($query);

    if($rows==0){
        echo '<div class="splithomeright">';
        echo '<div>';
        echo '<h3>Il n\'y a aucun signalement à traiter</h3>';
        echo '</div>';
        echo '</div>';
        exit;
    }   
}

?>