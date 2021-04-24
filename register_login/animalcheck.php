<?php

function animalcheck(){
    // vérification permettant d'éviter de renvoyer les données à la base de donnée lors d'un rechargement de la page
    if(!isset($_SESSION['animalcheckdone'])){
        // vérification que le formulaire a bien été envoyé 
        if(isset($_POST['quantityanimal'])){
            $quantity=$_POST['quantityanimal'];
            $connexion=connect();
            $nickname=$_SESSION['nickname'];
            $id=$_SESSION['id'];  
            $_SESSION['animalcheckdone']='true';
            while($quantity!=0){
                $animal='animal'.$quantity.'';
                $animaltype=$_POST[''.$animal.''];
                $description='description'.$animal.'';
                if(isset($_POST[''.$description.''])){
                    $description=htmlspecialchars($_POST[''.$description.'']);
                    $description=mysqli_real_escape_string($connexion,$description);
                    $req="INSERT INTO animal(type,description,animal_id) VALUES ('$animaltype','$description','$id')";
                    mysqli_query($connexion,$req);
                }else{
                    $req="INSERT INTO animal(type,animal_id) VALUES ('$animaltype','$id')";
                    mysqli_query($connexion,$req);
                }   
                $quantity--;
            }
            return true;
        }
        return false;
    }
    return true;
}

?>