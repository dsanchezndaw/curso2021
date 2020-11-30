<?php
    session_start();

    $conn = mysqli_connect('localhost', 'dsanchez', 'dsanchez', 'dsanchez_db_prova');

    if (!$conn) {
        die("Connection failed: " . $mysqli_connect_error);
    }

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $_SESSION["usuari"]=$_POST["username"];
        $_SESSION["contrasenya"]=$_POST["password"];

        $usuari=$_POST["username"];
        $contrasenya=md5($_POST["password"]);

        $sql = "SELECT * FROM usuaris_examen WHERE username = '$usuari' AND password = '$contrasenya'";
        
        $result = $conn->query($sql);
        
        if(isset($_REQUEST["login"])){
            if($usuari==$_POST["username"] && $contrasenya==md5($_POST["password"])){
                header("location: home.php");
            }else{
                echo "Usuario o contraseña equivocado";
            }
        }
    }

?>


<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
        <body>
            <form enctype="multipart/form-data" action="index.php" method="post">
                <h2>Iniciar Sesion</h2>
                <label for="username">Username: <input type="text" name="username"></label><br><br>
                <label for="password">Contrasenya: <input type="password" name="password"></label><br><br>
                <button name="login" type="submit">Login</button>
            </form>
        </body>
    </html>