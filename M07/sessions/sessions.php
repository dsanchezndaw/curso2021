
<?php
/*
session_start();
include "librerias.php";
$fallonombre="";
$fallocontraseña="";
$error=false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre = $_POST["nombre"];
    $contrasena = $_POST["contrasena"];
    if (filter_var($nombre) == false){
        $fallonombre="Ha de ser un email";
        $error = true;
    }
    if (preg_match("/^[a-zA-Z0-9]+$/", $contrasena) == false)  {
        $fallocontraseña="La contraseña tiene que ser solo de numeros o letras";
        $error = true;
    }
    try{
        $conn = new mysqli('localhost', 'dsanchez', 'dsanchez', 'dsanchez_');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "INSERT INTO user (users, passwords) VALUES (?, ?)";
        $res=$conn->prepare($sql);
        $res->bind_param("ss", $nombre, $contrasena);
        $res->execute();
        //$conn->close();

        $sql = "SELECT * FROM user";
        $result = $conn->prepare($sql);
        //$resultado=$result->query($sql);
        $result->execute();
        if($result==false){
            die("error ejecutando la consulta".$res->error());
        }
        while ($usuario = $result->fetch_assoc()){
            echo $usuario["user"].",".$usuario["password"]."<br>";
        }
    $result->free();
    $conn->close();
    
    }catch(mysqli_sql_exception $e) {
        $e->errorMessage();
    }
    

}
if ($_COOKIE["user"] == sha1(md5("danielsanchez@gmail.com")) && $_COOKIE["contraseña"] == sha1(md5("abc1234"))){
    header("Location: ./sessions2.php");
}
*/



/*

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
            Nombre: <input type="text" name="nombre"></br>
            Contraseña: <input type="password" name="contrasena"></br>
            Acepta coockies: <input type="checkbox" name="Aceptar"></br>
            <input type="submit" value="enviar">
        </form>
    </body>
    </html>

*/