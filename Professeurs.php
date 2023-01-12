<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professeur</title>
        <style type="text/css">



    
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
    </style>
</head>
<body align="center">
<nav>
                              
    <ul > 
     <!--   <img src="photo/prof.jpg" width="40" height="40" alt="icons" class="logo"/> -->
     <li style="color: black;margin-left:-400px ;width: 700px;">Espace Professeurs</li>
        <li ><a href="ratt.php" class="hh">Ajouter Un Rattrapage</a></li>
        <li><a href="profil_prof.php" class="hh">Mon Profil</a></li>
        <li><a href="start.php" class="hh">Deconnexion</a></li>                               
    </ul>                                    
                                                                    
</nav>

<h1 style="color:#dfb4dd;">La Liste Des Salles Occupées </h1>
<div class="limiter">
<div class="container-table100">
<div class="wrap-table100">
<div class="table">
<div class="row header">


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
                 session_start();
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
    </div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>

