<?php

// fonction dans le cas ou il n'y a aucun signalement à traiter

function noReports(){
    $connexion=connect();
    $query=mysqli_query($connexion,"SELECT * FROM reports");
    $rows=mysqli_num_rows($query);

    echo '<h2>Page des signalements</h1>';

    if($rows==0){
        echo '<div>';
        echo '<p>Il n\'y a aucun signalement à traiter</p>';
        echo '</div>';
        exit;
    }   
}

?>