<?php
    session_start();
    if(isset($_SESSION["usuari"]) && isset($_SESSION["contrasenya"])){
        echo"Bienvenido ".$_SESSION["usuari"]." !";

    }else{
        session_destroy();
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
    <br><br><button name="logout" type="submit">Logout</button>

</body>
</html>