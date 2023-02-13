<?php
session_start();

$host = "localhost";
$user = "root";
$password = "root";
$database = "livreor";

$login = $_POST["login"];
$prenom = $_POST["prenom"];
$nom = $_POST["nom"];
$password2 = $_POST["password"];




$connect= mysqli_connect($host, $user, $password, $database);
$var= mysqli_query($connect, "SELECT * FROM utilisateurs WHERE login= '$login' AND password= '$password2'");




?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>

<header>

    <div class="welcome">  Hello <?= $_SESSION["login"]?> !☺️ </div>
    <a href="index.php">Accueil</a>
    <a href="logout.php">deconnexion</a>

</header>
    
</body>
</html>


<style>

body
{
    background-image: url("01.jpg");
    background-size: cover;
}

header
{
    color: #ffdd99;
    display: flex;
    justify-content: end;
    font-size: 150%;
    gap: 30px;

}

.container2
{
    color: #ffdd99;
    width: 100px;
    margin: auto;
    margin-top: 15%;
 
}

h1
{
    width: 100px;
    margin: auto;
    color: #ffdd99;
}

.echo
{
    color: #ff704d;
    margin-left: 44%;
    font-size: 30px;
    font-family: 'Anton', sans-serif;
    

}

a
{
    text-decoration: none;
    color: #ffdd99;
}

input[type=submit] 
{background-color: wheat;
 color: black;
 padding: 5px 20px;
 margin: 15px 45px;
 cursor: pointer;
 width: 80%;
} 

a:hover
{
  text-decoration: underline;
}


.welcome

{
    font-family: 'Lilita One', cursive;
    font-size: 150%;
        
    
}

</style>