<?php   

function correo($comprovaremail){
    if (filter_var($comprovaremail, FILTER_VALIDATE_EMAIL)){
        return false;
    }else{
        return true;
    }
}

function contraseña($comprovarcontraseña){
    if(preg_match("/^[a-zA-Z]+$/", $comprovarcontraseña)){
        return true;
    }else{
        return false;
    }
}

?>