<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Ajouter Un Groupe</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <style>
        @font-face{
            font-family:"mapolice";
            src:url("police/Lobster-Regular.ttf");
        }
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, textarea, label { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
      }
      h1 {
      /*position: absolute;
      margin:0;*/
      font-size: 60px;
      color: #F6745A; /*#fff#113f59*/
      /*z-index: 2;*/
      line-height: 83px;
      top:70px;
      font-family:"mapolice";
      }
      legend {
      padding: 10px;      
      font-family: Roboto, Arial, sans-serif;
      font-size: 18px;
      color: #fff;
      background-color: #F6745A;  /*#1c87c9*/
      }
      textarea {
      width: calc(100% - 12px);
      padding: 5px;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 20px;
      }
      form {
      width: 70%;
      padding: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 8px #006622; 
      }
      img{
        width:20%;

      }
      .banner {
      position: relative;
      height: 250px;
      /*background-image: url("PROJETWEB/photo/prof.jpg");  */
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      }
      .banner::after {
      content: "";
      background-color: rgba(0, 0, 0, 0.025); 
      position: absolute;
      width: 100%;
      height: 100%;
      }
      .a, input, select, textarea {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      .a, input {
      width: calc(100% - 10px);
      padding: 5px;
      }
      input[type="date"] {
      padding: 4px 5px;
      }
      textarea {
      width: calc(100% - 12px);
      padding: 5px;
      }
      .item:hover p, .item:hover i, .question:hover p, .question label:hover, input:hover::placeholder {
      color:  #006622;
      }
   
      .item input:hover, .item select:hover, .item textarea:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 3px 0  #006622;
      color: #006622;
      }
      .item {
      position: relative;
      margin: 10px 0;
      }
    
      .colums {
      display:flex;
      justify-content:space-between;
      flex-direction:row;
      flex-wrap:wrap;
      }
      .colums div {
      width:48%;
      }
     
      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      button {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background: #f6745a ;/*#1c87c9*/
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background:  #113f59; /*#0692e8*/
      }
      @media (min-width: 568px) {
      .name-item, .city-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .name-item input, .name-item div {
      width: calc(50% - 20px);
      }
      .name-item div input {
      width:97%;}
      .name-item div label {
      display:block;
      padding-bottom:5px;
      }
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
     <li style="color: black;margin-left:-20px ;width: 500px;"><a href="emploi.php">Espace Administration</a></li>
        <li ><a href="ajoutercours.php" class="hh">Ajouter Un cours</a></li>
        <li><a href="ajouterprof.php" class="hh">Ajouter Enseignant</a></li>
        <li><a href="ajouter_filiere.php" class="hh">Ajouter Fili??re</a></li>
        <li><a href="Ajoutergroup.php" class="hh">Ajouter Un Groupe</a></li>
        <li><a href="ajoutersalle.php" class="hh">Ajouter Une salle</a></li>
        <li><a href="ajouter_semestre.php" class="hh">Ajouter Un Module</a></li>
        <li><a href="profil_admin.php" class="hh">Mon Profil</a></li>
        <li><a href="start.php" class="hh">Deconnexion</a></li>                               
    </ul>                                                                                                  
</nav>
    <div class="testbox">
    <form method="POST" action="#">
      <div class="banner">
      <h1>Ajouter Un Groupe &nbsp</h1>
        <img src="images/admin2.jpg" alt="photo">
      </div>
      <br/>
      <fieldset>
        <div class="colums">
          <div class="item">
            <label for="filiere">Filiere<span>*</span></label>
            <select name="filiere" class="a">
              <?php
                    include ("connexion.php");
                        $sql="SELECT * FROM `filiere`";
                        $result=mysqli_query($link,$sql);
                        while ($module=mysqli_fetch_assoc($result)){
                        echo '<option value='.$module["id_filiere"].'>';
                        echo $module["lib_filiere"];
                        echo'</option>';}
                    ?>
    </select><br><br>
          </div>
           <div class="item">
            <label for="section">Section</label>
            <input id="phone" type="text"   name="section">
          </div>
            <div class="item">
            <label for="cours">Groupe De Cours</label>
            <input id="phone" type="text"   name="cours">
          </div>
            <div class="item">
            <label for="td">Groupe De TD</label>
            <input id="phone" type="text"   name="td">
          </div>
           <div class="item">
            <label for="tp">Groupe De TP</label>
            <input id="phone" type="text"   name="tp">
          </div>
          <br>
        <div class="btn-block">
      <button type="order" name="enregistrer">Confirmer</button>
      </div>
    </div>
      </fieldset>
    </form>
    </div>
  </body>
</html>


<?php
  include ("connexion.php");
  if (isset($_POST['enregistrer'])) {
  $filiere=$_POST['filiere'];
  $section=$_POST['section'];
  $td=$_POST['td'];
  $tp=$_POST['tp'];

  $sql3="INSERT INTO `groupe`(`id_filiere`, `section`, `gr_td`, `gr_tp`)values('$filiere','$section','$td', '$tp')";
  $resultat3=mysqli_query($link,$sql3);
  if ($resultat3) {
  echo "votre ajout de groupe a ??t?? effectuer avec succ??s ";
  }
  else
  {
  echo "Erreur lors de l'ajout de groupe";
  }
}
?>