<?php
session_start();
require_once "./register_login/accountcheck.php";
require_once "./sessionattribute.php";
require_once "./connexion_db/connexion.php";
require_once "./profil/modif.php";
$_SESSION['page']="profil.php"; // sert a retenir la page ou on etait pour nous renvoyer dessus apres s'être login
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<title>Accueil</title>
<meta charset="utf-8"/>
<link rel="./style/styleaccueil.php" href="'.$style.'" type="text/css"/>
</head>
<body>
<?php
// On verifie si l'utilisateur est connecté
if(!accountcheck()){
    echo '<h2>Vous devez posséder un compte pour accéder à cette page</h2>';
    echo '<a href="./register_login/register.php">Inscrivez-vous</a><br>';
    echo '<a href="./register_login/login.php">Connectez-vous</a>';
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