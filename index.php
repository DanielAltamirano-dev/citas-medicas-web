<?php
$requestUri = trim($_SERVER['REQUEST_URI'], '/');

// Array donde defino las rutas de las vistas
$routes = [
    'agendar-cita' => './views/agendar-cita.php',
    'listado-citas' => './views/listado-citas.php',
];

// Ruta por deþecto
if($requestUri === ''){
    $requestUri = 'agendar-cita';
}

// Verifica si existe la ruta
if (array_key_exists($requestUri, $routes)) {
    require_once $routes[$requestUri];
} else {
    // Página no encontrada
    http_response_code(404);
    echo "Enlace incorrecto, Página no encontrada";
}