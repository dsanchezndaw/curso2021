<?php
    include "librerias.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $_REQUEST["user"]=$_REQUEST["registraemail"];
        $_REQUEST["password"]=$_REQUEST["registracontraseña"];
        $conn = new mysqli('localhost', 'dsanchez', 'dsanchez', 'dsanchez_');

        if($conn->connect_error){
            die("Connection failed: ". $conn -> connect_error);
        }

        $usuario=$_REQUEST["RegistraEmail"];
        $contraseña=$_REQUEST["RegistraContraseña"];

        $comprovaremail = correo($_SESSION["user"]);
        $comprovarcontraseña = contraseña($_SESSION["contraseña"]);

        if (isset($_REQUEST["registrar"])){
            if ($comprovaremail=true && $comprovarcontraseña=true){
                if ($_POST["registraemail"] == sha1(md5($usuario)) && $_POST["registracontraseña"] == sha1(md5($contraseña))){
                    echo("Este usuario ya está creado");
                }else{
                    echo "Este correo no existe";
                    $conn -> query("INSERT INTO user(users, passwords) VALUES ($usuario, $contraseña)");
                    $result = (mysqli_query($mysqli.$conn));
                }
            }else{
                echo "Este correo no está en el formato idoneo";
            }
        }
        $misqli->close();

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
    
</body>
</html>