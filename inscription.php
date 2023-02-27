<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Inscription</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
</head>

<body>


    <header>


        <a href="index.php">Accueil</a>
        <a href="connexion.php">Se connecter</a>


    </header>




    

        <h1>Inscription</h1>

        <div class="container2">
            <form method="post">

            <label for="login">Login</label>
            <input type="text" name="login">

            <label for="password">Password</label>
            <input type="password" name="password">

            <label for="confirm-password">Confirm Password</label>
            <input type="password" name="confirm-password" >

            <input type="submit" name="submit" value="Valider">
            </form>

        </div>





    




</body>

</html>





<?php
//j'ouvre une session
session_start();

$login = $_POST["login"];
$password = $_POST["password"];

// je me connecte a la base de données
$bdd = new mysqli("localhost", "root", "root", "livreor");
if ($mysqli->connect_error) {
    echo "erreur de connexion a MySQL:" . $mysqli->connect_error;
    exit();
}



// si mon formulaire a bien ete validé
if(isset($_POST['submit']))

{
    // si mes champs sont vides
    if (empty($_POST["login"]) || empty($_POST["password"]) || empty($_POST["confirm-password"])) 
    {
        echo "<div class='echo'>Vous n'avez pas rempli tous les champs!</div>";
    } 
    
    elseif ($_POST["password"] != $_POST["confirm-password"]) 
    
    {
        echo "<div class='echo'> Mot de passe différent! </div>";
    } 
    elseif (mysqli_num_rows(mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE login='" . $_POST['login'] . "'")) == 1) 
    
    {
        echo "<div class='echo'>Ce login est déjà utilisé!</div>";
    } 
    
    else 
    
    {
        $query = $bdd->query("INSERT INTO `utilisateurs`( login, password) VALUES ('$login', '$password')");
        header("location: connexion.php");
    }
}




?>



