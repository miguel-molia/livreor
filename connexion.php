<?php
session_start();

$host = "localhost:3306";
$user = "miguel-molia";
$password = "Laplateforme24";
$database = "miguel-molia_livreor";


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
    <title>Connexion</title>
</head>

<body>



    <header>


        <a href="index.php">Accueil</a>
        <a href="inscription.php">S'inscrire</a>




    </header>


    <h1>Connexion</h1>

    <form method="post">

        <div class="container2">
            <label for="login">Login</label>
            <input type="text" name="login">

            <label for="password">Password</label>
            <input type="password" name="password">

            <input type="submit" value="Valider">


        </div>

        <?php
        $numligne = mysqli_num_rows($var);

        if ($numligne > 0) {
            $_SESSION['id'] = $user['id'];
            $_SESSION["login"] = $_POST["login"];
            $_SESSION["password"] = $_POST["password"];


            header("location: index.php");
        } 
        //sinon si login et mdp existe
        elseif (isset($_POST["login"]) && isset($_POST["password"]) && $num_ligne == 0) {
            echo "<p class= 'echo'>login ou mot de passe incorrect!</p>";
        }
        ?>





    </form>



</body>

</html>








<style>
    body {
        background-image: url("01.jpg");
        background-size: cover;
    }


    header {
        color: #ffdd99;
        display: flex;
        justify-content: end;
        font-size: 150%;
        gap: 30px;

    }

    .container2 {
        color: #ffdd99;
        width: 100px;
        margin: auto;
        margin-top: 15%;

    }

    h1 {
        width: 100px;
        margin: auto;
        color: #ffdd99;

    }

    a {
        text-decoration: none;
        color: #ffdd99;
    }

    input[type=submit] {
        background-color: wheat;
        color: black;
        padding: 5px 20px;
        margin: 15px 45px;
        cursor: pointer;
        width: 80%;
    }

    a:hover {
        text-decoration: underline;
    }

    .echo {
        color: #ff704d;
        margin-left: 44%;
        font-size: 30px;
        font-family: 'Anton', sans-serif;
    }
</style>