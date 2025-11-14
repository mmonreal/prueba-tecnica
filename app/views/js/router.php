<?php

require_once "../../../autoload.php";

use app\controllers\ControllerTareas;

$controller = new ControllerTareas();

// Detectamos la ruta pedida en la URL
$accion = $_GET['accion'] ?? 'inicio';

//Vemos que accion se realiza
switch ($accion) {

    case 'eliminarAjax':
        $controller->eliminarAjax();
        exit;
        break;

    case 'agregarAjax':
        $controller->agregarAjax();
        exit;
        break;
        
    default:
        $vista = new app\views\VistaTareas();
        echo $vista->muestraTablaTareas();
        break;
}