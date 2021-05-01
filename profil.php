<?php

session_start();
$title='Profil';
$style='./style/styleaccueil.css';
require_once "./include/header.inc.php";
require_once "./register_login/accountcheck.php";
require_once "./sessionattribute.php";
require_once "./connexion_db/connexion.php";
require_once "./profil/modif.php";
require_once "./profil/usersprofil.php";
require_once "./profil/isfollowing.php";

$_SESSION['page']="profil.php"; // sert a retenir la page ou on etait pour nous renvoyer dessus apres s'être login

// On verifie si l'utilisateur est connecté
if(!accountcheck()){
    echo '<h2>Vous devez posséder un compte pour accéder à cette page</h2>';
    echo '<a href="./register_login/register.php">Inscrivez-vous</a><br>';
    echo '<a href="./register_login/login.php">Connectez-vous</a>';
    exit;
}

// Page de profil d'un utilisateur recherché
if(isset($_GET['nickname'])){
    usersprofilsearched($_GET['nickname']);
    exit;
}

echo "profil de ";
echo $_SESSION['nickname'];
echo " :";
echo "<br>";
modif();

?>
</body>
</html>