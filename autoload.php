<?php

/**
 * Autoloader de clases.
 *
 * Permitiendo cargar automáticamente las clases sin necesidad de usar
 * múltiples `require` o `include`.
 *
 */
    spl_autoload_register(function($clase){
        $archivo = __DIR__."/".$clase.".php";
        $archivo = str_replace("\\","/",$archivo);   

        if(is_file($archivo)){
            require_once $archivo;
        }

        //echo $archivo;

    }); 