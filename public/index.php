<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\LoginController;

$router = new Router();

// Iniciar Sesión
$router->get('/', [LoginController::class,"login"]);
$router->post('/', [LoginController::class,"login"]);
$router->get('/logout', [LoginController::class,"logout"]);

// Recuperar Password
$router->get('/forgot', [LoginController::class,"forgot"]);
$router->post('/forgot', [LoginController::class,"forgot"]);
$router->get('/recover', [LoginController::class,"recover"]);
$router->post('/recover', [LoginController::class,"recover"]);

// Crear Cuenta
$router->get('/signup', [LoginController::class,"signup"]);
$router->post('/signup', [LoginController::class,"signup"]);

$router->get('/confirmar', [LoginController::class,"confirmar"]);
$router->get('/mensaje', [LoginController::class,"mensaje"]);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();