<?php
    // Validacio del Email
    function validacionEmail($comprovacionemail){
        if(!filter_var($comprovacionemail, FILTER_VALIDATE_EMAIL)){
            return FALSE;
        }else {
            return TRUE;
        }
    }
    // Validacio de la Contrasenya
    function validacioContraseña($comprovacioncontraseña){
        if(!preg_match("/^[a-zA-Z0-9]+$/", $comprovacioncontraseña)){
            return FALSE;
        }else{
            return TRUE;
        }
    }
?>