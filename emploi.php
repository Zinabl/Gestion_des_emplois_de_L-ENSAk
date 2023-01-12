<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emploi&Tableau de bord</title>
    <style>

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
        .article{
            background-color: #577590;
        }
        table{
            margin: 50px 10%;
        }
        table {
          table-layout: fixed;
          width: 80%;
          border-collapse: collapse;
          border: 3px solid purple;
          background-color:white;
        }

              thead th:nth-child(1) {
                width: 30%;
              }

              thead th:nth-child(2) {
                width: 20%;
              }

              thead th:nth-child(3) {
                width: 15%;
              }

              thead th:nth-child(4) {
                width: 35%;
              }

              th, td {
                padding: 20px;
              }

              body{
                  background-image:url('images/profback.jpg');

                  
              }
              button {
                  width: 150px;
                  margin-left:-20px;
                  padding: 10px;
                  border: none;
                  border-radius: 5px; 
                  background-color: #b890dd ;
                  font-weight: bold;
                  font-size: 16px;
                  color: #fff;
                  cursor: pointer;
                  }
                  button:hover {
                  background:  #113f59;
      }
      h2{
        color:#4f085e;
      }
      label{color: white;}
      select{
        padding: 10px;
        width: 150px;
        margin-left: 20px;
      }
      body,html{background: linear-gradient(135deg, #FAB2FF 10%, #1904E5 100%);}
    </style>
</head>
<body align="center">
<nav>
                              
    <ul > 
     <li style="color: black;margin-left:-170px ;width: 500px;"><a href="emploi.php">Espace Administration</a></li>
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

<h2 style="color:#4f085e;">La Liste Des Salles Occupées </h2>
<table border="1" cellspacing="0" cellpadding="1" >
    <tr>
    <th>Matricule</th>
    <th>Professeurs</th>
    <th>Filière</th>
    <th>Module</th>
    <th>Semetre</th>
    <th>Salle</th>
    <th>Date</th>
    <th>Heure</th>
</tr>
    <?php  
                   include("connexion.php");
                   $sql="SELECT `prof`.`id_prof`,`prof`.`Nom`, `salle`.`id_salle`, `salle`.`lib_salle`, `filiere`.`lib_filiere`, `module`.`lib_module`,`semestre`.`lib_semestre`,`ratt`.`date_ratt`,`ratt`.`heure`
FROM `ratt`
    LEFT JOIN `prof` ON `ratt`.`id_prof` = `prof`.`id_prof`
    LEFT JOIN `module` ON `ratt`.`id_module` = `module`.`id_module`
    LEFT JOIN `salle` ON `ratt`.`id_salle` = `salle`.`id_salle`
     LEFT JOIN `semestre` ON `ratt`.`id_semestre` = `semestre`.`id_semestre`
    LEFT JOIN `filiere` ON `ratt`.`id_filiere` = `filiere`.`id_filiere`";
                       $result=mysqli_query($link,$sql);
                       while( $data=mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".$data['id_prof']."</td>";
                        echo "<td>".$data['Nom']."</td>";
                        echo "<td>".$data['lib_filiere']."</td>";
                        echo "<td>".$data['lib_module']."</td>";
                        echo "<td>".$data['lib_semestre']."</td>";
                        echo "<td>".$data['lib_salle']."</td>";
                        echo "<td>".$data['date_ratt']."</td>";
                        echo "<td>".$data['heure']."</td>";
                        echo "</tr>";
                       }
                     ?>
    </table>
    
</body>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title></title>
  
  <style>
    input{
      size:80px;
    }
     body,html{background: linear-gradient(135deg, #FAB2FF 10%, #1904E5 100%);}
  </style>

</head>
<body>


<head>
  

  </head>
<body>
<h2 style="color:#4f085e;">Le taux d'occupation des salles par filière(par semaine)</h2>
<table border="1" cellspacing="0" cellpadding="1" >
    <tr>
    <th>La salle</th>
    <th>Nombre d'occupation de la salle</th>
    
</tr>
    <?php  
                 
                   include("connexion.php");
                   $sql="SELECT `salle`.`lib_salle`,COUNT(`emploi`.`id_salle`) FROM `emploi` LEFT JOIN `salle` ON `emploi`.`id_salle` = `salle`.`id_salle` GROUP BY `salle`.`lib_salle`";

                       $result=mysqli_query($link,$sql);
                       while( $data=mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".$data['lib_salle']."</td>";
                         echo "<td>".$data['COUNT(`emploi`.`id_salle`)']."</td>";
                        echo "</tr>";
                       }
                     ?>
    </table>


    <h2 style="color:#4f085e;">La charge horaire par filière</h2>

    <table border="1" cellspacing="0" cellpadding="1" >
    <tr>
    <th>La filiere</th>
    <th>La charge horaire</th>
</tr>
    <?php  
                 
                   include("connexion.php");
                   $sql="SELECT `filiere`.`lib_filiere`,COUNT(`filiere`.`id_filiere`) FROM `filiere` LEFT JOIN `emploi` ON `emploi`.`id_filiere` = `filiere`.`id_filiere` GROUP BY `filiere`.`lib_filiere`";

                       $result=mysqli_query($link,$sql);
                       while( $data=mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".$data['lib_filiere']."</td>";
                         echo "<td>".$data['COUNT(`filiere`.`id_filiere`)']."</td>";
                        echo "</tr>";
                       }
                     ?>
    </table>

    <h2 style="color:#4f085e;">La charge horaire par Enseignant</h2>

    <table border="1" cellspacing="0" cellpadding="1" >
    <tr>
    <th>Nom_Enseignant</th>
    <th>Prénom_Enseignant</th>
    <th>La charge horaire</th>
</tr>
    <?php  
                 
                   include("connexion.php");
                   $sql="SELECT `prof`.`Nom`,`prof`.`Prénom`,COUNT(`prof`.`id_prof`) FROM `prof` LEFT JOIN `emploi` ON `emploi`.`id_prof` = `prof`.`id_prof` GROUP BY `prof`.`id_prof`";

                       $result=mysqli_query($link,$sql);
                       while( $data=mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".$data['Nom']."</td>";
                        echo "<td>".$data['Prénom']."</td>";
                         echo "<td>".$data['COUNT(`prof`.`id_prof`)']."</td>";
                        echo "</tr>";
                       }
                     ?>
    </table>


  <form action="#" method="POST">

          <h2>Afficher un emploi du temps</h2>
        
        
                <label>Filière<span style="color: red;";>*</span></label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  <select name="filiere">
                    <?php
                    include ("connexion.php");
                        $sql="SELECT * FROM `filiere`";
                        $result=mysqli_query($link,$sql);
                        while ($filiere=mysqli_fetch_assoc($result)){
                        echo '<option value='.$filiere["id_filiere"].'>';
                        echo $filiere["lib_filiere"];
                        echo'</option>';}
                    ?>
                  </select><br><br>
                    
                  
                  <label>Semestre<span style="color: red;";>*</span></label>
                 <select name="semestre">
                    <?php
                    include ("connexion.php");
                        $sql="SELECT * FROM `semestre`";
                        $result=mysqli_query($link,$sql);
                        while ($semestre=mysqli_fetch_assoc($result)){
                        echo '<option value='.$semestre["id_semestre"].'>';
                        echo $semestre["lib_semestre"];
                        echo'</option>';}
                    ?>
                  </select><br><br>
                    
                  </div>
                <button name="submit" >Afficher</button>
   </form>
</body>
</html>
</html>


<?php  
             include("connexion.php");
                if (isset($_POST['submit'])) {
                    $semestre=$_POST['semestre'];
                    $filiere=$_POST['filiere'];
 echo'<table border="1" cellspacing="0" cellpadding="1" >';
   echo "<tr>";
    echo "<th>Nom</th>";
    echo "<th>Prénom</th>";
    echo "<th>Filière</th>";
    echo "<th>Module</th>";
    echo "<th>Semetre</th>";
    echo "<th>Salle</th>";
    echo "<th>Date</th>";
    echo "<th>Heure</th>";
echo "</tr>";

                   $sql="SELECT `prof`.`Prénom`,`prof`.`Nom`, `salle`.`lib_salle`, `filiere`.`lib_filiere`, `module`.`lib_module`,`semestre`.`lib_semestre`,`emploi`.`date`,`emploi`.`heure`
FROM `emploi`
    LEFT JOIN `prof` ON `emploi`.`id_prof` = `prof`.`id_prof`
    LEFT JOIN `module` ON `emploi`.`id_module` = `module`.`id_module`
    LEFT JOIN `salle` ON `emploi`.`id_salle` = `salle`.`id_salle`
     LEFT JOIN `semestre` ON `emploi`.`id_semestre` = `semestre`.`id_semestre`
    LEFT JOIN `filiere` ON `emploi`.`id_filiere` = `filiere`.`id_filiere` where `emploi`.`id_semestre`='".$semestre."'and `emploi`.`id_filiere`='".$filiere."'";
                       $result=mysqli_query($link,$sql);
                       while( $data=mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".$data['Nom']."</td>";
                        echo "<td>".$data['Prénom']."</td>";
                        echo "<td>".$data['lib_filiere']."</td>";
                        echo "<td>".$data['lib_module']."</td>";
                        echo "<td>".$data['lib_semestre']."</td>";
                        echo "<td>".$data['lib_salle']."</td>";
                        echo "<td>".$data['date']."</td>";
                        echo "<td>".$data['heure']."</td>";
                        echo "</tr>";
                       }
                }
                     ?>