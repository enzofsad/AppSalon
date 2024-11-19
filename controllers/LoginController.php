<?php
namespace Controllers;

use MVC\Router;
use Model\Usuario;
use Classes\Email;

class LoginController {
    public static function login(Router $router) {
        $router->render('auth/login');
    }
    public static function logout() {
        echo "from logout";
    }
    public static function forgot(Router $router) {
        $router->render('auth/forgot', [
            
        ]);
    }
    public static function recover() {
        echo "from recover";
    }
    public static function signup(Router $router) {
        $usuario = new Usuario;
        $alertas = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();
            if (empty($alertas)) {
                $resultado = $usuario->existeUsuario();
                if ($resultado->num_rows) {
                    $alertas = Usuario::getAlertas();
                } else {
                    $usuario->hashPassword();
                    $usuario->crearToken();
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarConfirmacion();

                    $resultado = $usuario->guardar();
                    if ($resultado) {
                        header('Location: /mensaje');
                    }
                }
            }
        }

        $router->render('auth/signup', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }
    public static function mensaje(Router $router) {
        $router->render('auth/mensaje');
    }
    public static function confirmar(Router $router) {
        $alertas = [];
        $token = s($_GET['token']);
        $usuario = Usuario::where('token', $token);

        if (empty($usuario)) {
            Usuario::setAlertas("error", "Token no valido");
        } else {
            $usuario->confirmado = 1;
            $usuario->token = null;
            $usuario->guardar();
            Usuario::setAlertas("exito", "Cuenta confirmada correctamente");
        }

        $alertas = Usuario::getAlertas();
        $router->render ('auth/confirmar' ,[
            "alertas" => $alertas
        ]);
    }
}
