<?php

// fonction d'affichage de toutes les publications des comptes que l'utilisateur courant suit, dont ses post. Affichage du bouton de suppression et du compteur de likes

function timelinedisplay(){
    $connexion=connect();
    $id=$_SESSION['id'];
    $req="SELECT * FROM post WHERE post_id IN (SELECT followed_id FROM relationships WHERE follower_id='$id') ORDER BY id DESC";
    $query=mysqli_query($connexion,$req);
    
    while($fetch=mysqli_fetch_assoc($query)){
        $postid=$fetch['post_id'];
        $nickname=idreference($postid);
        echo '<div class="posts">';
        echo '<div>';
        echo '<span>@'.$nickname.'</span>';
        echo '</div>';
        echo '<div>';
        echo '<p>';
        echo $fetch['publication'];
        echo '</p>';
        echo '</div>';
        echo '<div>';

        // bouton de suppression

        if($fetch['post_id']==$id || isAdmin()){
            echo '<button id="deletebutton'.$fetch['id'].'">Supprimer</button>';
            echo '<script>';
            echo 'var btn = document.getElementById("deletebutton'.$fetch['id'].'");';
            echo "btn.addEventListener('click', function() {";
            echo "document.location.href = './delete/deletepost.php?postid=";
            echo $fetch['id'];
            echo "';";
            echo '});';
            echo '</script>';
        }

        // bouton de like/unlike

        echo '<button id="likebutton'.$fetch['id'].'">Like</button>';
        echo '<script>';
        echo 'var btn = document.getElementById("likebutton'.$fetch['id'].'");';
        echo "btn.addEventListener('click', function() {";
        echo "document.location.href = './likes/like.php?postid=";
        echo $fetch['id'];
        echo "';";
        echo '});';
        echo '</script>';
        echo $fetch['likescount'];

        // bouton de signalement

        if(isReported($fetch['id'])){
            echo '</div>';
            echo '<div>';
            echo '<p>Publication signalée, en cours de vérification.</p>';
            echo '</div>';
        }
        else{
            echo '<button id="reportbutton'.$fetch['id'].'">Signaler</button>';
            echo '<script>';
            echo 'var btn = document.getElementById("reportbutton'.$fetch['id'].'");';
            echo "btn.addEventListener('click', function() {";
            echo "document.location.href = './reports/reportpost.php?postid=";
            echo $fetch['id'];
            echo "';";
            echo '});';
            echo '</script>';
        }
        echo '</div>';
        echo '</div>';
    }
}


?>