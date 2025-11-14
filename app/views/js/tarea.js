const pAgregar = document.getElementById("popUpAgregar");
const pEditar  = document.getElementById("popUpEditar");

// Abrir popup agregar tarea
document.getElementById("botonAbrirPopUp").onclick = function() {
    pAgregar.style.display = "block"; 
};

// Cerrar popup agregar
document.getElementById("cerrarAgregar").onclick = function() {
    pAgregar.style.display = "none";
    $("#formAgregar textarea").val("");
};

// Cerrar popup editar
document.getElementById("cerrarEditar").onclick = function() {
    pEditar.style.display = "none";
    $("#formEditar textarea").val("");
};

// Cerrar si clickea fuera
window.onclick = function(event) {

    // Popup Agregar
    if (event.target === pAgregar) {
        pAgregar.style.display = "none";
        $("#formAgregar textarea").val("");
    }

    // Popup Editar
    if (event.target === pEditar) {
        pEditar.style.display = "none";
        $("#formEditar textarea").val("");
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
                            <a href="#" class="boton-editar" data-id="${resp.id}" style="color: blue; text-decoration: none;">Editar</a> |
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


/** Boton para editar una tarea ejecutando el pop up
 * Guardamos la descripcion y el ID de la tarea
*/
$(document).ready(function() {

    $(document).on("click", ".boton-editar", function(e) {
        
        e.preventDefault(); //evitar recarga de pagina
        
        //Id de la tarea a modificar y su descripcion
        const id = $(this).data("id");
        const descripcion  = $(this).closest("tr").find("td:nth-child(2)").text();

        console.log(descripcion)

        // Llenar popup
        $("#editarId").val(id);
        $("#editarDescripcion").val(descripcion);

        // Mostrar popup
        $("#popUpEditar").css("display", "block");

    });

    
     /* Boton para editar una tarea implementando ajax*/
    $("#formEditar").submit(function(e){
        e.preventDefault();

        const id = $("#editarId").val();
        const descripcion = $("#editarDescripcion").val();

        $.ajax({
            url: "/prueba-tecnica/app/views/js/router.php?accion=editarAjax",
            method: "POST",
            data: { id: id, descripcion: descripcion },
            success: function(resp){
                if(resp.ok){
                    // Actualizar fila en la tabla
                    const fila = $(`tr[data-id='${id}']`);
                    fila.find(".col-nombre").text(descripcion);
                    $("#popUpEditar").hide();
                } else {
                    alert("Error al editar la tarea");
                }
            },
            error: function(){
                alert("Error de conexión con el servidor");
            }
        });
    });

});
