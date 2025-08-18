<?php
require_once __DIR__ . '/../model/cita.php';

class CitaController {
    private $citaModel;

    public function __construct(){
        $this -> citaModel = new Cita();
    }

    // Manejo de las solicitudes GET y POST, actua como un enrutador
    public function handleRequest(){
        $method = $_SERVER['REQUEST_METHOD'];

        if($method == 'POST'){
            $action = $_POST['action'] ?? null;

            switch ($action) {
                case 'crear':
                    $this -> crearCita();
                    break;
                case 'eliminar':
                    $this -> eliminarCita();
                    break;
                default:
                    $this -> sendResponse(['error' => 'Accion no valida'], 400);
            }
        } elseif ($method === 'GET'){
            $this -> obtenerCitas();
        } else {
            $this -> sendResponse(['error' => 'Metodo incorrecto'], 405);
        }
    }

    // Crear una nueva cita
    private function crearCita(){
        $nombre = $_POST['nombre'] ?? null;
        $especialidad = $_POST['especialidad'] ?? null;
        $fecha_cita = $_POST['fecha_cita'] ?? null;

        if(!$nombre || !$especialidad || !$fecha_cita) {
            $this -> sendResponse(['error' => 'Faltan campos obligatorios'], 400);
            return;
        }

        $resultado = $this -> citaModel -> crearCita($nombre, $especialidad, $fecha_cita);

        if($resultado) {
        $this->sendResponse(['success' => true], 201); // Devuelve el estado
        } else {
            $this->sendResponse(['success' => false], 500); // Devuelve el estado
        }

    }

    // Obtener todas las citas (filtradas por estado)
    private function obtenerCitas(){
        $citas = $this -> citaModel -> obtenerCitas();
        
        if($citas !== false){
            $this -> sendResponse($citas, 200);
        } else {
            $this -> sendResponse(['mensaje error:' => 'Error al obtener las citas'], 500);
        }
    }

    // Elimiado logico de una cita (SOFT DELETE)
    private function eliminarCita(){
        $id = $_POST['id'] ?? null;

        if(!$id){
            $this -> sendResponse(['success' => false, 'No se ha recibido el id'], 400);
            return;
        }

        $resultado = $this -> citaModel -> eliminarCita($id);

        if($resultado){
            $this -> sendResponse(['success' => true, 'Cita eliminada correctamente'], 200);
        } else {
            $this -> sendResponse(['success' => false, 'Error al eliminar la cita'], 500);
        }

    }

    // Envia el mensaje de respuesta al usuario
    private function sendResponse($data, $statusCode = 200){
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}

// Se instancia el controlador y maneja la solicitud
$controller = new CitaController();
$controller -> handleRequest();