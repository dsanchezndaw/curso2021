<?php

session_start();
include "librerias.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $_SESSION["usuario"] = $_REQUEST["email"];
    $_SESSION["contraseña"] = $_REQUEST["password"];
    $comprovaremail=correo($_SESSION["usuario"]);
    $comprovarcontraseña=contraseña($_SESSION["contraseña"]);
    if ($comprovaremail=true and $comprovarcontraseña=true){
        if ($_REQUEST["email"] == "danielsanchez@gmail.com" and $_REQUEST["password"] == "abc1234"){
            header("Location: http://dawjavi.insjoaquimmir.cat/dsanchez/M07/sessions/sessions2.php");
        }else{
            echo "Este correo no existe";
        }

    }else{
        echo "Este correo no está en el formato idoneo";
    }
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
        <h2>Iniciar Sesion:</h2>
        <form action="sessions.php "method="post">
            <label>Nombre usuario: </label> <input type="text" value="" size="30" maxlength="100" name="email" id="" /><br /><br />
            <label>Contraseña: </label> <input type="password" value="" size="30" maxlength="100" name="password" id="" /><br /><br />
            <button id="mysubmit" type="submit">Enviar</button>
        </form>
    </body>
    </html>

  