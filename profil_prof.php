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
            box-shadow: 0px 10px 5px 0px rgba(0,0,0,0.46);
-webkit-box-shadow: 0px 10px 5px 0px rgba(0,0,0,0.46);
-moz-box-shadow: 0px 10px 5px 0px rgba(0,0,0,0.46);
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
                padding: 8px;
                width:23%; 
                  border-radius: 5px;
                  border: 1px solid gray;
              }
              .b{
                padding: 8px;
                display:inline-block;
                font-weight: bold;
                width:130px;
                margin-left:30px;
              }
              .c{
                padding: 5px;
                width:71%; 
                  border-radius: 5px;
                  border: 1px solid gray;

              }
  </style>

</head>
<body>
  <nav>
                              
    <ul > 
     <li style="color: black;margin-left:-10px ;width: 400px;"><a href="Professeurs.php">Espace Professeur</a></li>
        <li ><a href="ratt.php" class="hh">Ajouter Un Rattrapage</a></li>
        <li><a href="profil_prof.php" class="hh">Mon Profil</a></li>
        <li><a href="start.php" class="hh">Deconnexion</a></li>                               
    </ul>                                    
                                                                    
</nav>
<?php
include ("connexion.php");
session_start();
$sql="SELECT * FROM `prof` WHERE login='".$_SESSION['login']."'";
        $result=mysqli_query($link,$sql);
        $data=mysqli_fetch_assoc($result);
        $_SESSION['id_prof']=$data['id_prof'];
?>
<h1 style="text-align: center;margin-top: 30px;color:#dfb4dd; margin-bottom: -20px;">Mon Profil</h1>
  <form action="prof_profil_trait.php" method="post">
    <label class="b" for="nom">Nom</label>
    <input class="a" type="text" name="nom" value=<?php echo $data["Nom"];?> >
    <label class="b" for="prenom">Prenom</label>
    <input class="a" type="text" name="prenom" value=<?php echo $data["Prénom"];?> >
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


