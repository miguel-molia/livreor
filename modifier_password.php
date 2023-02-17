<?php
session_start();

$host = "localhost";
$user= "root";
$password= "root";
$database = "livreor";

// connexion à la BDD
$connect = mysqli_connect($host, $user, $password, $database);

//on verifie que la session existe 
if (empty($_SESSION)) {
    header('location:index.php');
    exit();
}


// verif si tout existe
if (isset($_POST['modifier_password'], $_POST['cpassword'])) 
// var_dump("dzd");
{
    // si modif passw et confirm passw n'est pas vide
    if (empty($_POST['modifier_password']) || empty($_POST['cpassword'])) 
    {
        echo '<div class="echo"> Veuillez renseignez tous les champs! </div>';
    
}

    elseif ($_POST['modifier_password'] != ($_POST['cpassword']))

    {
        echo "<div class= 'echo'> mot de passe différents!</div>";
    }
    
    else
    
    {  

    $request = $connect->query("UPDATE utilisateurs SET password= '" . $_POST['modifier_password'] . "' WHERE id = '" . $_SESSION['id'] . "'");



    // $_SESSION["login"] = $_POST['nouveau_login'];
    
    

    echo "<div class= 'echo'> mot de passe modifié!</div>";

    }

}



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <title>Modifier password</title>
</head>
<body>
<header>

<div class="welcome"> <?= $_SESSION["login"] ?> </div>
<a href="./index.php">Accueil</a>
<a href="./modifier_login.php">Modifier login</a>
<a href="./commentaire.php">Poster un commentaire</a>
<a href="./logout.php">Déconnexion</a>


</header>




<div class="container2">
            <form method="post">


                <label for="modifier_password">Modifier password</label>
                <input type="password" name="modifier_password">

                <label for="cpassword">Confirmer password</label>
                <input type="password" name="cpassword">


                <input type="submit" name="submit" value="valider">


            </form>
        </div>



</body>
</html>