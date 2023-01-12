<!DOCTYPE html>
<html lang="fr">
<head>
  <title></title>
  <style type="text/css">
body{background: linear-gradient(0deg, #1f5c6e 0%, rgb(105 142 199) 78%, rgb(145 161 173 / 78%) 100%);  }
              nav{

            margin-top: -9px;
            background-image: linear-gradient(135deg, #FAB2FF 10%, #1904E5 100%);
            padding:2px;
        }
        nav li{   
            display: inline-block;
            margin-right: 30px;
            font-size: 20px;
            text-transform: uppercase;
        }
        nav a{
            text-decoration: none;
            color: white;
        }

        nav a:hover{
                background-color: #df70f5;
                padding:16px;
                color: black;
                border-radius: 6px;
        }
form{
  min-width:40%;
  max-width: 65%;
  height:50%;
    padding: 50px;
    margin-top: 8%;
    margin-bottom: 5%;
    margin-left: 200px;
    border: 1px solid #f1f1f1;
    border-radius: 50px;
    border-top: none;
    background-image: url('images/img4.jpg');
    opacity: 0.9;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

.botton{
                margin-left: 350px;
                width: 120px;
                padding: 10px;
                font-weight: bold;
                color: white;
                background-image: linear-gradient(135deg, #70a5f5 10%, hsl(299deg 78% 48%) 100%);
                border-radius: 8px;
                border: none;
             }
.a{
  padding: 5px;
  width:23%; 
    border-radius: 5px;
    border: 1px solid black;
}
.b{
  display:inline-block;
  font-weight: bold;
  width:130px;
  margin-left:30px;
}
.c{
  padding: 5px;
  width:71%; 
    border-radius: 5px;
    border: 1px solid black;

}
body{
          background-image: linear-gradient(135deg, #FAB2FF 10%, #1904E5 100%);
          font-family: verdana,sans-serif;
        }
        nav{
            margin-top: -5px;
            background-image: linear-gradient(135deg, #FAB2FF 10%, #1904E5 100%);
            padding:2px;
            box-shadow: 0px 10px 5px 0px rgba(0,0,0,0.46);
-webkit-box-shadow: 0px 10px 5px 0px rgba(0,0,0,0.46);
-moz-box-shadow: 0px 10px 5px 0px rgba(0,0,0,0.46);
        }
        nav li{   
            display: inline-block;
            margin-right: 10px;
            font-size: 20px;
            text-transform: uppercase;
            padding: 9px;
        }
        nav a{
            text-decoration: none;
            color: white;
        }

        nav a:hover{
                background-color: #df70f5;
                padding:9px;
                color: black;
                border-radius: 6px;
        }
  </style>

</head>
<body>
  <nav>
                              
    <ul > 
     <li style="color: black;margin-left:-20px ;width: 500px;">Espace Administration</li>
        <li ><a href="ajoutercours.php" class="hh">Ajouter Un cours</a></li>
        <li><a href="ajouterprof.php" class="hh">Ajouter Enseignant</a></li>
        <li><a href="ajouter_filiere.php" class="hh">Ajouter Filière</a></li>
        <li><a href="Ajoutergroup.php" class="hh">Ajouter Un Groupe</a></li>
        <li><a href="ajoutersalle.php" class="hh">Ajouter Une salle</a></li>
        <li><a href="ajouter_semestre.php" class="hh">Ajouter Un Module</a></li>
        <li><a href="profil_admin.php" class="hh">Mon Profil</a></li>
        <li><a href="start.php" class="hh">Deconnexion</a></li>                               
    </ul>                                                                                                  
</nav>

              <?php
              include ("connexion.php");
              session_start();
              $sql="SELECT * FROM `admin` WHERE login='".$_SESSION['login']."'";
                      $result=mysqli_query($link,$sql);
                      $data=mysqli_fetch_assoc($result);
              ?>

<h1 style="text-align: center;margin-top: 30px;color:#dfb4dd; margin-bottom: -20px;">Mon Profil</h1>
  <form action="" method="post">
    <label class="b" for="nom">Nom</label>
    <input class="a" type="text" name="nom" value=<?php echo $data["nom"];?> >
    <label class="b" for="prenom">Prenom</label>
    <input class="a" type="text" name="prenom" value=<?php echo $data["prenom"];?> >
    <br><br/>
<label for="login" class="b">login</label>
    <input class="a" type="text" name="login" value=<?php echo $data["login"];?> >
        <br><br/>
    <label for="pass" class="b">Mot de Passe</label>
    <input class="a" type="text" name="pass" value=<?php echo $data["pass"];?>>
    <label for="mail" class="b">Mail</label>
    <input class="a" type="email" name="mail" value=<?php echo $data["email"];?>>
    <br><br/>
    <label for="fichier" class="b">Photo</label>
    <input class="c" type="file" name="fichier">
    <br><br/>
    <br><br/>
    <div id="bot"><input class="botton" type="submit" name="modifier" value="Modifier" ></div>
    </form>
</body>
</html>
<?php
include ("connexion.php");
if (isset($_POST['modifier'])) {
$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$login=$_POST["login"];
$mail=$_POST["mail"];
$pass=$_POST["pass"];

  //on verifie si l'utilisateur a bien selectionner un fichier et que aucun erreur n'a ete generer
  if (isset($_FILES['fichier']) and $_FILES['fichier']['error']==0) {

    $dossier='photo/';//les images qui vont etre uploader vont etre placer dans le repertoire photo
    $temp_name=$_FILES['fichier']['tmp_name'];// on recupere le nom temporaire du fichier
    if (!is_uploaded_file($temp_name)) {
      exit("le fichier est introuvable");
    }
    if ($_FILES['fichier']['size'] >= 1000000) {
      exit("Erreur, le fichier est tros volumineux");
    }
    $infosfichier=pathinfo($_FILES['fichier']['name']);// on n'est besoin de recuperer l'extension du fichier
    $extension_upload=$infosfichier['extension'];

    $extension_upload=strtolower($extension_upload);//pour convertir l'extension en minuscule pour quand puisse comparer par la suite
    $extensions_autorisees=array('png','jpeg','jpg');
    if(!in_array($extension_upload, $extensions_autorisees)){
      exit("Erreur, veuillez inserer une image svp (extension autorisees:png)");
    }
    $nom_photo=$login.".".$extension_upload;// pour changer le nom du fichier entrer par l'utilisateur 7it momkin deux personne ykono dzrin le meme nom dial fichier alors b le login qui est unique en regle le problem(login.extension dial l fichier)
    if (!move_uploaded_file($temp_name, $dossier.$nom_photo)) {
      exit("Problem dans le telechargement de l'image , Ressayez");
    }
    $ph_name=$nom_photo;
  }
  else{
    $ph_name='SANS_IMAGE.png';
  }
$sql3="UPDATE `prof` SET `nom`='$nom',`prenom`='$prenom',`login`='$login',`pass`='$pass',`email`='$mail',`photo`='$ph_name' WHERE login='".$_SESSION['login']."'";
$resultat3=mysqli_query($link,$sql3);
if ($resultat3==true) {
header('Location:emploi.php');
}else{echo "Erreur lors de la modification de votre compte";}
}
?>