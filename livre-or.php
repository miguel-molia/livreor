<?php
// connexion à ma bdd

session_start();

$host = "localhost";
$user = "root";
$password = "root";
$database = "livreor";


$connect = mysqli_connect($host, $user, $password, $database);

// requete bdd dans ma table commentaire + récupérer l'utilisateur associé au commentaire 

$bdd = $connect->query("SELECT commentaires.commentaire, commentaires.date, utilisateurs.login FROM commentaires INNER JOIN utilisateurs WHERE utilisateurs.id = commentaires.id_utilisateur ORDER BY date DESC");
$commentaires_utilisateurs = $bdd->fetch_all(MYSQLI_ASSOC);




?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d'Or</title>
</head>

<body>
<?php if (isset($_SESSION["login"])) { ?>
    <header> 

    <div class="welcome"> <?= $_SESSION["login"] ?> </div>
                <a href="index.php">Accueil</a>
                <a href="commentaire.php">Poster un commentaire</a>
                <a href="logout.php">Déconnexion</a>
    
    
    </header>;
<?} else { ?>
    <header>

    <a href='index.php'>Accueil</a>
    <a href='connexion.php'>Se connecter</a>
    <a href='inscription.php'>Créer compte</a>
    
    
</header>;
<? } ?>







    <table>
        
            
            <tr>
                <th>Posté le</th>
                <th>Utilisateurs</th>
                <th>Commentaires</th>

            </tr>
            <?php foreach ($commentaires_utilisateurs as $key => $value) { ?>

                <tr>
                    <?php $laplateforme = 'd-M-Y H:i:s A'; ?>

                    <td> <?= date($laplateforme,$value['date']) ?> </td>
                    <td> <?= $value['login'] ?> </td>
                    <td> <?= $value['commentaire'] ?> </td>
        

       

        </tr>
    <?php } ?>














    </table>


</body>

</html>





