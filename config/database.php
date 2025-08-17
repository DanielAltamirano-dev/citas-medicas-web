<?php
class Database {
    private $host = "localhost";
    private $port = "3306";
    private $db_name = "citas_medicas";
    private $username = "root";
    private $password = "root"; 
    private $charset = "utf8mb4";
    private static $conn = null;

    public function getConnection() {
        $this->conn = null;
        try {
            $dsn = "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name . ";charset=" . $this->charset;
            $this->conn = new PDO($dsn, $this->username, $this->password);
            
            // Configuraciones PDO
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            
        } catch(PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
            return null;
        }
        return self::conn;
    }
}