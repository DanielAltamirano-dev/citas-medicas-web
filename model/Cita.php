<?php
require_once __DIR__ . '/../config/database.php';

class Cita {
    private $conn;
    private $table = "citas";

    public function __construct(){
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Cierra la conexion automaticamente
    public function __destruct(){
        $this -> conn = null;
    }

    // Crear una cita médica
    public function crearCita($nombre, $especialidad, $fecha_cita){
        try {
            $sql = "INSERT INTO " . $this->table . " (nombre_paciente, especialidad, fecha_cita)
                    VALUES (:nombre, :especialidad, :fecha_cita)";
            $stmt = $this->conn->prepare($sql);
            if (!$stmt) return false;

            $stmt->bindValue(':nombre', $nombre);
            $stmt->bindValue(':especialidad', $especialidad);
            $stmt->bindValue(':fecha_cita', $fecha_cita);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error al crear cita: " . $e->getMessage());
            return false;
        }
    }

    // Obtener todas las citas médicas activas
    public function obtenerCitas(){
        try {
            $sql = "SELECT * FROM " . $this->table . " WHERE ESTADO = 1 ORDER BY fecha_cita ASC";
            $stmt = $this->conn->prepare($sql);
            if (!$stmt) return false;

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna un array del query SELECT
        } catch (PDOException $e) {
            error_log("Error al obtener citas: " . $e->getMessage());
            return false;
        }
    }

    // Borrado lógico de una cita
    public function eliminarCita($id){
        try {
            $sql = "UPDATE " . $this->table . " SET estado = 0 WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            if (!$stmt) return false;

            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error al eliminar cita: " . $e->getMessage());
            return false;
        }
    }
}