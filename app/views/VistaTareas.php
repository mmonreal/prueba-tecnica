<?php
namespace app\views;
use app\models\ModeloBD;

class VistaTareas extends ModeloBD {

    /**
     * Metodo que regresa una tabla con todas las tareas
     * @return Tabla de tareas
     */
    public function muestraTablaTareas() {
        $tareas = $this->getTareas();

        if (empty($tareas)) {
            return "<p>No hay tareas registradas.</p>";
        }

        
        $baseUrl = "/tareas"; 

        $tabla = <<<HTML
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre de tarea</th>
                    <th>Fecha de creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
        HTML;

        foreach ($tareas as $t) {
            $id = htmlspecialchars($t['id']);
            $nombre = htmlspecialchars($t['task_name']);
            $fecha = htmlspecialchars($t['created_at']);

            // Editar y eliminar
            $editar = "{$baseUrl}/editar?id={$id}";
            $eliminar = "{$baseUrl}/eliminar?id={$id}";

            $tabla .= <<<HTML
                <tr>
                    
                    <td>{$id}</td>
                    <td>{$nombre}</td>
                    <td>{$fecha}</td>
                    <td>
                        <a href="{$editar}" style="color: blue; text-decoration: none;">Editar</a> |
                        <a href="#" class="boton-eliminar"  data-id="{$id}" style="color: red; text-decoration: none;">Eliminar</a>
                    </td>
                </tr>
            HTML;
        }

        $tabla .= <<<HTML
            </tbody>
        </table>
        HTML;

        return $tabla;
    }
}