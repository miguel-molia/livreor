<?php

session_start();

$host= "localhost:3306";
$user="miguel-molia";
$password= "Laplateforme24";
$database="miguel-molia_livreor";


$connect = new mysqli($host, $user, $password, $database);

$id = $_SESSION['id'];

if (isset($_POST["valider"]))

{
    if (!empty($_POST["commentaires"])) {
        
        
        $commentaire = $_POST['commentaires'];
        
        
        
        $res = $connect->query("INSERT INTO commentaires (commentaire, id_utilisateur) VALUES ('$commentaire','$id')");
        header('location:livre-or.php');
        exit();
        }
    elseif (empty($_POST["commentaires"]))

{
    echo "<div class= 'echo'> Commentaire inexistant! </div>";
}    
     
}





?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poster un commentaire</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    
    
    
    
<style> 
    


body
{
    background-image: url("01.jpg");
    background-size: cover;
    margin: 0;
    padding: 0;
}


.echo {
        color: #ff704d;
        margin-left: 44%;
        font-size: 30px;
        font-family: 'Anton', sans-serif;
    }

header
{
    color: #ffdd99;
    display: flex;
    justify-content: end;
    font-size: 150%;
    gap: 30px;

}

a
{
    text-decoration: none;
    color: #ffdd99;
}


a:hover
{
  text-decoration: underline;
}



input[type=submit] 

{background-color: wheat;
 color: black;
 padding: 5px 20px;
 margin: 15px 45px;
 cursor: pointer;
 width: 80%;
} 


.container2
{
    color: #ffdd99;
    width: 100px;
    margin: auto;
    margin-top: 15%;
 
}

.welcome

{
    color: #b3f0ff;
    
}

</style>
</head>
<body>
<header>

<div class="welcome"> <?= $_SESSION["login"] ?> </div>
            <a href="index.php">Accueil</a>
            <a href="commentaire.php">Poster un commentaire</a>
            <a href="logout.php">Déconnexion</a>


</header> 

<div class="container2">
<form method="post">


<label for="commentaires">Commentaires</label> <br>
<textarea cols="30" rows="5" name="commentaires"></textarea> <br>

<input type="submit" name="valider" value="valider">

</div>

</form>









</body>
</html>

