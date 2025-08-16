<?php
require_once __DIR__ . '/../model/cita.php';

class CitaController {
    private $citaModel;

    public function __construct(){
        $this -> citaModel = new Cita();
    }

    // Manejo de las solicitudes GET y POST
    public function handleRequest(){
        $method = $_SERVER('REQUEST_METHOD');

        if($method == 'POST'){
            $action = $_POST['action'] ?? null;

            switch ($action) {
                case 'crear';
                    $this -> crearCita();
                    break;
                case 'eliminar';
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

    
}