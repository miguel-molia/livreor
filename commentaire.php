<?php
//j'ouvre une session
session_start();

if (empty($_SESSION)) {
    header('location:index.php');
    exit();
}

//j'attribue des variables pour la connexion à la base de donnée
$host= "localhost";
$user="root";
$password= "root";
$database="livreor";

//connexion à la base de donnée
$connect = new mysqli($host, $user, $password, $database);

//j'attribue une variable à la session de l'id
$id = $_SESSION['id'];

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

<?php


//si "valider" existe (ou est defini)
if (isset($_POST["valider"]))

{   //si "commentaires" n'est pas vide 
    if (!empty($_POST["commentaires"])) {
        
        // j'attribue une variable à "commentaires" 
        $commentaire = $_POST['commentaires'];
        
        //j'attribue une variable à la date
        $date = date('Y-m-d H:i:s');
        
        
        //j'effectue ma requete (mise à jour)
        $res = $connect->query("INSERT INTO `commentaires`(`commentaire`, `id_utilisateur`, `date`) VALUES ('$commentaire','$id','$date')");
                
        // redirection vers la page livre-or
        header('location:livre-or.php');
        
        
        exit();
        
    }
    //sinon si "commentaires" n'est pas vide 
    elseif (empty($_POST["commentaires"]))

{
    echo "<div class= 'echo'> Commentaire inexistant! </div>";
}    
     
}

?>

</body>
</html>

