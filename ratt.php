<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Ajouter Rattrapage</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <style>
        @font-face{
            font-family:"mapolice";
            src:url("police/Lobster-Regular.ttf");
        }
        body{background-image: linear-gradient(135deg, #FAB2FF 10%, #1904E5 100%);}
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
      width: 100%;
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
    </style>
  </head>
  <body> 
<nav><?php include("accueil_prof.php") ?></nav>

    <?php
      include ("connexion.php");
      session_start();
      $sql="select * from prof where login='".$_SESSION['login']."'";
      $result=mysqli_query($link,$sql);
      $data=mysqli_fetch_assoc ( $result );
    ?>


    <div class="testbox">
    <form method="GET" action="#">
      <div class="banner">
      <h1>Ajouter Un Rattrapage &nbsp</h1>
        <img src="images/prof1.jpg" alt="photo">
      </div>
      <br/>
      <fieldset>
        <legend>Réserver une salle</legend>
        <div class="colums">
          <div class="item">
            <label for="nom">Nom<span>*</span></label>
            <input id="fname" type="text" name="nom" value=<?php echo $data['Nom'];?> >
          </div>
          <div class="item">
            <label for="lname"> Prénom<span>*</span></label>
            <input id="lname" type="text" name="lname" value=<?php echo $data['Prénom'];?> >
          </div>
          <div class="item">
            <label for="date">Date</label>
            <input id="phone" type="date"   name="date">
          </div>
           <div class="item">
            <label for="heure">Heure</label>
            <input id="phone" type="time"   name="heure">
          </div>
          <div class="item">
            <label for="filiere">Filière</label>
            <select name="filiere" class="a">
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
    <label for="semestre">Semestre<span>*</span></label>
            <select name="semestre" class="a">
              <?php
                    include ("connexion.php");
                        $sql="SELECT * FROM `semestre`";
                        $result=mysqli_query($link,$sql);
                        while ($module=mysqli_fetch_assoc($result)){
                        echo '<option value='.$module["id_semestre"].'>';
                        echo $module["lib_semestre"];
                        echo'</option>';}
                    ?>
    </select><br><br>
          </div>
          
          <div class="item">
            <label for="salle">Salle<span>*</span></label>
            <select name="salle" class="a">
          <?php
                    include ("connexion.php");
                        $sql="SELECT * FROM `salle`";
                        $result=mysqli_query($link,$sql);
                        while ($salle=mysqli_fetch_assoc($result)){
                        echo '<option value='.$salle["id_salle"].'>';
                        echo $salle["lib_salle"];
                        echo'</option>';}
                    ?>
    </select><br><br>
            <label for="module">Module<span>*</span></label>
            <select name="module" class="a">
              <?php
                    include ("connexion.php");
                        $sql="SELECT * FROM `module`";
                        $result=mysqli_query($link,$sql);
                        while ($module=mysqli_fetch_assoc($result)){
                        echo '<option value='.$module["id_module"].'>';
                        echo $module["lib_module"];
                        echo'</option>';}
                    ?>
    </select><br><br>
         
      </fieldset>
      <br/>
      
      <div class="btn-block">
      <button type="order" name="enregistrer">Confirmer</button>
      </div>
    </form>
    </div>
  </body>
</html>

<?php
  include ("connexion.php");
  if (isset($_GET['enregistrer'])) {
  $a=$_SESSION['id_prof'];
  $nom=$_GET['nom'];
  $filiere=$_GET['filiere'];
  $module=$_GET['module'];
  $salle=$_GET['salle'];
  $date=$_GET['date'];
  $heure=$_GET['heure'];
  $semestre=$_GET['semestre'];

  $sql="INSERT INTO `ratt`(`id_prof`,`professeur`, `id_salle`, `id_filiere`, `id_module`,`id_semestre`, `date_ratt`, `heure`)values('$a','$nom','$salle','$filiere','$module','$semestre','$date','$heure')";
  $resultat=mysqli_query($link,$sql);
  if ($resultat==true) {
  echo "Votre Réservation a été effectuer avec succés";
  }
  else
  {
  echo "Erreur lors de l'ajout de votre réservation";
  }
}
?>