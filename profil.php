<?php
session_start();

$host = "localhost:3306";
$user = "miguel-molia";
$password = "Laplateforme24";
$database = "miguel-molia_livreor";

// connexion à la BDD
$connect = mysqli_connect($host, $user, $password, $database);

//on verifie que la session existe 
if (empty($_SESSION)) {
    header('location:index.php');
    exit();
}
// if(isset()) {
//     header('location:profil.php');
//     exit();
// }

// var_dump('jghghg');
// var_dump($_SESSION['id']);

// var_dump($_SESSION);
//verifie si $_post existe 
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

</head>

<body>

    <header>

        <div class="welcome"> <?= $_SESSION["login"] ?> </div>
        <a href="index.php">Accueil</a>
        <a href="commentaire.php">Poster un commentaire</a>
        <a href="logout.php">Déconnexion</a>
     

    </header>

    <div class="block">
        <h1>Modifier profil</h1>


        <div class="container2">
            <form method="post">

                <label for="modifier_login">Modifier login</label>
                <input type="text" name="modifier_login" value="<?= $_SESSION["login"];
                                                                ?>">

                <label for="modifier_password">Modifier password</label>
                <input type="password" name="modifier_password">

                <label for="cpassword">Conf password</label>
                <input type="password" name="cpassword">


                <input type="submit" name="submit" value="valider">


            </form>
        </div>
    </div>


</body>

</html>

<?php




if (isset($_POST['modifier_login'], $_POST['modifier_password'], $_POST['cpassword'])) 

{



    

    



    if (!empty($_POST["modifier_login"])) {
        $request = $connect->prepare("UPDATE utilisateurs SET login = ? WHERE id = ?");

        $request->bind_param('si', $_POST['modifier_login'], $_SESSION['id']);

        $request->execute();
    }


    if (!empty($_POST['modifier_password']) && !empty($_POST['cpassword'])) {
        if ($_POST['modifier_password'] == $_POST['cpassword'])

            $request = $connect->prepare("UPDATE utilisateurs SET password= ? WHERE id = ?");

        $request->bind_param('si', $_POST['modifier_password'], $_SESSION['id']);

        $request->execute();
    }


    //ok on vérfie si ils sont pas vides 
    if (!empty($_POST['modifier_login']) &&  !empty($_POST['modifier_password']) && !empty($_POST['cpassword'])) {



        //on verifie que ton modifier_password et ton cpassword ne sont pas vides
        if ($_POST['modifier_password'] == $_POST['cpassword']) {
            //requete Update 


            //je prepare ma requete pour mettre a jour un utilisateur dans          
            $request = $connect->prepare("UPDATE utilisateurs SET login = ?, password= ? WHERE id = ?");

            //je defini mes parametres (valeurs aux ?)
            $request->bind_param('ssi', $_POST['modifier_login'], $_POST['modifier_password'], $_SESSION['id']);
            //j'execute ma requete
            $request->execute();
        }
    }




    $requestUser = $connect->query("SELECT id, login FROM utilisateurs WHERE id = $_SESSION[id]");
    // $requestUser = $connect->query("SELECT * FROM utilisateurs");


    //je vais chercher (fetch) sous forme de tableau
    $user = $requestUser->fetch_array(MYSQLI_ASSOC);



    //modif $_SESSION 
    $_SESSION['login'] = $user['login'];
    //  var_dump($user);

}

if (!empty($_POST['modifier_login']) || empty($_POST['modifier_password']) || empty($_POST['cpassword']))

    {
        echo "<div class= 'echo'> Veuillez renseignez tous les champs du mot de passe! </div>";
    }

    elseif ($_POST['modifier_password'] != ($_POST['cpassword']))

    {
        echo "<div class= 'echo'> mot de passe différents!</div>";
    }






?>





<style>
    body {
        /* background-image: url("01.jpg");
        background-size: cover; */
        margin: 0;
        padding: 0;
    }


    header {
        color: #ffdd99;
        display: flex;
        justify-content: end;
        font-size: 150%;
        gap: 30px;

    }

    a {
        text-decoration: none;
        color: #ffdd99;
    }


    a:hover {
        text-decoration: underline;
    }

    .welcome {
        color: #b3f0ff;

    }

    .container2 {

        color: #ffdd99;
        width: 100px;
        margin: auto;
        margin-top: 15%;

    }

    form {
        display: flex;
        flex-direction: column;
    }

    input[type=submit] {
        background-color: wheat;
        color: black;
        padding: 5px 20px;
        margin: 15px 45px;
        cursor: pointer;
        width: 80%;
    }

    h1 {
        width: 100px;
        margin: auto;
        color: #ffdd99;

    }

    /* .block{
    display: flex;
    flex-direction: column;
    justify-content: center;
    min-height: 100vh;
    width: fit-content;
    margin: auto;

} */


.echo {
        color: #ff704d;
        margin-left: 44%;
        font-size: 30px;
        font-family: 'Anton', sans-serif;


    }
</style>