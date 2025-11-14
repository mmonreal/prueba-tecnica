<?php

namespace app\controllers;
use app\models\ModeloBD;

/*Clase controlador que funciona de intermediario con la base de datos.*/

class ControllerTareas extends ModeloBD {

   /*Funcion del controlador para crear una tarea*/
   public function crearTarea($tarea){
      $this->setTarea($tarea);
   }


   /*Funcion del controlador para eliminar una tarea de la base de datos*/
   public function eliminarAjax() {
      header('Content-Type: application/json');

      //Obtenemos el id de la tarea a eliminar
      $id = $_POST['id'] ?? null;

      //regresasmos un json con el resultado de la consulta y un mensaje de error en caso de tener alguno
      if (!$id) {
         echo json_encode(['ok' => false, 'error' => 'ID no recibido']);
         return;
      }

      $resultado = $this->eliminarTarea($id);

      echo json_encode(['ok' => $resultado]);
   }

}