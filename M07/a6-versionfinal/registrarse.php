<?php
    session_start();
    include "librerias.php";

    $usuario ="";
    $contraseña = "";
    $email = "";
    
    //Entra si está en POST.
    if($_SERVER["REQUEST_METHOD"]=='POST'){
        $usuario = $_POST["nombre"];
        $contraseña = $_POST["passwd"];
        $email = $_POST["correo"];
        $id_rol = 1;

        $comprovacionemail = validacionEmail($_REQUEST["correo"]);
        $comprovacioncontraseña = validacioContraseña($_REQUEST["passwd"]);

        //Si el usuario y la contraseña están en el formato adecuado sigue adelante.
        if($comprovacionemail == TRUE && $comprovacioncontraseña == TRUE){
            try{

                //Conexión hacia la base de datos.
                $conn = new mysqli('localhost', 'dsanchez', 'dsanchez', 'dsanchez_a5');
                $sql = "INSERT INTO usuaris (nom, password, email, id_rol) VALUES ('$usuario', '$contraseña', '$email', $id_rol)";
                echo $sql;
                $resultat = mysqli_query($conn, $sql);
                if (!$resultat){ 
                    die("Error de coneccion: " .$conn->error);
                }
                header("Location: login.php");

            }catch(mysqli_sql_exception $a){
                $a->errorMessage();
            }
        }else{
            echo "El email o la contraseña son erroneas";
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
        <form enctype="multipart/form-data" action="registrarse.php" method="post">
            <label>Nombre: </label><input type="text" name="nombre" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_REQUEST["nombre"];?>" ><br><br>

            <label>Email: </label><input type="text" name="correo" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_REQUEST["correo"];?>" ><br><br>

            <label>Contraseña: </label><input type="password" name="passwd" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_REQUEST["passwd"];?>" ><br><br>

            <button name="registrar" type="submit">Registrarse</button>
        </form>
    </body>
</html>