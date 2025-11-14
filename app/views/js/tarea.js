/* Boton para eliminar una tarea implementando ajax*/
$(document).ready(function() {

    $(document).on("click", ".boton-eliminar", function(e) {
        e.preventDefault();
        
        //Id de la tarea a eliminar y su respectiva fila fila
        const id = $(this).data("id");
        const fila = $(this).closest("tr");

        //Dialogo para confirmar la accion
        if (!confirm("¿Seguro de eliminar esta tarea?")) {
            return;
        }

        //Implementacion con ajax
        $.ajax({
            url: "/prueba-tecnica/app/views/js/router.php?accion=eliminarAjax",
            method: "POST",
            data: { id: id },
            success: function(resp) {
                if (resp.ok) {
                    fila.remove();
                } else {
                    alert("Error al eliminar la tarea");
                }
            },
            error: function() {
                alert("Error conexion con el servidor");
            }
        });

    });

});
