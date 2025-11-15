<?php
namespace app\views;

class edit {

    /**
     * Metodo que regresa el boton para agregar una tarea
     */
    public function botonEditarTarea() {
        $boton = <<<HTML
            <link rel="stylesheet" href="app/views/css/estilos.css">

            <!-- pop up  -->
            <div id="popUpEditar" class="popUp">
                <div class="popUp-contenido">
                    <div class="popUp-header">
                        <h2>Editar tarea</h2>
                        <span id="cerrarEditar" class="cerrar">x</span>
                        
                    </div>

                    <form id="formEditar">
                        <input type="hidden" name="id" id="editarId">
                        <label>Descripción:</label>
                        <textarea name="descripcion" id="editarDescripcion" required></textarea>

                        <button type="submit" class="btn boton-cerrar boton-editar-tarea">Guardar</button>
                    </form>
                </div>
            </div>
        HTML;
        
        return  $boton;
    }

}