<?php
namespace Controllers;

use MVC\Router;
use Models\Profesional;

class ProfesionalController {
    public static function index(Router $router) {
        $profesionales = Profesional::all();
        $router->render('profesionales/index', [
            'profesionales' => $profesionales
        ]);
    }

    public static function crear(Router $router) {
        $errores = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $profesional = new Profesional($_POST);
            $errores = $profesional->validar();

            if (empty($errores)) {
                $profesional->guardar();
                header('Location: /admin/profesionales');
            }
        }

        $router->render('profesionales/crear', [
            'errores' => $errores
        ]);
    }
}
