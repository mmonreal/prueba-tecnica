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
            <button id="botonAbrirPopUp" class="boton-agregar">Agregar Tarea</button>

            <!-- pop up  -->
            <div id="popUpAgregar" class="popUp">
                <div class="popUp-contenido">
                    <span id="cerrarAgregar" class="cerrar">x</span>
                    <h2>Agregar nueva tarea</h2>

                    <form id="formAgregar">

                        <label>Descripción:</label>
                        <textarea name="descripcion" required></textarea>

                        <button type="submit" class="boton-submit">Guardar</button>
                    </form>
                </div>
            </div>
        HTML;
        
        return  $boton;
    }

}