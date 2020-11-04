<?php

session_start();

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
        Nombre: <input type="text" name="nombre"></br>
        Contraseña: <input type="password" name="contrasena">
    </form>
</body>
</html>