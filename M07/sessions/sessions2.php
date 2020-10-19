<?php

session_start();
if (isset($_SESSION["user"]) or isset($_SESSION["password"])){
    echo $_SESSION["user"];
    echo $_SESSION["password"];
}else{
    header("Location: http://dawjavi.insjoaquimmir.cat/dsanchez/M07/sessions/sessions.php");
}


?>