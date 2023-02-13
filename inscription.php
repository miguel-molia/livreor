<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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




    <form method="post">

        <h1>Inscription</h1>

        <div class="container2">


            <label for="login">Login</label>
            <input type="text" name="login">

            <label for="password">Password</label>
            <input type="password" name="password">

            <label for="confirm-password">Confirm Password</label>
            <input type="password" name="confirm-password">

            <input type="submit" value="Valider">


        </div>





    </form>




</body>

</html>





<?php
session_start();

$login = $_POST["login"];
$password = $_POST["password"];


$bdd = new mysqli("localhost:3306", "miguel-molia", "Laplateforme24", "miguel-molia_livreor");
if ($mysqli->connect_error) {
    echo "erreur de connexion a MySQL:" . $mysqli->connect_error;
    exit();
}


if (isset($_POST["login"], $_POST["password"], $_POST["confirm-password"])) {
    if (empty($_POST["login"]) || empty($_POST["password"]) || empty($_POST["confirm-password"])) {
        echo "<div class='echo'>Vous n'avez pas rempli tous les champs!</div>";
    } elseif ($_POST["password"] != $_POST["confirm-password"]) {
        echo "<div class='echo'> Mot de passe différent! </div>";
    } elseif (mysqli_num_rows(mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE login='" . $_POST['login'] . "'")) == 1) {
        echo "<div class='echo'>Ce login est déjà utilisé!</div>";
    } else {
        $query = $bdd->query("INSERT INTO `utilisateurs`( login, password) VALUES ('$login', '$password')");
        header("location: connexion.php");
    }
}




?>




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

    .echo {
        color: #ff704d;
        margin-left: 44%;
        font-size: 30px;
        font-family: 'Anton', sans-serif;


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
</style>