<?php
//j'ouvre une session
session_start();

//j'attribue des variables pour la connexion à la base de donnée
$host = "localhost";
$user= "root";
$password= "root";
$database = "livreor";


$login = $_POST["login"];
$password2 = $_POST["password"];

// je me connecte a la base de données
$connect = mysqli_connect($host, $user, $password, $database);

// je recuperes les infos de la table utilisateurs
$var = mysqli_query($connect, "SELECT * FROM utilisateurs WHERE login= '$login' AND password= '$password2'");
$user = $var->fetch_array();
// var_dump($user);



?>





<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Connexion</title>
</head>

<body>



    <header>


        <a href="index.php">Accueil</a>
        <a href="inscription.php">S'inscrire</a>




    </header>


    <h1>Connexion</h1>

    

        <div class="container2">
            
        <form method="post">
            <label for="login">Login</label>
            <input type="text" name="login">

            <label for="password">Password</label>
            <input type="password" name="password">

            <input type="submit" value="Valider">

        </form>
        </div>

        <?php
        //compter le nombre de lignes dans la base de données
        $numligne = mysqli_num_rows($var);

        //si il y a au moins une ligne
        if ($numligne > 0) {
            
            //attribuer chaque caractere à la session
            $_SESSION['id'] = $user['id'];
            $_SESSION["login"] = $_POST["login"];
            $_SESSION["password"] = $_POST["password"];


            header("location: index.php");
        } 
        //sinon si login et mdp existe (ou est defini) mais que le login ou mdp n'existe pas dans la base de donnée
        elseif (isset($_POST["login"]) && isset($_POST["password"]) && $num_ligne == 0) {
            echo "<p class= 'echo'>login ou mot de passe incorrect!</p>";
        }
        ?>





    



</body>

</html>

