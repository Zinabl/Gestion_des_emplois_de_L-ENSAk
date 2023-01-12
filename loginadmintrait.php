<?php
    
      include("connexion.php");

      $login=$_POST['login'];
      $password=$_POST['password'];

      if (empty($login) or empty($password)) {
      echo "veuillez saisir votre login or password";
      }else{

        $sql1="SELECT * FROM `admin` WHERE login='".$login."' ";
        $result1=mysqli_query($link,$sql1);
        $row1=mysqli_fetch_assoc($result1);

        if ($row1['pass']==$password) {
          session_start();
          $_SESSION['id_admin']=$row1['id_admin'];
          $_SESSION['login']=$row1['login'];
          header('Location: emploi.php');
        }else{ 
          header('Location: login_error.php');
        }

      }
    
  ?>