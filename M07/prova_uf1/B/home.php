<?php

    //Tanca la sessió i t'emporta al principi.
    session_start();
    if(isset($_SESSION["usuari"]) && isset($_SESSION["contrasenya"])){
        echo"Bienvenido ".$_SESSION["usuari"]." !";
        if(isset($_POST["logout"])){
            session_destroy();
        }
    }else{
        header("location: index.php");
    }

    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="home.php" method="post">
    <br><br><button name="logout" type="submit">Logout</button>
</form>
</body>
</html>