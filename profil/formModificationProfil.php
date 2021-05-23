<?php
//affiche le formulaire de modification + appelle les fonctions pour rentrer les données dans la database et dans l'espace de stockage
function formModificationProfil(){
    $connexion=connect();
    $id=$_SESSION['id'];
    echo "<!DOCTYPE html>";
    echo "<html>";
    echo "<head>";
    echo "<title>Modification profil</title>";
    echo '<link rel="stylesheet" href="../style/styledark.css" type="text/css"/>';
    echo "</head>";
    echo "<body>";
    echo '<form action="" method="post" enctype="multipart/form-data">';
    echo '<input type="hidden" name="MAX_FILE_SIZE" value="100000000" />';
    if(!empty($_POST['descProfil'])){
        $newDesc=mysqli_real_escape_string($connexion, htmlspecialchars($_POST['descProfil']));
        $req="UPDATE profil SET description= '$newDesc' WHERE profil_id='$id'";
        mysqli_query($connexion,$req);
        $req="SELECT * FROM profil WHERE profil_id='$id'";
        $query=mysqli_query($connexion,$req);
        $fetchquery=mysqli_fetch_assoc($query);
        echo '<div class="linevalidation">description modifiée : </div><p>';
        echo $fetchquery['description'];
        echo "</p>";
        echo '<div class="linevalidation"> </div>';

    }else{
        echo '<textarea name="descProfil" cols="35" rows="8" maxlength="200" class="formcomplement" placeholder="Nouvelle description de votre profil"></textarea><br>';
    }
    if(!empty($_FILES['pp']['name']) AND $_FILES['pp']['error'] == 0){
        if(!upload($_FILES['pp'])){
            header('Location: ./erreur.html');
        }else{ // affichage de la photo upload
            echo '<div class="linevalidation">changement effectués pour la photo de profil suivante :</div>';
            echo "<br>";
            $req="SELECT * FROM profil WHERE profil_id='$id'";
            $query=mysqli_query($connexion,$req);
            $fetchquery=mysqli_fetch_assoc($query);
            echo '<img src="./'.$fetchquery['pp_pic'].'" alt="photo de profil" class="imagedisplay">';
            echo "<br>";
        }
        
    }else{
        echo '<label for="pp">';
        echo '<img src="../images/imagelogo.png" alt="imagelogo" class="imageinput" >';
        echo '<input type="file" name="pp" id="pp">';
        echo '</label>';
        echo 'modifier la photo de votre profil';

        
    }
        
    echo "<br>";
    echo "<br>";
    $request="SELECT * FROM animal WHERE animal_id='$id'";
    $result=mysqli_query($connexion,$request);
    while($animaux=mysqli_fetch_assoc($result)){
        $animalid=$animaux['id'];
        if(!empty($_POST['desc'.$animalid.''])){
            $newDesc=mysqli_real_escape_string($connexion, htmlspecialchars($_POST['desc'.$animalid.'']));
            $req="UPDATE animal SET description= '$newDesc' WHERE id='$animalid'";
            mysqli_query($connexion,$req);
            $req="SELECT * FROM animal WHERE id='$animalid'";
            $query=mysqli_query($connexion,$req);
            $fetchquery=mysqli_fetch_assoc($query);
            echo '<div class="linevalidation">description modifiée : </div><p>';
            echo $fetchquery['description'];
            echo "</p>";
        
        }else{
            echo '<textarea name="desc'.$animalid.'" cols="35" rows="8" maxlength="200" class="formcomplement" placeholder="Nouvelle description du profil de votre animal '.$animalid.': '.$animaux['type'].' '.$animaux['description'].'"></textarea><br>';
        }
        if(!empty($_FILES[''.$animaux['id'].'']['name']) AND $_FILES[''.$animaux['id'].'']['error'] == 0){
            if(!uploadAnimaux($_FILES[''.$animaux['id'].''], $animaux['id'])){
                header('Location: ./erreur.html');
            }else{ // affichage de la photo upload
                echo '<div class="linevalidation">changement effectués pour la photo de profil suivante :</div>';
                echo "<br>";
                
                $req="SELECT * FROM animal WHERE id='$animalid'";
                $query=mysqli_query($connexion,$req);
                $fetchquery=mysqli_fetch_assoc($query);
                echo '<img src="./'.$fetchquery['pp_pic'].'" alt="photo de profil" class="imagedisplay">';
                echo "<br>";
            }
        }else{
            echo '<label for="'.$animaux['id'].'">';
            echo '<img src="../images/imagelogo.png" alt="imagelogo" class="imageinput" >';
            echo '<input type="file" name="'.$animaux['id'].'" id="'.$animaux['id'].'" style="display:none;"></label>';
            echo 'modifier la photo de votre '.$animaux['type'].' '.$animaux['description'].'';
            echo "<br>";
            echo "<br>";
        }

    }
    echo '<div class="linevalidation">Modifiez ce que vous souhaitez puis appuyez sur : <input type="submit" class="firstformbutton2" name="submit" value="valider"></div>';
    echo "</form>";

    echo '<div class="button_style"><span><a class="link_style" href="../profil.php">retourner au profil</a></span></div>';

    echo "</body>";
    echo "</html>";
}
?>