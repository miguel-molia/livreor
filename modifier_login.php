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
    <title>modifier login</title>
</head>
<body>
<header>

<div class="welcome"> <?= $_SESSION["login"] ?> </div>
<a href="./index.php">Accueil</a>
<a href="./modifier_password.php">Modifier password</a>
<a href="./commentaire.php">Poster un commentaire</a>
<a href="./logout.php">Déconnexion</a>


</header>

<div class="container2">
    
                <form method="post">

                <label for="login_actuel">Login actuel</label>
                <input type="text" name="login_actuel" value="<?= $_SESSION["login"];
                                                                ?>">

                <label for="nouveau_login">Nouveau login</label>
                <input type="text" name="nouveau_login">

                <input type="submit" name="submit" value="valider">


            </form>
        </div>
        <?php // verif si tout existe
if (isset($_POST['login_actuel'], $_POST['nouveau_login'])) 

{

    $query = mysqli_query($connect,"SELECT * FROM utilisateurs WHERE login='" . $_POST['nouveau_login'] . "'" );
 
    if (empty($_POST['login_actuel']) || empty($_POST['nouveau_login'])) 
    {
        echo '<div class="echo"> Veuillez renseignez tous les champs! </div>';
    
}

elseif (mysqli_num_rows($query) == 1)
        {
            echo "<div class= 'echo'>Ce login est déjà utilisé!</div>";
        }

    elseif ($_POST['login_actuel'] == ($_POST['nouveau_login']))

    {
        echo "<div class= 'echo'> Vous avez renseigné votre login actuel!</div>";
    }
    
    
    
    else
    
    {  

    $request = $connect->query("UPDATE utilisateurs SET login= '" . $_POST['nouveau_login'] . "' WHERE id = '" . $_SESSION['id'] . "'");


    $_SESSION["login"] = $_POST['nouveau_login'];
    
    

    echo "<div class= 'echo'> login modifié!</div>";

    }

}
?>





</body>
</html>