<!DOCTYPE html>
<html>
    <head>
    <title></title>
    </head>
    <body>
<!-- Le type d'encodage des données, enctype, DOIT être spécifié comme ce qui suit -->
<form enctype="multipart/form-data" action="test1.php" method="post">
  <!-- MAX_FILE_SIZE doit précéder le champ input de type file -->
  <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
  <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
  Envoyez ce fichier : <input name="userfile" type="file"/>
  <input type="submit" name="submit" value="Envoyer le fichier" />
  
</form>
<?php
if(isset($_POST['submit'])){
    echo $_FILES['userfile']['name']; //marche
    echo $_POST['userfile']; // erreur
}
  ?>
</body>
</html>