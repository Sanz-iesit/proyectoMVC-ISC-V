<?php

class Database {
   
   private $host = 'localhost';
   private $port = '3306';
   private $user = 'root';
   private $password = "12345";
   private $db_name = 'mcv';
   public $conn;

   public function getConnection(){
        $this->conn = null;

        try {
            $dsn = "mysql:host={$this->host};port={$this->port}; dbname={$this->db_name};charset=utf8mb4";
            $this->conn = new PDO($dsn, $this->user, $this->password);

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $ex) {
            echo 'Error de Conexion: ' . $ex->getMessage();

        }
        return $this->conn;
   }

}