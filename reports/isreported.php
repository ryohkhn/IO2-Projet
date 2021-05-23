<?php

// fonction booléenne vérifiant si le post a été signalé par l'utilisateur courant

function isReported($postid){
    $connexion=connect();
    $id=$_SESSION['id'];
    $query=mysqli_query($connexion,"SELECT * FROM reports WHERE reports_id='$id' AND post_id='$postid'");
    $rows=mysqli_num_rows($query);
    
    if($rows==1){
        return true;
    }
    else{
        return false;
    }
}

?>