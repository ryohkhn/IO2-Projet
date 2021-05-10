<?php

// fonction d'affichage de toutes les publications des comptes que l'utilisateur courant suit, dont ses post. Affichage du bouton et du compteur de likes

function timelinedisplay(){
    $connexion=connect();
    $id=$_SESSION['id'];
    $req="SELECT * FROM post WHERE post_id IN (SELECT followed_id FROM relationships WHERE follower_id='$id') ORDER BY id DESC";
    $query=mysqli_query($connexion,$req);
    
    while($fetch=mysqli_fetch_assoc($query)){
        $postid=$fetch['post_id'];
        $nickname=idreference($postid);
        echo '<div>';
        echo '@'.$nickname;
        echo '<p>';
        echo $fetch['publication'];
        echo '</p>';
        echo '</div>';
        echo '<div>';
        if($fetch['post_id']==$id || isAdmin()){
            echo '<button id="deletebutton'.$fetch['id'].'">Supprimer</button>';
            echo '<script>';
            echo 'var btn = document.getElementById("deletebutton'.$fetch['id'].'");';
            echo "btn.addEventListener('click', function() {";
            echo "document.location.href = './accueil_fonction/deletepost.php?postid=";
            echo $fetch['id'];
            echo "';";
            echo '});';
            echo '</script>';
        }
        echo '<button id="likebutton'.$fetch['id'].'">Like</button>';
        echo '<script>';
        echo 'var btn = document.getElementById("likebutton'.$fetch['id'].'");';
        echo "btn.addEventListener('click', function() {";
        echo "document.location.href = './accueil_fonction/like.php?postid=";
        echo $fetch['id'];
        echo "';";
        echo '});';
        echo '</script>';
        echo $fetch['likescount'];
        echo '</div>';
    }
}


?>