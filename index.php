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
    $test = new app\models\Test();
    $test->getTasks();
  ?>

</body>
</html>