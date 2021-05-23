<?php

// fonction d'affichage de toutes les publications des comptes que l'utilisateur courant suit, dont ses posts. Affichage du bouton de suppression et du compteur de likes

function timelinedisplay(){
    $connexion=connect();
    $id=$_SESSION['id'];
    $req="SELECT * FROM post WHERE post_id IN (SELECT followed_id FROM relationships WHERE follower_id='$id') ORDER BY id DESC LIMIT 15";
    $query=mysqli_query($connexion,$req);

    echo '<div class="splithomeright">';
    accueilheader("./accueil_fonction/searchresult.php");
    echo '<div>';

    postform(); //formulaire pour poster une publication

    while($fetch=mysqli_fetch_assoc($query)){
        $postid=$fetch['post_id'];
        $nickname=idreference($postid);

        $req2="SELECT * FROM profil WHERE profil_id='$postid'";
        $query2=mysqli_query($connexion,$req2);
        $fetchquery=mysqli_fetch_assoc($query2);
        

        echo '<div class="posts">';
        echo '<div class="timelinepicname">';
        echo '<div>';
        echo '<a href="./profil.php?nickname='.$nickname.'"><img src="./profil/'.$fetchquery['pp_pic'].'" alt="profil_pic" class="timelineprofilpic"></a>';
        echo '<div>';
        echo '<a href="./profil.php?nickname='.$nickname.'" class="timelinenickname">@'.$nickname.'</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<div>';
        echo '<div>';
        echo '<pre class="postdisplay">'.$fetch['publication'].'</pre>';
        echo '</div>';
        if($fetch['image_path']!=null){
            echo '<div>';
            echo '<img src="'.$fetch['image_path'].'" class="imagedisplay">';
            echo '</div>';
        }
        echo '</div>';
        echo '<div class="publicationbuttons">';

        // bouton de suppression

        if($fetch['post_id']==$id || isAdmin()){
            ?>
            <div class="buttoncontainer">
                <div>
                    <a href="./delete/deletepost.php?postid=<?php echo $fetch['id'] ?>" class="deletebuttonchild">
                        <i class="material-icons md-light">delete</i>
                    </a>
                </div>
                <div>
                    <p>Supprimer</p>
                </div>
            </div>
            <?php
        }

        // bouton de like/unlike
        ?>
        <div class="buttoncontainer">
            <div>
                <a href="./likes/like.php?postid=<?php echo $fetch['id'] ?>" class="likebuttonchild">
                    <i class="material-icons md-light">favorite</i>
                </a>
            </div>
            <div>
                <p><?php echo $fetch['likescount']; ?></p>
            </div>
        </div>

        <?php

        // bouton de signalement

        if(!isReported($fetch['id'])){
            ?>
            <div class="buttoncontainer">
                <div>
                    <a href="./reports/reportpost.php?postid=<?php echo $fetch['id'] ?>" class="reportbuttonchild">
                        <i class="material-icons md-light">report_problem</i>
                    </a>
                </div>
                <div>
                    <p>Signaler</p>
                </div>
            </div>
            <?php
        }
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
}


?>