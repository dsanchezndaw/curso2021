<?php
$usuario="daniel";
$contraseña="abc1234";
session_start();
setcookie("user", sha1(md5($usuario)) , time() + 365 * 24 * 60 * 60); 
setcookie("password", sha1(md5($contraseña)) , time() + 365 * 24 * 60 * 60); 

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_REQUEST["user"] == $usuario and $_REQUEST["password"] == $contraseña){
            $_SESSION["usuario"]=$_REQUEST["user"];
            $_SESSION["contraseña"]=$_REQUEST["password"];
            header("Location: http://dawjavi.insjoaquimmir.cat/dsanchez/M07/sessions/sessions2.php");

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
                <label>Nombre usuario: </label> <input type="text" value="" size="30" maxlength="100" name="user" id="" /><br /><br />
                <label>Contraseña: </label> <input type="password" value="" size="30" maxlength="100" name="password" id="" /><br /><br />
                <button id="mysubmit" type="submit">Enviar</button>
            </form>
        </body>
        </html>

  