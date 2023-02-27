<?php
//j'ouvre une session
session_start();
unset($_SESSION);
//je ferme la session
session_destroy();

{ //redirecion a la page index
    header("location:index.php");
}





?>