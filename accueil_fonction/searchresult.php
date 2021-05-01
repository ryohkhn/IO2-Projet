<?php

$title='Résultat de la recherche';
$style='../style/stylesearchresult.css';
require_once "../include/header.inc.php";
require_once "../connexion_db/connexion.php";

echo '<header>';
echo '<button id="myBtn">Home</button>';
echo '<script>';
echo "var btn = document.getElementById('myBtn');";
echo "btn.addEventListener('click', function() {";
echo "document.location.href = '../accueil.php';";
echo '});';
echo '</script>';
echo '<form action="./searchresult.php" method="post">';
echo '<input type="search" name="search" required>';
echo '</form>';
echo '<a href="./logout.php">Déconnexion</a>';
echo '</header>';

if(isset($_POST['search'])){
    $connexion=connect();
    $search=htmlspecialchars($_POST['search']);
    $search=mysqli_real_escape_string($connexion,$search);
    $req="SELECT nickname FROM users WHERE nickname LIKE '%$search%'";
    $query=mysqli_query($connexion,$req);

    if(mysqli_num_rows($query)==0){
        echo "Aucun utilisateur ne correspond à votre recherche";
    }else{
        echo '<div>';
        while($queryarray=mysqli_fetch_assoc($query)){
            echo '<a href="../profil.php?nickname=';
            echo $queryarray['nickname'];
            echo '">';
            echo $queryarray['nickname'];
            echo '</a>';
            echo '<br>';
        }   
        echo '</div>';
    }
}

require_once "../include/footer.inc.php";
?>