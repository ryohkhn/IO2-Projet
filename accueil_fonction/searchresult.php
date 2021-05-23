<?php
session_start();

$title='Résultat de la recherche';
$style='../style/styledark.css';
require_once "../include/header.inc.php";
require_once "../connexion_db/connexion.php";
require_once "../administration/isadmin.php";
require_once "../administration/issuperadmin.php";
require_once "./accueilheader.php";
require_once "./leftbarotherpage.php";
require_once "../register_login/accountcheck.php";

if(!accountcheck()){
    echo '<h2>Vous devez posséder un compte pour accéder à cette page</h2>';
    echo '<a href="./register_login/register.php" class="warningaccountcheck">Inscrivez-vous</a>';
    echo '<a href="./register_login/login.php" class="warningaccountcheck">Connectez-vous</a>';
    exit;
}

// affichage de la barre latérale

leftbarotherpage("../accueil.php","../profil.php","../reports/adminreports.php","./logout.php");

echo '<div class="splithomeright">';
accueilheader("./searchresult.php");
echo '<div>';

if(isset($_POST['search'])){
    $connexion=connect();
    $search=htmlspecialchars($_POST['search']);
    $search=mysqli_real_escape_string($connexion,$search);
    $req="SELECT * FROM users WHERE nickname LIKE '%$search%'";
    $query=mysqli_query($connexion,$req);

    if(mysqli_num_rows($query)==0){
        echo "Aucun utilisateur ne correspond à votre recherche";
    }else{
        echo '<div>';
        while($queryarray=mysqli_fetch_assoc($query)){
            $postid=$queryarray['id'];
            $nickname=$queryarray['nickname'];

            $req2="SELECT * FROM profil WHERE profil_id='$postid'";
            $query2=mysqli_query($connexion,$req2);
            $fetchquery=mysqli_fetch_assoc($query2);

            echo '<div class="posts">';
            echo '<div class="timelinepicname">';
            echo '<div>';
            echo '<a href="../profil.php?nickname='.$nickname.'"><img src="../profil/'.$fetchquery['pp_pic'].'" alt="profil_pic" class="timelineprofilpic"></a>';
            echo '<div>';
            echo '<a href="../profil.php?nickname='.$nickname.'" class="timelinenickname">@'.$nickname.'</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }   
    }
}
else{
    header("Location: ../accueil.php");
}

require_once "../include/footer.inc.php";
?>