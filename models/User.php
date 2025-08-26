<?php
require_once 'util/Database.php';

class User
{
    private $conn;
    private $table = 'users';

    private $id;
    private $nombre;
    private $email;
    private $password;
    private $creado_en;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    //Funcion para insertar un Usuario
    public function create(){
        $query = "INSERT INTO " . $this->table ." 
        (nombre, email, password) 
        VALUES (:nombre, :email, :password)";

        $stmt = $this->conn->prepare($query);

        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);

        if($stmt->execute()){
            return true;
        }
        return false;  
    }

    //Muestra todos los usuarios de nuestra tabla users
    public function getAllUsers()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    //Busqueda por Id del Usuario
    public function getUserById($id){
        $query = "SELECT * FROM " .$this->table ." WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row){
            $this->id = $row['id'];
            $this->nombre = $row['nombre'];
            $this->email = $row['email'];
            $this-> creado_en = $row['creado_en'];
            return true;
        }

        return false;

    }

    public function update($id){
        $query = "";
    }

    public function delete($id){
        $query = "DELETE FROM ". $this->table . " WHERE id = :id";
        $stmt =$this->conn->prepare($query);
        $stmt->bindParam(":id", $id);

        if($stmt->execute()){
            return true;
        }

        return false;
    }




}

