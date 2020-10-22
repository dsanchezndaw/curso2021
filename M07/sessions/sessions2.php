<?php

session_start();
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    session_destroy();
}
if (isset($_SESSION["usuario"]) or isset($_SESSION["contraseña"])){
    echo $_SESSION["usuario"];
    echo $_SESSION["contraseña"];
}else{
    header("Location: http://dawjavi.insjoaquimmir.cat/dsanchez/M07/sessions/sessions.php");
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
    <form action="sessions2.php" method="post">
        <input type="submit" value="salir">
    </form>
</body>
</html>