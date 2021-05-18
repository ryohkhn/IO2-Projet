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

    // Bouton de follow/unfollow

    echo '<div id="divusers">';
    echo '@'.$nickname.'';

    if(isFollowing($_SESSION['id'],$id)){
        echo '<button id="followbutton">Unfollow</button>';
    }else{
        echo '<button id="followbutton">Follow</button>';
    }
    echo '<script>';
    echo "var btn = document.getElementById('followbutton');";
    echo "btn.addEventListener('click', function() {";
    echo "document.location.href = './follow/follow.php?followed_id=";
    echo $id;
    echo "';";
    echo '});';
    echo '</script>';
    echo '</div>';

    // Bouton pour ajouter des administrateurs si l'utilisateur courant est lui même administrateur et pour les supprimer si l'utilisateur courant est un super administrateur

    if(isAdmin()){
        if(!isAdminProfil($id)){
            echo '<div>';
            echo '<button id="adminbutton">Donner les droits administrateurs</button>';
        }
        else{
            echo '<div>';
            echo '<button id="adminbutton">Supprimer les droits administrateurs</button>';
        }
        echo '<script>';
        echo "var btn = document.getElementById('adminbutton');";
        echo "btn.addEventListener('click', function() {";
        echo "document.location.href = './administration/adminmodification.php?id=";
        echo $id;
        echo "&profil=";
        echo $nickname;
        echo "';";
        echo '});';
        echo '</script>';
        echo '</div>';
    }
    if(isset($_GET['adminerror'])){
        echo '<div>';
        echo '<p>Vous ne pouvez pas retirer les droits administrateurs de ce compte</p>';
        echo '</div>';
    }

    // Affichage de la description du compte
 
    $req2="SELECT * FROM profil where profil_id=$id";
    $query2=mysqli_query($connexion,$req2);
    while($ligne=mysqli_fetch_assoc($query2)){
        echo '<div>';
        echo '<p>';
        echo $ligne['description'];
        echo '</p>';
        if(isPPset($id)){
            echo '<img src="profil/'.$ligne['pp_pic'].'">';
        }else{
            echo "cet utilisateur n'a pas de photo de profil :/";
        }
        echo '</div>';
    }

    // affichage des animaux du compte 

    $req="SELECT * FROM animal WHERE animal_id='$id'";
    $query=mysqli_query($connexion,$req);
    while($fetchquery=mysqli_fetch_assoc($query)){
            
        if(isPPsetAnimaux($fetchquery['id'])){
            echo '<img src="profil/'.$fetchquery['pp_pic'].'">';
        }else{
            echo "cet Animal n'a pas de photo de profil :/";
        }
        echo "<br>";
        echo $fetchquery['description'];
        echo "<br>";
        echo "<br>";
    }

    // Affichage des posts du compte

    $req3="SELECT * FROM post WHERE post_id='$id' ORDER BY id DESC";
    $query3=mysqli_query($connexion,$req3);
    echo '<div id="divposts">';
    while($ligne=mysqli_fetch_assoc($query3)){
        echo '<div>';
        echo '<div>';
        echo '<span>';
        echo '@'.$nickname;
        echo '</span>';
        echo '</div>';
        echo '<div>';
        echo '<p>';
        echo $ligne['publication'];
        echo '<img src="'.$ligne['image_path'].'">';
        echo '</p>';
        echo '</div>';

        // ajoute le bouton de suppression sur la page de profil pour les administrateurs
        echo '<div>';
        if(isAdmin()){
            echo '<button id="deletebutton'.$ligne['id'].'">Supprimer</button>';
            echo '<script>';
            echo 'var btn = document.getElementById("deletebutton'.$ligne['id'].'");';
            echo "btn.addEventListener('click', function() {";
            echo "document.location.href = './delete/deletepost.php?postid=";
            echo $ligne['id'];
            echo "&profil=";
            echo $nickname;
            echo "';";
            echo '});';
            echo '</script>';
        }

        // affichage du bouton de like sur la page profil

        echo '<button id="likebutton'.$ligne['id'].'">Like</button>';
        echo '<script>';
        echo 'var btn = document.getElementById("likebutton'.$ligne['id'].'");';
        echo "btn.addEventListener('click', function() {";
        echo "document.location.href = './likes/like.php?postid=";
        echo $ligne['id'];
        echo "&profil=";
        echo $nickname;
        echo "';";
        echo '});';
        echo '</script>';
        echo $ligne['likescount'];

        // bouton de signalement
        
        
        if(isReported($ligne['id'])){
            echo '<p>Publication signalée, en cours de vérification.</p>';
        }
        else{
            echo '<button id="reportbutton'.$ligne['id'].'">Signaler</button>';
            echo '<script>';
            echo 'var btn = document.getElementById("reportbutton'.$ligne['id'].'");';
            echo "btn.addEventListener('click', function() {";
            echo "document.location.href = './reports/reportpost.php?postid=";
            echo $ligne['id'];
            echo "&profil=";
            echo $nickname;
            echo "';";
            echo '});';
            echo '</script>';
        }
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
}

// fonction pour l'utilisateur courant

function usersprofil(){
    echo $_SESSION['nickname'];
    echo "<br>";

    $id=$_SESSION['id'];
    $connexion=connect();
    $req="SELECT * FROM profil WHERE profil_id='$id'";
    $query=mysqli_query($connexion,$req);
    $fetchquery=mysqli_fetch_assoc($query);

    if(isPPset($id)){
        echo '<img src="./profil/'.$fetchquery['pp_pic'].'" alt="photo de profil">';
    }else{
        echo "cet utilisateur n'a pas de photo de profil :/";
    }
    echo "<br>";
    echo $fetchquery['description'];
    echo "<br>";
    echo "<br>";

    $connexion=connect();
    $req="SELECT * FROM animal WHERE animal_id='$id'";
    $query=mysqli_query($connexion,$req);
    while($fetchquery=mysqli_fetch_assoc($query)){
            
        if(isPPsetAnimaux($fetchquery['id'])){
            echo '<img src="./profil/'.$fetchquery['pp_pic'].'" alt="photo de profil animal">';
        }else{
            echo "cet Animal n'a pas de photo de profil :/";
        }
        echo "<br>";
        echo $fetchquery['description'];
        echo "<br>";
        echo "<br>";
    }

    modif();


    $req3="SELECT * FROM post WHERE post_id='$id' ORDER BY id DESC";
    $query3=mysqli_query($connexion,$req3);
    echo '<div id="divposts">';
    while($ligne=mysqli_fetch_assoc($query3)){

        // post 

        echo '<div>';
        echo '<div>';
        echo '<p>';
        echo $ligne['publication'];
        echo '<img src="'.$ligne['image_path'].'">';
        echo '</p>';
        echo '</div>';


        //bouton like 

        echo '<button id="likebutton'.$ligne['id'].'">Like</button>';
        echo '<script>';
        echo 'var btn = document.getElementById("likebutton'.$ligne['id'].'");';
        echo "btn.addEventListener('click', function() {";
        echo "document.location.href = './likes/like.php?postid=";
        echo $ligne['id'];
        echo "&profil=";
        echo $_SESSION['nickname'];
        echo "';";
        echo '});';
        echo '</script>';
        echo $ligne['likescount'];

        // bouton supprimer

        echo '<button id="deletebutton'.$ligne['id'].'">Supprimer</button>';
        echo '<script>';
        echo 'var btn = document.getElementById("deletebutton'.$ligne['id'].'");';
        echo "btn.addEventListener('click', function() {";
        echo "document.location.href = './delete/deletepost.php?postid=";
        echo $ligne['id'];
        echo "';";
        echo '});';
        echo '</script>';
    }
}

?>