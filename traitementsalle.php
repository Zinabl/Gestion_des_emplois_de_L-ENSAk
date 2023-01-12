<?php
  include ("connexion.php");
  if (isset($_POST['submit'])) {
  $salle=$_POST['salle'];
  $capacite=$_POST['capacite'];

  $sql40="INSERT INTO `salle`(`lib_salle`,`capacite` )values('$salle','$capacite')";
  $resultat40=mysqli_query($link,$sql40);
  if ($resultat40) {
    header('Location:emploi.php');
  }
  else
  {
  echo "Erreur lors de l'ajout du salle";
  }
}
?>