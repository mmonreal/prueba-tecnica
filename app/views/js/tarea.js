// Abrir popUp
document.getElementById("botonAbrirPopUp").onclick = function() {
    document.getElementById("popUpAgregar").style.display = "block";
};

// Cerrar popUp
document.getElementById("cerrarpopUp").onclick = function() {
    document.getElementById("popUpAgregar").style.display = "none";
};

// Cerrar si clickea fuera del popUp
window.onclick = function(event) {
    const popUp = document.getElementById("popUpAgregar");
    if (event.target === popUp) {
        popUpAgregar.style.display = "none";
    }
};

/* Boton para agregar una tarea implementando ajax*/
$(document).on("submit", "#formAgregar", function(e) {
    e.preventDefault(); //evitar recarga de pagina

    const descripcion = $(this).find("textarea[name='descripcion']").val();

    if (!descripcion.trim()) {
        alert("La descripción no puede estar vacia");
        return;
    }

    $.ajax({
        url: "/prueba-tecnica/app/views/js/router.php?accion=agregarAjax",
        method: "POST",
        data: { descripcion: descripcion },
        success: function(resp) {
            if (resp.ok) {
                // Cerrar el popup
                $("#popUpAgregar").hide();

                // Limpiamos el texto texto
                $("#formAgregar textarea").val("");

                // Agregar la nueva fila a la tabla
                const nuevaFila = `
                    <tr data-id="${resp.id}">
                        <td>${resp.id}</td>
                        <td>${resp.task_name}</td>
                        <td>${resp.created_at}</td>
                        <td>
                            <a href="{$editar}" style="color: blue; text-decoration: none;">Editar</a> |
                            <a href="#" class="boton-eliminar" data-id="${resp.id}" style="color:red; text-decoration:none;">Eliminar</a>
                        </td>
                    </tr>
                `;
                $("table tbody").append(nuevaFila);
                
            } else {
                alert("Error al agregar la tarea");
            }
        },
        error: function() {
            alert("Error de conexión con el servidor");
        }
    });
});


/* Boton para eliminar una tarea implementando ajax*/
$(document).ready(function() {

    $(document).on("click", ".boton-eliminar", function(e) {
        e.preventDefault(); //evitar recarga de pagina
        
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
