<?php
    require_once "./autoload.php"
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="app/views/css/estilos.css">
  
  
  <title>Prueba tecnica de tareas</title>

</head>

<body>

  

<div class="container">
  <h1>Lista de Tareas</h1>
  <?php
    $agregaTarea = new app\views\add();
    echo $agregaTarea->botonAgregarTarea();

    $editarTarea = new app\views\edit();
    echo $editarTarea->botonEditarTarea();

    $tablaTareas = new app\views\VistaTareas();
    echo $tablaTareas->muestraTablaTareas();
  ?>

  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="./app/views/js/tarea.js"></script>

</body>
</html>