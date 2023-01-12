<?php
include ("connexion.php");
$login=$_POST["login"];
$pass=$_POST["pass"];
$Prénom=$_POST["Prénom"];
$Nom=$_POST["Nom"];
$email=$_POST["email"];

    if(isset($_FILES['image']) and $_FILES['image']['error']==0)
    {
        $dossier= 'images/';
        $temp_name=$_FILES['image']['tmp_name'];
        if(!is_uploaded_file($temp_name))
        {
        exit("le fichier est untrouvable");
        }
        if ($_FILES['image']['size'] >= 1000000){
            exit("Erreur, le fichier est volumineux");
        }
        $infosfichier = pathinfo($_FILES['image']['name']);
        $extension_upload = $infosfichier['extension'];
        
        $extension_upload = strtolower($extension_upload);
        $extensions_autorisees = array('png','jpeg','jpg');
        if (!in_array($extension_upload, $extensions_autorisees))
        {
        exit("Erreur, Veuillez inserer une image svp (extensions autorisées: png)");
        }
        $nom_photo=$login.".".$extension_upload;
        if(!move_uploaded_file($temp_name,$dossier.$nom_photo)){
        exit("Problem dans le telechargement de l'image, Ressayez");
        }
        $image=$nom_photo;
}
else{
    $image="prof1.jpg";
}    
$sql11="insert into `prof`(login ,pass, Prénom, Nom, email,photo ) VALUES ('$login','$pass','$Prénom','$Nom','$email','$image')";
$res11= mysqli_query($link, $sql11);
if ($res11==false) {
    header("location:login_error.php");
}
else{
   echo "votre insertion est effectuee correctement";
}



?>
