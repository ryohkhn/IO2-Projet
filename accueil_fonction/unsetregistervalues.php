<?php

function unsetregistervalues(){
    if(isset($_SESSION['complementcheckdone']) && isset($_SESSION['animalcheckdone'])){
        unset($_SESSION['complementcheckdone']);
        unset($_SESSION['animalcheckdone']);
    }
}

?>