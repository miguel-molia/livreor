<?php
//j'ouvre une session
session_start();


if(isset($_SESSION['login'])) {
        
    echo '<header>
        
    <div class="welcome"> ' . $_SESSION["login"]. ' </div>   
    <a href="profil2.php">Modifier profil</a>
    <a href="commentaire.php">Poster un commentaire</a>
    <a href="logout.php">Déconnexion</a>
    <a href="livre-or.php"> Livre d`Or </a>
    </header>';

} 


else {
echo "<header>

<a href='index.php'>Accueil</a>
    <a href='connexion.php'>Se connecter</a>
    <a href='inscription.php'>S'inscrire</a>
    <a href='livre-or.php'> Livre d'Or</a>
</header>";

}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>

<body>

    <?php

    if (!isset($_SESSION["login"]))

    {
        echo "<body> 
        
            <div class= 'bienvenue'>Bienvenue sur mon site </div>
        
            </body>";
    }


    ?>  




</body>

</html>

<style>

body
{
    background-image: url("01.jpg");
    background-size: cover;
}

.container
{
    color: #ffdd99;
    padding: 157px;
    font-size: 450%;
    padding-left: 39%;
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


.welcome

{
    color: #b3f0ff;
    
}

.bienvenue
{
    color: #ffdd99;
    margin-left: 27%;
    margin-top: 18%;
    font-size: 77px;

}

</style>