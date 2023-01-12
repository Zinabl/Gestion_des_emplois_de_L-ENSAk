<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login_error</title>
    <style>
        body{
    margin:auto ;
    width: 100%;
    background-color: red;
    background-image: url("images/signal.gif");s
}
div{
    background-color: white;
    box-shadow: 6px 5px 1px 0px rgba(114, 105, 105, 0.3);
    border-radius: 5px;
    width: 70%;
    margin-top: 35px;
    margin-left: auto;
    margin-right: auto;
    padding:5px;
}
h2, h1{
    text-align: center;
    color: red;
    font-family: 'Segoe UI', Tahoma, Verdana, sans-serif;
}
p{
    text-align: center;
    color: red; 
}
#button{
    background-color: red;
    border-radius: 5px;
    padding: 10px;
    margin: 5px;
    border-color: red;
    color: white;
    box-shadow: 6px 5px 1px 0px rgba(114, 105, 105, 0.3);
    font-size: 20px;
}
  </style>
</head>
<body>
    <div>
        <p><img src="images/warning.jpeg" width=30%></p>
        <p><img src="images/error.jpeg" width=10%></p>
        <h1>Ereur de de connexion !!</h1>
        <p><h2>Login ou mot de passe invalide !!</h2></p><br><br>
        <a href=start.php><p><button id="button">Se connecter à nouveau</button></p></a>
    </div>
</body>
</html>