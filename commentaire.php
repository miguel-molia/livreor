<?php

session_start();

$host= "localhost";
$user="root";
$password= "root";
$database="livreor";


$connect = new mysqli($host, $user, $password, $database);

$id = $_SESSION['id'];

if (isset($_POST["valider"]))

{
    if (!empty($_POST["commentaires"])) {
        
        
        $commentaire = $_POST['commentaires'];
        $date = date('Y-m-d H:i:s');
        
        
        
        $res = $connect->query("INSERT INTO `commentaires`(`commentaire`, `id_utilisateur`, `date`) VALUES ('$commentaire','$id','$date')");
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
    <link rel="stylesheet" href="style.css">
    
    

</head>
<body>
<header>

<div class="welcome"> <?= $_SESSION["login"] ?> </div>
            <a href="index.php">Accueil</a>
            <a href="profil2.php">Modifier profil</a>
            <a href="logout.php">Déconnexion</a>


</header> 

<div class="container2">



<div class="block">

<form method="post">

<label for="commentaires">Commentaires</label> <br>

<textarea cols="30" rows="5" name="commentaires"></textarea> <br>

<input type="submit" name="valider" value="valider">
</form>

</div>


</div>











</body>
</html>

