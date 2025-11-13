<?php

namespace app\controllers;
use app\models\ModeloBD;

class ControllerTareas extends ModeloBD {

   public function crearTarea($tarea){
    $this->setTarea($tarea);
   }

}