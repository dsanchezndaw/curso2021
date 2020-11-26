<?php
    session_start();
    include "librerias.php";

    $user = $_SESSION["user"];
    
    //Entra si está en POST.
    if($_SERVER["REQUEST_METHOD"]=='POST'){
        $conn = mysqli_connect('localhost', 'dsanchez', 'dsanchez', 'dsanchez_a5');
        if (!$conn) {
            die("Connection failed: " . $mysqli_connect_error);
        }

        //Añadir productos.
        if (isset($_REQUEST["anadirP"])){         
            $idP = $_POST['id'];
            $nomP = $_POST['nom'];
            $descr = $_POST['descripcio'];
            $preuP = $_POST['preu'];
            $sql = "INSERT INTO PRODUCTES (id, nom, descripcio, preu, user_id) VALUES ($idP,'$nomP', '$descr', '$preuP', '$user')";
            $result = $conn->query($sql);
            if (!$result) {
                die("error ejecutando la consulta:".$conn->error);
            }
            $conn->close();
        }
        
        //Modificar productos.
        if (isset($_REQUEST["modificarP"])){

            $idP = $_POST['id'];
            $nomP = $_POST['nom'];
            $descr = $_POST['descripcio'];
            $preuP = $_POST['preu'];
            $sql = "UPDATE PRODUCTES SET nom = '$nomP', descripcio = '$descr', preu = '$preuP' WHERE id= '$idP'";
            $result = $conn->query($sql);
            $conn->close();
        }

        //Eliminar productos.
        if (isset($_REQUEST["eliminarP"])){

            $idP = $_POST['id'];
            $sql = "DELETE FROM PRODUCTES WHERE id = $idP";
            $result = $conn->query($sql);
            if (!$result) {
                die("Error al ejecutarse la consulta:".$conn->error);
            }
            $conn->close();
        }
    }   

    if (isset($_SESSION["user"])){

        //Entrar a la base de datos.
        $conn = mysqli_connect('localhost', 'dsanchez', 'dsanchez', 'dsanchez_a5');
        if (!$conn) {
            die("Connection failed: " . $mysqli_connect_error);
        }

        //Muestra la tabla de productos.
        $sql = "SELECT id, nom, descripcio, preu FROM PRODUCTES";
        $result = $conn->query($sql);
        if (!$result) {
            die("Error al ejecutarse la consulta:".$conn->error);
        }

        echo "<table border=2><tr><th colspan ='4'><p><b>Tus productos</b></p></th></tr>";
        echo "<tr><td><b>Id</b></td><td><b>Nombre</b</td><td><b>Descripcion</b></td><td><b>Precio</b></td>";
        while($row = $result->fetch_assoc()) {

            echo "<tr><td>".$row["id"]."</td><td>".$row["nom"]."</td><td>".$row["descripcio"]."</td><td>".$row["preu"]."</td></tr>";
        }
        echo "</table></br>";
        $conn->close();
    }else {
        header("Location: login.php");
    }

    //Logout.
    if (isset($_REQUEST["logout"])){
        $_SESSION=null;
        setcookie('usercookie', null,0,'/');
        setcookie('passcookie', null,0,'/');
        session_destroy();
        header("Location: login.php");
    }
?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
        <body>
            
            <form action="privadaUsuari.php" method="post">

                <input type="submit" name="logout" value="Log Out">
                <h3>Añadir productos</h3>
                <label>ID: </label> <input type="text" size="30" maxlength="100" name="id"/><br /><br />
                <label>Nombre: </label> <input type="text" size="30" maxlength="100" name="nom"/><br /><br />
                <label>Descripcion: </label> <input type="text" size="30" maxlength="100" name="descripcio"/><br /><br />
                <label>Precio: </label><input type="text" name="preu">
                <input type="submit" name="anadirP" value="Añadir Producto">

            </form>

            <form action="privadaUsuari.php" method="post">

                <h3>Modificar prodcutos</h3>
                <p>Id del producto: <input type="text" name="id"></p>
                <p>Nombre: <input type="text" name="nom"></p>
                <p>Descripcion: <input type="text" name="descripcio"></p>
                <p>Precio: <input type="text" name="preu"></p>
                <input type="submit" name="modificarP" value="Modificar Producto">

            </form>

            <form action="privadaUsuari.php" method="post">
            
                <h3>Eliminar productos</h3>
                <p>Id: <input type="text" name="id"></p>
                <input type="submit" name="eliminarP" value="Eliminar Producto">

            </form>
        </body>
    </html>