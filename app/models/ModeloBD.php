<?php
    namespace app\models;
    use \DateTime;

    /**
     * Clase modelo que funciona se encarga de hacer las consultas directamente con la base de datos.
    */
    class ModeloBD extends db{
        
        protected $pdo;

        public function __construct() {
            $this->pdo = $this->conectar(); // guardar la misma conexión
        }

        /*Funcion para obtener todas las tareas de la base de datos*/
		protected function getTareas(){
            $sql = "SELECT * FROM tasks";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            $resultado = $stmt->fetchAll();

            return $resultado;
		}

        /** Funcion para agregar una tarea
        *   @param  string $tarea Descripcion de la tarea
        */
		public function setTarea($tarea){
            //Ajustamos la hora a la de la Ciudad de Mexico
            date_default_timezone_set('America/Mexico_City');
            $date = new DateTime('now');
            $formattedTimestamp = $date->format('Y-m-d H:i:s');
            
            $sql = "INSERT INTO tasks(task_name,created_at) VALUES (?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$tarea,$formattedTimestamp]);
            
            // Guardamos la tarea y regresamos los datos
            $id = $this->pdo->lastInsertId();

            return [
                'id' => $id,
                'task_name' => $tarea,
                'created_at' => $formattedTimestamp
            ];
		}

        /** Funcion para eliminar una tarea
        * @param  int $id ID de la tarea a eliminar
        * @return bool True si la tarea se elimino, false en otro caso
        */
		public function eliminarTarea($id){
            $sql = "DELETE FROM tasks WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$id]);
		}

        /** Funcion para editar una tarea
        * @param  int $id ID de la tarea a modificar
        * @param  string $descripcion nueva descripcion de la tarea
        * @return bool True si la tarea se actualizo, false en otro caso
        */
		public function editarTarea($id, $descripcion){
            $sql = "UPDATE tasks SET task_name = ? WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([ $descripcion, $id]);
		}

    }