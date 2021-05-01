<?php

function usersprofilsearched($nickname){
    $connexion=connect();
    $req="SELECT * FROM users WHERE nickname='$nickname'";
    $query=mysqli_query($connexion,$req);
    $rows=mysqli_num_rows($query);
    
    if($rows!=1){
        echo '<h3>Ce compte n\'existe pas</h3>';
        exit;
    }
    
    echo '<div>';
    echo $nickname;
    echo '</div>';

    while($users=mysqli_fetch_assoc($query)){
        $id=$users['id'];
    }

    $req2="SELECT description FROM profil where profil_id=$id";
    $query2=mysqli_query($connexion,$req2);
    while($ligne=mysqli_fetch_assoc($query2)){
        echo '<div>';
        echo '<p>';
        echo $ligne['description'];
        echo '</p>';
        echo '</div>';
    }

    if(isFollowing($_SESSION['id'],$id)){
        echo '<button id="myBtn">Unfollow</button>';
    }else{
        echo '<button id="myBtn">Follow</button>';
    }
    echo '<script>';
    echo "var btn = document.getElementById('myBtn');";
    echo "btn.addEventListener('click', function() {";
    echo "document.location.href = './profil/follow.php?followed_id=";
    echo $id;
    echo "';";
    echo '});';
    echo '</script>';
}

// fonction pour l'utilisateur courant

function usersprofil(){
    echo "test";
}

?>