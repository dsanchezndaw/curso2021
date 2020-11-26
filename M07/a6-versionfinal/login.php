<?php
    session_start();
    include "librerias.php";

    //Hace la conexion a la base de datos. 
    $conn = mysqli_connect('localhost', 'dsanchez', 'dsanchez', 'dsanchez_a5');
    
    if (!$conn) {
        die("Connection failed: " . $mysqli_connect_error);
    }
    
    //Entra si está en POST.
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $_SESSION["email"]=$_POST["correo"];
        $_SESSION["password"]=$_POST["passwd"];
        setcookie("usercookie", sha1(md5($_SESSION["email"])), time() + 365 * 24 * 60 * 60);
        setcookie("passcookie", sha1(md5($_SESSION["password"])), time() + 365 * 24 * 60 * 60);

        //Usuario y contraseña.
        $usuario = $_POST["correo"];
        $contraseña = $_POST["passwd"];

        //Comprueba el usuario y la contraseña
        $comprovacionemail = validacionEmail($_REQUEST["correo"]);
        $comprovacioncontraseña = validacioContraseña($_REQUEST["passwd"]);

        $sql = "SELECT * FROM usuaris WHERE email = '$usuario' AND password = '$contraseña'";
        $result = $conn->query($sql);
        if (isset($_REQUEST["login"])){
            
            if ($comprovacionemail == TRUE &&  $comprovacioncontraseña == TRUE){
                if ($result->num_rows > 0){
                    $user = $result->fetch_assoc();
                    $conn->close();
                    $_SESSION["user"]=;
                    if ($user["id_rol"]==1){
                        header("Location: privadaAdmin.php");
                    }else if($user["id_rol"]==2){
                        header("Location: privadaUsuari.php");
                    }
                }else{
                    echo "El usuario o la contraseña son incorrectas.";
                }
            }else{
                echo "El email o la contraseña no están en el formato indicado.";
            }
        }

        //Aqui te registras en caso de que seas un nuevo usuario.
        if (isset($_REQUEST["registrar"])){
            header("Location: registrarse.php");
        }

        //Enseña los productos que hay.
        if (isset($_REQUEST["productes"])){

            //Enseña la tabla productos.
            $tabla = "SELECT id, nom, descripcio, preu, user_id FROM PRODUCTES";
            $result = $conn->prepare($tabla);
            $result->execute();
            $result->bind_result($tid, $tnom, $tdescripcio, $tpreu, $tiduser);
            echo "<table border=2><tr><th colspan ='5'><p><b>Todos los Productos</b></p></th></tr>";
            echo "<tr><td><b>Id</b></td><td><b>Nombre</b</td><td><b>Descripcion</b></td><td><b>Precio</b></td><td><b>Usuario</b></td>";
            while ($result->fetch()){
                echo "<tr><td>$tid</td><td>$tnom</td><td>$tdescripcio</td><td>$tpreu</td><td>$tiduser</td></tr>";
            }
            echo "</table></br>";
            $conn->close();
        } 

        //Busca un producto en la base de datos.
        if (isset($_REQUEST["buscar"])){
            $buscadorNombre = $_POST["buscador"];
            $tabla= "SELECT id, nom, descripcio, preu, user_id FROM PRODUCTES WHERE nom = '$buscadorNombre'";
            $result = $conn->query($tabla);
            if($result->num_rows > 0){
                $result = $conn->prepare($tabla);
                $result->execute();
                $result->bind_result($tid, $tnom, $tdescripcio, $tpreu, $tiduser);
                echo "<table border=2><tr><th colspan ='5'><p><b>Tots els productes</b></p></th></tr>";
                echo "<tr><td><b>Id</b></td><td><b>Nom</b</td><td><b>Descripcio</b></td><td><b>Preu</b></td><td><b>User</b></td>";
                while ($result->fetch()){
                    echo "<tr><td>$tid</td><td>$tnom</td><td>$tdescripcio</td><td>$tpreu</td><td>$tiduser</td></tr>";
                }
                echo "</table></br>";
                $conn->close();
            }else {
                echo "No hay productos con este nombre.";
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
            <form enctype="multipart/form-data" action="login.php" method="post">
                <h2>Iniciar Sesion</h2>
                <p>Email: <input type="text" name="correo"></p>
                <p>Contraseña: <input type="password" name="passwd"></p>
                <p>Aceptar cookies? <input type="checkbox" name="Aceptar"></p>
                <button name="login" type="submit">Login</button>
                <button name="registrar" type="submit">Registrarse</button>
                <button name="productes" type="submit">Lista de Productos:</button></br></br>

                <form enctype="multipart/form-data" action="login.php" method="post">
                    <p>Buscador: <input type="text" name="buscador" id="buscador" placeholder="buscar">
                    <input type="submit" value="buscar" name="buscar"></p>
                </form>
            </form>
        </body>
    </html>