<?php
function usersprofilsearched($nickname){
    $connexion=connect();
    
    //  Redirection dans la page profil sans le get si jamais l'utilisateur a cherché son compte dans la barre de recherche

    if($nickname==$_SESSION['nickname']){
        header('Location: ./profil.php');
        exit;
    }
    

    // Traitement du cas ou l'utilisateur essaye de visualiser un compte n'existant pas

    $req="SELECT * FROM users WHERE nickname='$nickname'";
    $query=mysqli_query($connexion,$req);
    $rows=mysqli_num_rows($query);
    
    if($rows!=1){
        echo '<h3>Ce compte n\'existe pas</h3>';
        exit;
    }

    
    // Stockage de l'id du compte visité pour les requêtes suivantes

    while($users=mysqli_fetch_assoc($query)){
        $id=$users['id'];
    }
    echo '<div class="container_profil">';

    echo '<div class="profilAffichage">';


    // Bouton de follow/unfollow

    echo '<div class="button_right_username">';

    echo '<div>';
    echo '@'.$nickname.'';
    echo '</div>';

    echo '<div class="button_style">';
    echo"<span>";
    if(isFollowing($_SESSION['id'],$id)){
        echo '<a class="link_style" href="./follow/follow.php?followed_id='.$id.'">Unfollow</a>';
    }else{
        echo '<a class="link_style" href="./follow/follow.php?followed_id='.$id.'">Follow</a>';
    }
    echo"</span>";



    // Bouton pour ajouter des administrateurs si l'utilisateur courant est lui même administrateur et pour les supprimer si l'utilisateur courant est un super administrateur
    echo"<span>";
    if(isAdmin()){
        if(!isAdminProfil($id)){
            echo '<a class="link_style" href="./administration/adminmodification.php?id='.$id.'&profil='.$nickname.'"> Donner les droits administrateurs</a>';
        }
        else{
            echo '<a class="link_style" href="./administration/adminmodification.php?id='.$id.'&profil='.$nickname.'"> Supprimer les droits administrateurs</a>';
        }
    }
    echo"</span>";

    echo '</div>';
    
    echo '</div>';


    if(isset($_GET['adminerror'])){
        echo '<div>';
        echo '<p>Vous ne pouvez pas retirer les droits administrateurs de ce compte</p>';
        echo '</div>';
    }


    // affichage informations utilisateur
    $connexion=connect();
    $req="SELECT * FROM profil WHERE profil_id='$id'";
    $query=mysqli_query($connexion,$req);
    $fetchquery=mysqli_fetch_assoc($query);

    echo '<div class="profil_info">';
    echo '<div>';
    echo '<img src="./profil/'.$fetchquery['pp_pic'].'" class="profilpic" alt="photo de profil">';
    echo "</div>";
    echo '<div>';
    echo "<pre>";
    echo $fetchquery['description'];
    echo "</pre>";
    echo "</div>";
    echo '</div>';

    // affichage informations des animaux utilisateur
    $connexion=connect();
    $req="SELECT * FROM animal WHERE animal_id='$id'";
    $query=mysqli_query($connexion,$req);

    while($fetchquery=mysqli_fetch_assoc($query)){

        echo '<div class="profil_info">';
        echo '<div>';
        echo '<img src="./profil/'.$fetchquery['pp_pic'].'" class="profilpic" alt="photo de profil animal">';
        echo "</div>";
        echo '<div>';
        echo "<pre>";
        echo $fetchquery['description'];
        echo "</pre>";
        echo "</div>";
        echo '</div>';

    }
    ?>
    <div class="homeinfo">
        <div>
            <p>
            <?php 
            $query=mysqli_query($connexion,"SELECT * FROM relationships WHERE followed_id='$id'");
            $fetchquery=mysqli_num_rows($query);
            echo $fetchquery;
            ?>
            </p>
            <p>Followers</p>
        </div>
        <div>
        <p>
            <?php 
            $query=mysqli_query($connexion,"SELECT * FROM post WHERE post_id='$id'");
            $fetchquery=mysqli_num_rows($query);
            echo $fetchquery;
            ?>
            </p>
            <p>Posts</p>
        </div>
        <div>
            <p>
            <?php 
            $query=mysqli_query($connexion,"SELECT * FROM relationships WHERE follower_id='$id'");
            $fetchquery=mysqli_num_rows($query);
            echo $fetchquery;
            ?>
            </p>
            <p>Following</p>
        </div>
    </div>

    <?php
    echo "</div>";

    
    $req="SELECT pp_pic FROM profil WHERE id=$id";
    $query=mysqli_query($connexion,$req);
    $pp_pic=mysqli_fetch_assoc($query);

    $req3="SELECT * FROM post WHERE post_id='$id' ORDER BY id DESC";
    $query3=mysqli_query($connexion,$req3);
    echo '<div id="divposts">';
    while($ligne=mysqli_fetch_assoc($query3)){

        echo '<div class="posts">';
        echo '<div class="timelinepicname">';
        echo '<div>';
        echo '<a href="./profil.php?nickname='.$nickname.'"><img src="profil/'.$pp_pic['pp_pic'].'" alt="profil_pic" class="timelineprofilpic"></a>';
        echo '<div>';
        echo '<a href="./profil.php?nickname='.$nickname.'" class="timelinenickname">@'.$nickname.'</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<div>';
        echo '<pre class="postdisplay">'.$ligne['publication'].'</pre>';
        if($ligne['image_path']!=null){
            echo '<img src="'.$ligne['image_path'].'" class="imagedisplay">';
        }
        echo '</div>';

        echo '<div class="publicationbuttons">';

        // bouton de suppression

        if(isAdmin()){
            ?>
            <div class="buttoncontainer">
                <div>
                    <a href="./delete/deletepost.php?postid=<?php echo $ligne['id'] ?>&profil=<?php echo $nickname;?>" class="deletebuttonchild">
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
                <a href="./likes/like.php?postid=<?php echo $ligne['id'] ?>&profil=<?php echo $nickname;?>" class="likebuttonchild">
                    <i class="material-icons md-light">favorite</i>
                </a>
            </div>
            <div>
                <p><?php echo $ligne['likescount']; ?></p>
            </div>
        </div>
        <?php

        if(!isReported($ligne['id'])){
            ?>
            <div class="buttoncontainer">
                <div>
                    <a href="./reports/reportpost.php?postid=<?php echo $ligne['id'] ?>&profil=<?php echo $nickname;?>" class="reportbuttonchild">
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
    echo "</div>";
}











// fonction pour l'utilisateur courant

function usersprofil(){

    $id=$_SESSION['id'];
    $nickname=$_SESSION['nickname'];

    echo '<div class="container_profil">';

    echo '<div class="profilAffichage">';

    echo '<div class="container_modif">';
    echo '<div>';
    echo "@$nickname";
    echo "</div>";
    echo "<div>";
    echo '<a href="./profil/modif_profil.php" class="editbuttonchild" ><i class="material-icons">edit</i></a>'; //affichage bouton modifier son profil
    echo "</div>";
    echo "</div>";

    
    // affichage informations utilisateur
    $connexion=connect();
    $req="SELECT * FROM profil WHERE profil_id='$id'";
    $query=mysqli_query($connexion,$req);
    $fetchquery=mysqli_fetch_assoc($query);

    echo '<div class="profil_info">';
    echo '<div>';
    echo '<img src="./profil/'.$fetchquery['pp_pic'].'" class="profilpic" alt="photo de profil">';
    echo "</div>";
    echo '<div>';
    echo "<pre>";
    echo $fetchquery['description'];
    echo "</pre>";
    echo "</div>";
    echo '</div>';

    // affichage informations des animaux utilisateur
    $connexion=connect();
    $req="SELECT * FROM animal WHERE animal_id='$id'";
    $query=mysqli_query($connexion,$req);

    while($fetchquery=mysqli_fetch_assoc($query)){

        echo '<div class="profil_info">';
        echo '<div>';
        echo '<img src="./profil/'.$fetchquery['pp_pic'].'" class="profilpic" alt="photo de profil animal">';
        echo "</div>";
        echo '<div>';
        echo "<pre>";
        echo $fetchquery['description'];
        echo "</pre>";
        echo "</div>";
        echo '</div>';

    }
    ?>
    <div class="homeinfo">
        <div>
            <p>
            <?php 
            $query=mysqli_query($connexion,"SELECT * FROM relationships WHERE followed_id='$id'");
            $fetchquery=mysqli_num_rows($query);
            echo $fetchquery;
            ?>
            </p>
            <p>Followers</p>
        </div>
        <div>
        <p>
            <?php 
            $query=mysqli_query($connexion,"SELECT * FROM post WHERE post_id='$id'");
            $fetchquery=mysqli_num_rows($query);
            echo $fetchquery;
            ?>
            </p>
            <p>Posts</p>
        </div>
        <div>
            <p>
            <?php 
            $query=mysqli_query($connexion,"SELECT * FROM relationships WHERE follower_id='$id'");
            $fetchquery=mysqli_num_rows($query);
            echo $fetchquery;
            ?>
            </p>
            <p>Following</p>
        </div>
    </div>

    <?php
    echo "</div>";

    
    $req="SELECT pp_pic FROM profil WHERE id=$id";
    $query=mysqli_query($connexion,$req);
    $pp_pic=mysqli_fetch_assoc($query);

    $req3="SELECT * FROM post WHERE post_id='$id' ORDER BY id DESC";
    $query3=mysqli_query($connexion,$req3);
    echo '<div id="divposts">';
    while($ligne=mysqli_fetch_assoc($query3)){

        echo '<div class="posts">';
        echo '<div class="timelinepicname">';
        echo '<div>';
        echo '<a href="./profil.php?nickname='.$nickname.'"><img src="profil/'.$pp_pic['pp_pic'].'" alt="profil_pic" class="timelineprofilpic"></a>';
        echo '<div>';
        echo '<a href="./profil.php?nickname='.$nickname.'" class="timelinenickname">@'.$nickname.'</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<div>';
        echo '<pre class="postdisplay">'.$ligne['publication'].'</pre>';
        if($ligne['image_path']!=null){
            echo '<img src="'.$ligne['image_path'].'" class="imagedisplay">';
        }
        echo '</div>';

        echo '<div class="publicationbuttons">';

        // bouton de suppression

        if($ligne['post_id']==$id || isAdmin()){
            ?>
            <div class="buttoncontainer">
                <div>
                    <a href="./delete/deletepost.php?postid=<?php echo $ligne['id'] ?>&profil=<?php echo $nickname;?>" class="deletebuttonchild">
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
                <a href="./likes/like.php?postid=<?php echo $ligne['id'] ?>&profil=<?php echo $nickname;?>" class="likebuttonchild">
                    <i class="material-icons md-light">favorite</i>
                </a>
            </div>
            <div>
                <p><?php echo $ligne['likescount']; ?></p>
            </div>
        </div>
        <?php
        echo '</div>';
        echo '</div>';
    }
    echo "</div>";
}

?>