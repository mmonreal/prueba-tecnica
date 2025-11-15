<?php
namespace app\views;

class add {

    /**
     * Metodo que regresa el boton para agregar una tarea
     */
    public function botonAgregarTarea() {
        $boton = <<<HTML
            <link rel="stylesheet" href="app/views/css/estilos.css">
            
            <!-- Boton para abrir el pop up -->
            <button id="botonAbrirPopUp" class="btn boton-agregar">Agregar Tarea</button>

            <!-- pop up  -->
            <div id="popUpAgregar" class="popUp">
                <div class="popUp-contenido">
                    <div class="popUp-header">
                        <h2>Agregar nueva tarea</h2>
                        <span id="cerrarAgregar" class="cerrar">x</span>
                        
                    </div>

                    <form id="formAgregar">

                        <label>Descripción:</label>
                        <textarea name="descripcion" required></textarea>

                        <button type="submit" class="btn boton-cerrar boton-submit">Guardar</button>
                    </form>
                </div>
            </div>
        HTML;
        
        return  $boton;
    }

}