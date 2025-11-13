<?php

    namespace app\models;
    
    //include "app/models/modelo.php";

    class Test extends ConexionBD {

        public function getTasks(){
            $sql = "SELECT * FROM tasks";
            $stmt = $this->conectar()->query($sql);
            while($row = $stmt->fetch()){
                echo $row["task_name"];
            }
        }

    }