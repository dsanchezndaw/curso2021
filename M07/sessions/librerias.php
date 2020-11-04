<?php   

function correo($nombre){
    if (filter_var($nombre, FILTER_VALIDATE_EMAIL)){
        return false;
    }else{
        return true;
    }
}

function contraseña($contrasena){
    if(preg_match("/^[a-zA-Z]+$/", $contrasena)){
        return true;
    }else{
        return false;
    }
}

?>