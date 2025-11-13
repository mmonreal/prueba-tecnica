<?php

    namespace app\models;
    use \PDO;

    if(file_exists(__DIR__."/../../config/server.php")){
        require_once __DIR__."/../../config/server.php";
    }

    class ConexionBD{
        private $server=DB_SERVER;
		private $db=DB_NAME;
		private $user=DB_USER;
		private $pass=DB_PASS;

        /*Funcion para conectar a la base de datos*/
		protected function conectar(){
            $dsn = "mysql:host=".$this->server.";dbname=".$this->db;
			$conexion = new PDO($dsn,$this->user,$this->pass);
			return $conexion;
		}
    }