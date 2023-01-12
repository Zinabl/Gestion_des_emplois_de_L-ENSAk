<?php
    include ("connexion.php");
    session_start();
          $nom=$_POST["nom"];
          $prenom=$_POST["prenom"];
          $login=$_POST["login"];
          $mail=$_POST["mail"];
          $pass=$_POST["pass"];
          $id=$_SESSION['id_prof'];

  if (isset($_FILES['fichier']) and $_FILES['fichier']['error']==0) {

    $dossier='photo/';
    $temp_name=$_FILES['fichier']['tmp_name'];
    if (!is_uploaded_file($temp_name)) {
      exit("le fichier est introuvable");
    }
    if ($_FILES['fichier']['size'] >= 1000000) {
      exit("Erreur, le fichier est tros volumineux");
    }
    $infosfichier=pathinfo($_FILES['fichier']['name']);
    $extension_upload=$infosfichier['extension'];

    $extension_upload=strtolower($extension_upload); 
    $extensions_autorisees=array('png','jpeg','jpg');
    if(!in_array($extension_upload, $extensions_autorisees)){
      exit("Erreur, veuillez inserer une image svp (extension autorisees:png)");
    }
    $nom_photo=$id.".".$extension_upload;
    if (!move_uploaded_file($temp_name, $dossier.$nom_photo)) {
      exit("Problem dans le telechargement de l'image , Ressayez");
    }
    $photo=$nom_photo;
  }
  else{
    $photo='SANS_IMAGE.png';
  }
  

      $sql3="UPDATE `prof` SET `Nom`='$nom',`Prénom`='$prenom',`login`='$login',`pass`='$pass',`email`='$mail',`photo`='$photo' WHERE login='".$_SESSION['login']."'";
      $resultat3=mysqli_query($link,$sql3);
        if ($resultat3==true) {
            header('Location:Professeurs.php');
        }else{echo "Erreur lors de la modification de votre compte";}
  

?>