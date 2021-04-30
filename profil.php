<?php
session_start();
require_once "./register_login/accountcheck.php";
require_once "./sessionattribute.php";
require_once "./connexion_db/connexion.php";
require_once "./profil/modifppanimaux.php";
require_once "./profil/modifpp.php";
require_once "./profil/modif.php";
require_once "./profil/validermodif.php";
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
$a=$_SESSION['profil']['id'];
if(!empty($_GET[''.$a.''])){
    echo "test";
    $b=$_GET[''.$a.''];
    if(!file_exists($b)) echo "true";
    $c=base64_encode(file_get_contents($a));
    $insert="INSERT INTO profil(pp_pic) VALUES (''.$c.'')";
    mysqli_query($connexion,$insert);
}
unset($_GET['valider']);
unset($_GET['modif']);
//echo "<script type='text/javascript'>document.location.replace('profil.php');</script>";

if(!empty($_GET[''.$a.''])){
    // la partie qui suit a été empruntée sur stackoverflow pour comprendre comment afficher une image
    $b=$_SESSION['id'];
    $sql = "SELECT pp_pic FROM profil WHERE profil_id = ''.$b.''";
    $connexion=connect();
    $sth = mysqli_query($connexion,$sql);
    $result=mysqli_fetch_assoc($sth);
    print_r($result);
    //echo '<img src="data:image/jpeg;base64,'.base64_encode( $result ).'"/>';
    // fin emprunt
}
echo "<br>";
echo "<br>";
echo "<br>";



?>
</body>
</html>