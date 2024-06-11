<?php
namespace Controllers;

use MVC\Router;
use Model\Profesional;

class ProfesionalController {
    
    public static function index(Router $router) {
        session_start();

        isAdmin();

        $profesionales = Profesional::all();

        $router->render('profesionales/index', [
            'nombre' => $_SESSION['nombre'],
            'profesionales' => $profesionales
        ]);
    }

    public static function crear(Router $router) {
        session_start();
        isAdmin();
        $profesional = new Profesional;
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $profesional->sincronizar($_POST);

            $alertas = $profesional->validar();

            if (empty($alertas)) {
                $profesional->guardar();
                header('Location: /profesionales');
            }
        }

        $router->render('profesionales/crear', [
            'nombre' => $_SESSION['nombre'],
            'profesionales' => $profesionales,
            'alertas' => $alertas
        ]);
    }

    public static function actualizar(Router $router) {
        session_start();
        isAdmin();

        if(!is_numeric($_GET['id'])) return;

        $profesional = Profesional::find($_GET['id']);
        $alertas = [];

        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $profesional->sincronizar($_POST);

            $alertas = $profesional->validar();

            if(empty($alertas)) {
                $profesional->guardar();
                header('Location: /profesionales');
            }
        }

        $router->render('profesionales/actualizar', [
            'nombre' => $_SESSION['nombre'],
            'profesional' => $profesional,
            'alertas' => $alertas
        ]);
    }

    public static function eliminar() {
        session_start();
        isAdmin();
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $profesional = Profesional::find($id);
            $profesional->eliminar();
            header('Location: /profesionales');
        }
    }

}
