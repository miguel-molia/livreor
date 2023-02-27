<?php
//j'ouvre une session
session_start();

//j'attribue des variables pour la connexion à la base de donnée
$host = "localhost";
$user = "root";
$password = "root";
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

    <title>Profil</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

</head>

<body>

    <header>

        <div class="welcome"> <?= $_SESSION["login"] ?> </div>
        <a href="./index.php">Accueil</a>
        <a href="./commentaire.php">Poster un commentaire</a>
        <a href="./logout.php">Déconnexion</a>


    </header>


    <h1>Modifier profil</h1>

    <div class="block">
        <div class="container2">

            <a href="./modifier_login.php">Modifier login</a>

            <a href="./modifier_password.php">Modifier password</a>

        </div>

    </div>



</body>

</html>

<?php



// verif si tout existe
if (isset($_POST['modifier_login'], $_POST['modifier_password'], $_POST['cpassword'])) {
    // si modif passw et confirm passw n'est pas vide
    if (!empty($_POST['modifier_login']) || empty($_POST['modifier_password']) || empty($_POST['cpassword'])) {
        echo '<div class="echo"> Veuillez renseignez tous les champs! </div>';
    
    //sinon si modif passw et confirm passw sont differents
    } elseif ($_POST['modifier_password'] != ($_POST['cpassword'])) {
        
        echo "<div class= 'echo'> mot de passe différents!</div>";

    //sinon
    } else {

        //requete de mise à jour 
        $request = $connect->prepare("UPDATE utilisateurs SET password= ? WHERE id = ?");

        $request->bind_param('si', $_POST['modifier_password'], $_SESSION['id']);


        echo "<div class= 'echo'> mot de passe modifié!</div>";
    }



    //ok on vérfie si ils sont pas vides 
    if (!empty($_POST['modifier_login']) && !empty($_POST['modifier_password']) && !empty($_POST['cpassword'])) {
        //on verifie que ton modifier_password et ton cpassword ne sont pas vides
        if ($_POST['modifier_password'] == $_POST['cpassword']) {
            //je prepare ma requete pour mettre a jour un utilisateur dans          
            $request = $connect->prepare("UPDATE utilisateurs SET login = ?, password= ? WHERE id = ?");

            //je defini mes parametres (valeurs aux ?)
            $request->bind_param('ssi', $_POST['modifier_login'], $_POST['modifier_password'], $_SESSION['id']);
            //j'execute ma requete
            $request->execute();
            session_destroy();

            header('location:connexion.php');
        }
    }


    // $request->execute();
    $request->close();






    $requestUser = $connect->query("SELECT id, login FROM utilisateurs WHERE id = $_SESSION[id]");
    // $requestUser = $connect->query("SELECT * FROM utilisateurs");


    //je vais chercher (fetch) sous forme de tableau
    $user = $requestUser->fetch_array(MYSQLI_ASSOC);



    //modif $_SESSION 
    $_SESSION = $user;
    // var_dump($user);
}









?>