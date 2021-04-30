<?php

require_once "./register_login/accountcheck.php";
require_once "./accueil_fonction/unsetregistervalues.php";
require_once "./connexion_db/connexion.php";

$connexion=connect();
$req="INSERT INTO post(description,post_id) VALUES ('test','10')";
$query=mysqli_query($connexion,$req);
echo '<p>done</p>';

// salut je veu_x voir si ça bug

?>
