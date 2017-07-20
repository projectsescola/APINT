<?php

class DbHandler {
 
    private $conn;
 
    function __construct() {
        require_once 'DbConnect.php';
        // abre conexión a la bdd
        $db = new DbConnect();
        $this->conn = $db->connect();
    }

    public function readFromTable($tabla){
        // consulta de todos los campos de la tabla calendarios
        $query = "SELECT * FROM `".$tabla."`";
     
        // prepara la consulta
        $stmt = $this->conn->prepare($query);
     
        // la ejecuta
        $stmt->execute();
     
        return $stmt;
    }

}
 
?>