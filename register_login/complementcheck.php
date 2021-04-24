<?php

function complementcheck(){
    // vérification permettant d'éviter de renvoyer les données à la base de donnée lors d'un rechargement de la page
    if(!isset($_SESSION['complementcheckdone'])){
        // vérification affichant le formulaire s'il n'a pas encore été envoyé 
        if(isset($_POST['quantity'])){
            if(isset($_POST['description']) && !empty($_POST['description'])){
                $connexion=connect();
                $description=htmlspecialchars($_POST['description']);
                $description=mysqli_real_escape_string($connexion,$description);
                $id=$_SESSION['id'];
                $req="INSERT INTO profil(description,profil_id) VALUES ('$description','$id')";
                mysqli_query($connexion,$req);
            }
            $_SESSION['complementcheckdone']='true';
            // s'il la personne a renseigné '0' dans la case animal, l'inscription se termine directement
            if($_POST['quantity']=='0'){
                successregister();
                return false;
            }else{
                formanimal($_POST['quantity']);
                return true;
            }
        }
        else{
            formcomplement();
            return false;
        }
    }
    else{
        return true;
    }
}

?>