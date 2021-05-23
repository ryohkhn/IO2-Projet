<?php

// fonction affichant les posts qui ont été signalés et les boutons permettant des les traiter

function reportedPostListing(){
    $connexion=connect();
    $query=mysqli_query($connexion,"SELECT * FROM reports ORDER BY id DESC");

    echo '<div class="splithomeright">';
    accueilheader("../accueil_fonction/searchresult.php");
    echo '<div>';

    while($fetch=mysqli_fetch_assoc($query)){
        $id=$fetch['reports_id'];
        $nickname=idreference($id);        

        $postid=$fetch['post_id'];
        $req2="SELECT * FROM post WHERE id='$postid'";
        $query2=mysqli_query($connexion,$req2);
        $fetch2=mysqli_fetch_assoc($query2);
        
        echo '<div class="posts">';
        echo '<div class="timelinepicname">';
        echo '<div>';
        echo '<p>Signalement de <a href="../profil.php?nickname='.$nickname.'" class="timelinenickname">@'.$nickname.'</a> de la publication de <a href="../profil.php?nickname='.nicknamepostidreference($fetch['post_id']).'" class="timelinenickname">@'.nicknamepostidreference($fetch['post_id']).'</a></p>';
        echo '</div>';
        echo '</div>';
        echo '<div>';
        echo '<div>';
        echo '<pre class="postdisplay">';
        echo postIdReference($fetch['post_id']);
        echo '</pre>';
        echo '</div>';
        if($fetch2['image_path']!=null){
            echo '<div>';
            echo '<img src="../'.$fetch2['image_path'].'" class="imagedisplay">';
            echo '</div>';
        }
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