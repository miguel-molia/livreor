<?php

//j'ouvre une session
session_start();

//j'attribue des variables pour la connexion à la base de donnée
$host = "localhost";
$user = "root";
$password = "root";
$database = "livreor";


//connexion à la base de donnée
$connect = mysqli_connect($host, $user, $password, $database);

// requete bdd dans ma table commentaire + récupérer l'utilisateur associé au commentaire 

$bdd = $connect->query("SELECT commentaires.commentaire, commentaires.date, utilisateurs.login FROM commentaires INNER JOIN utilisateurs WHERE utilisateurs.id = commentaires.id_utilisateur ORDER BY date DESC");

//recupere les correspondances à ma requete dans ma bdd
$commentaires_utilisateurs = $bdd->fetch_all(MYSQLI_ASSOC);




?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="style.css">
    <title>Livre d'Or</title>
</head>

<body>
<?php 


//si la session de login est definie (ou existe)
if (isset($_SESSION["login"])) { ?>
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
        
            <!--j'affiche le resultat dans un tableau --> 
            <tr>
                <th>Posté le</th>
                <th>Utilisateurs</th>
                <th>Commentaires</th>

            </tr>
            <!-- j'effectue une boucle foreach (tableau) -->
            <?php foreach ($commentaires_utilisateurs as $key => $value) { ?>

                <tr>
                    

                    <td> <?= date('d-m-Y H:i:s', strtotime($value['date'])) ?> </td>
                    <td> <?= $value['login'] ?> </td>
                    <td> <?= $value['commentaire'] ?> </td>
        
                    
                

        </tr>
    <?php } ?>














    </table>


</body>

</html>





