<?php

session_start();

if (isset($_SESSION["usuario"]) or isset($_SESSION["contraseña"])){
    echo $_SESSION["usuario"];
    echo $_SESSION["contraseña"];
}else{
    header("Location: http://dawjavi.insjoaquimmir.cat/dsanchez/M07/sessions/sessions.php");
}


?>