<?php
    namespace app\models;
    use \DateTime;

    /**
     * Clase que gestiona el modelo del proyecto
     */
    class ModeloBD extends db{

        /*Funcion para obtener todas las tareas de la base de datos*/
		protected function getTareas(){
            $sql = "SELECT * FROM tasks";
            $stmt = $this->conectar()->prepare($sql);
            $stmt->execute();

            $resultado = $stmt->fetchAll();

            return $resultado;
		}

        /*Funcion para modificar agregar una tarea*/
		public function setTarea($tarea){
            //Ajustamos la hora a la de la Ciudad de Mexico
            date_default_timezone_set('America/Mexico_City');
            $date = new DateTime('now');
            $formattedTimestamp = $date->format('Y-m-d H:i:s');
            
            $sql = "INSERT INTO tasks(id, task_name,created_at) VALUES (?,?,?)";
            $stmt = $this->conectar()->prepare($sql);
            $stmt->execute([null,$tarea,$formattedTimestamp]);
		}

    }