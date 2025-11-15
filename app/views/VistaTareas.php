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

        $tablaStyle = empty($tareas) ? "display:none;" : "display:table;";

        $mensajeOculto = empty($tareas) ? "display:block;" : "display:none;";
        


        $tabla = <<<HTML
        
        <p id="mensaje-vacio" style="{$mensajeOculto}">No hay tareas registradas.</p>

        <!-- <tr id="mensaje-vacio">
            <p style="display:none;">No hay tareas registradas.</p>
        </tr> -->
        
        <table id="tabla-tareas" border="1" cellpadding="5" cellspacing="0" style="{$tablaStyle}">
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

            $tabla .= <<<HTML
                <tr data-id="{$id}">
                    
                    <td>{$id}</td>
                    <td class="col-nombre">{$nombre}</td>
                    <td>{$fecha}</td>
                    <td>
                        <a href="#" class="boton-editar" data-id="{$id}" style="color: blue; text-decoration: none;">Editar</a> |
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