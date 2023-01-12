<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="./pagecss.css">

</head>

<body>

<div class="box-form">
	<div class="left">
		<div class="overlay">
		<h1 style="font-size: 420%;line-height: 1.5;color: #444739;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</h1>
		
		<span>
			<br><br>
			<a class="lien" href="https://ensa.uit.ac.ma/">ENSA Web Site</a>
			<a class="lien" href="start.php">Page d'Acceuil</a>
		</span>
		</div>
	</div>
	
	
		<div class="right">
		<h5>Login</h5>
		<p>Pour se connecter veuillez entrer votre login et mot de passe</p>


		<form action="" method="post">
		<div class="inputs">
			<input type="text" placeholder="votre login" name="login">
			<br>
			<input type="password" placeholder="mot de passe" name="password">
		</div>
			
			<br><br>
			
		<div class="remember-me--forget-password">
				
	<label>
		<input type="checkbox" name="item" checked/>
		<span class="text-checkbox">Rappeler moi</span>
	</label>
			
		</div>
			
			<br>
			<button name="connecter">Login</button>
</form>
	</div>

</div>  
</body>
</html>

<?php
		if(isset($_POST['connecter'])){
			include("connexion.php");

			$login=$_POST['login'];
			$password=$_POST['password'];

			if (empty($login) or empty($password)) {
			header('veuillez saisir votre login or password');
			}else{

				$sql="SELECT * FROM `prof` WHERE login='".$login."' ";
				$result=mysqli_query($link,$sql);
				$row=mysqli_fetch_assoc($result);

				if ($row['pass']==$password) {
					session_start();
					$_SESSION['id_prof']=$row['id_prof'];
					$_SESSION['login']=$row['login'];
					header('Location: Professeurs.php');
				}else{ 
					header('Location: login_error.php');
				}

			}
		}
	?>
