<?php

// fonction affichant les posts qui ont été signalés et les boutons permettant des les traiter

function reportedPostListing(){
    $connexion=connect();
    $query=mysqli_query($connexion,"SELECT * FROM reports");

    while($fetch=mysqli_fetch_assoc($query)){
        $postid=$fetch['reports_id'];
        $nickname=idreference($postid);        
        echo '<div>';
        echo '<div>';
        echo '<span>Signalement de @'.$nickname.' de la publication de @'.nicknamepostidreference($fetch['post_id']).'</span>';
        echo '</div>';
        echo '<div>';
        echo '<p>';
        echo postIdReference($fetch['post_id']);
        echo '</p>';
        echo '</div>';
        echo '<div>';

        // bouton pour supprimer la publication

        echo '<button id="deletebutton'.$fetch['id'].'">Supprimer la publication</button>';
        echo '<script>';
        echo 'var btn = document.getElementById("deletebutton'.$fetch['id'].'");';
        echo "btn.addEventListener('click', function() {";
        echo "document.location.href = './deletereportedpost.php?postid=";
        echo $fetch['post_id'];
        echo "';";
        echo '});';
        echo '</script>';

        // bouton pour ignorer le signalement

        echo '<button id="ignorebutton'.$fetch['id'].'">Ignorer le signalement</button>';
        echo '<script>';
        echo 'var btn = document.getElementById("ignorebutton'.$fetch['id'].'");';
        echo "btn.addEventListener('click', function() {";
        echo "document.location.href = './ignorereportedpost.php?postid=";
        echo $fetch['post_id'];
        echo "';";
        echo '});';
        echo '</script>';
        echo '</div>';
        echo '</div>';
    }
}

?>