<?php
    //echo "Heola MUNDO como estan";
    require_once "./autoload.php"
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  
  <title>Prueba tecnica de tareas</title>

</head>

<body>



  <?php
    $test1 = new app\views\add();
    echo $test1->botonAgregarTarea();

    $test = new app\views\VistaTareas();
    echo $test->muestraTablaTareas();

    //$testt = new app\controllers\ControllerTareas();
    //$testt->setTarea("esta es una nueva tarea");
  ?>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="./app/views/js/tarea.js"></script>

</body>
</html>